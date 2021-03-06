/* Javascript for Survey Program */
if (!String.prototype.fill) {
    String.prototype.fill = function () {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function (match, number) {
            return typeof args[number] != 'undefined'
                ? args[number] : match;
        });
    };
}

// Listen/Tell System
(function ($) {
    var que = {}, debug = true; //(location.hash == '#debug');

    function log() {
        if (!debug) return;
        if (console && console.log) console.log(arguments);
    }

    function tell(e, p) {
        p = p || null;
        if (!que.hasOwnProperty(e)) return log(e, 'nothing listening');
        $.each(que[e], function (i, o) {
            var v = o(p) || null;
            log('event', e, 'with', p, '=> ' + v);
        });
        return true;
    }

    function listen(e, obj) {
        if (typeof e == 'object') {
            $.each(e, function (i, ev) {
                listen(ev, obj);
            });
        } else if (typeof e == 'string') {
            if (!que.hasOwnProperty(e)) que[e] = [];
            que[e].push(obj);
        } else {
            log('Que Reject', e);
        }
    }

    // Export to global
    window.tell = tell;
    window.listen = listen;
    window.debug = debug;

    if (debug) window.que = que;


}(jQuery));

// Server jQuery
(function($){
    listen('server.get', function (cfg) {
        $.ajax({
            dataType : 'json',
            url      : cfg[0],
            data     : cfg[1],
            method   : 'get'
        }).always(cfg[2]);
        return "getting package from server";
    });

    listen('server.post', function (cfg) {
        $.ajax({
            dataType : 'json',
            url      : cfg[0],
            data     : cfg[1],
            method   : 'post'
        }).always(cfg[2]);
        return "posted package to server";
    });
}(jQuery));


// Message System
$(function () {

    var button = {};
    var total = $('#input-total');

    listen('bind', function() {

        button.error = $('#alert-error');
        button.loading = $('#alert-loading');
        button.success = $('#alert-success');

        button.error.bind('click', function() {
            $(this).hide();
            total.focus();
        });
        button.loading.bind('click', function() {
            $(this).hide();
            total.focus();
        });
        button.success.bind('click', function() {
            $(this).hide();
            total.focus();
        });

    });

    listen('alert.error', function(val) {
        tell('alert.hide');
        button.error.show();
        button.error.text(val);
        setTimeout(function() {
            button.error.fadeOut('fast');
        }, 4000);
    });

    listen('alert.loading', function(val) {
        tell('alert.hide');
        button.loading.show();
        button.loading.text(val);
        setTimeout(function() {
            button.loading.fadeOut('fast');
        }, 4000);
    });

    listen('alert.success', function(val) {
        tell('alert.hide');
        button.success.show();
        button.success.text(val);
        setTimeout(function() {
            button.success.fadeOut('fast');
        }, 4000);
    });

    listen('alert.hide', function() {
        button.loading.hide();
        button.error.hide();
        button.success.hide();
    });
});


$(function() {
    
    var ui = {};
    
    var input = {};
    
    listen('bind', function() {
        
        ui.addButton = $('#button-create-account')
        ui.display = $('#display-fields');
        ui.refresh = $('#button-refresh-account');
        
        input.site = $('#site');
        input.type = $('#type');
        input.username = $('#username');
        input.password = $('#password');
        input.passwordConfirm = $('#confirm_password');
        
        ui.refresh.bind('click', function(e) {
            e.preventDefault();
            tell('populate-sites');
        });
        
        // Store Passwords
        ui.addButton.bind('click',function(e) {
            e.preventDefault();
            
            tell('alert.loading','Saving information...');
            
            var pw = input.password.val();
            var pwconfirm = input.passwordConfirm.val();
            
            if(pw != pwconfirm) tell('alert.error', 'Your passwords must match.');
            else {
                function callback(res) {
                    // Success
                    if(!res[0]) tell('alert.error',res[1]);
                    
                    // Failure
                    else {
                        tell('alert.success',res[1]);
                        tell('clear-fields');
                        tell('populate-sites');
                    }
                }
                
            
                var map = {
                    site: input.site.val(),
                    type: input.type.val(),
                    username: input.username.val(),
                    password: input.password.val()
                };
                
                tell('server.post', ['/account/store', map, callback]);
            }
        })
        
        // Clear the left panel
        listen('clear-fields', function() {
            input.site.val('');
            input.type.val('');
            input.username.val('');
            input.password.val('');
            input.passwordConfirm.val('');
        });
        
        
        // Fills in the Account Table with information from the database using the User's ID
        listen('populate-sites',function() {
            // Hide the display while editing it
            ui.display.hide();
            
            // Telling the user what we're doing
            tell('alert.loading','Populating sites...');
            
            // Function that dictates what the server call does after it is finished retrieving the information
            function callback(res) {
                // Success
                    if(!res[0]) tell('alert.error',res[1]);
                    
                // Failure
                else {
                    tell('alert.loading',res[1]);
                    var info = res[2];
                    var html = '<table class="table table-bordered"><thead style="font-size:10px"><tr>' +
                               
                               // Table Field Headers
                               '<th>Site</th>' +
                               '<th>Username</th>' +
                               '<th>Password</th>' + 
                               '<th>Type</th>' +
                               '<th>Updated At</th>' +
                               '<th>Options</th>' +
                               
                    '</tr></thead><tbody style="font-size:10px">';
                    
                    // Loop through and build the body of the table
                    for(var key in info) {
                        if(info.hasOwnProperty(key)) {
                            html += '<tr>' +
                            
                                    // Fields
                                    '<td>'+info[key]['site']+'</td>' +
                                    '<td><input class="form-control" id="input-account-username-'+info[key]['account_id']+'" value="'+info[key]['username']+'"/></td>' +
                                    '<td><input class="form-control" id="input-account-password-'+info[key]['account_id']+'" value="'+info[key]['password']+'"/></td>' +
                                    '<td>'+info[key]['type'] +'</td>' +
                                    '<td>'+info[key]['updated_at'] +'</td>' +
                            
                                    // Options
                                    '<td>'+
                                    
                                    '<a class="btn btn-sm btn-warning" data-id="'+info[key]['account_id']+'" id="button-delete-' + info[key]['account_id'] +'">Delete</a>'+
                                    '<a class="btn btn-sm btn-warning" data-id="'+info[key]['account_id']+'" id="button-update-' + info[key]['account_id'] +'">Update</a>'+
                                    
                                    '</td></tr>'
                        }
                    }
                    
                    html += '</tbody></table>';
                    
                    // Add all the information that was built above to the DOM
                    ui.display.html(html);
                    
                    // Binds all the new buttons that were created using their unique id
                    for(var key in info) {
                        if(info.hasOwnProperty(key)) {
                            $('#button-delete-'+info[key]['account_id']).bind('click',function(e) {
                                e.preventDefault();
                                var id = $(this).data('id');
                                tell('alert.loading','Deleting account ' + id);
                                function callback(res) {
                                    if(!res[0]) tell('alert.error',res[1]);
                                    else {
                                        tell('populate-sites');
                                    }
                                }
                                tell('server.post',['/account/delete',{account_id:id},callback]);
                            });
                            $('#button-update-'+info[key]['account_id']).bind('click',function(e) {
                                e.preventDefault();
                                var id = $(this).data('id');
                                tell('alert.loading','Updating account ' + id);
                                function callback(res) {
                                    if(!res[0]) tell('alert.error',res[1]);
                                    else {
                                        tell('populate-sites');
                                    }
                                }
                                var map = {
                                    username: $('#input-account-username-'+info[key]['account_id']).val(),
                                    password: $('#input-account-username-'+info[key]['account_id']).val(),
                                    accountId: info[key]['account_id']
                                };
                                
                                // Sends the new information to the server 
                                tell('server.post',['/account/update',map,callback]);
                            });
                        }
                    }
                    
                    // Displays all the work that was done above and tells the user we're done!
                    ui.display.show();
                    tell('alert.success','Successfully built accounts list!');
                }
            }
            
            // Gathers all the user information from the database then calls callback
            tell('server.post', ['/account/show', {}, callback]);
            
        });
        
        
    });
    
})



// Startup
$(function () {
    tell('bind');
    tell('populate-sites');
});