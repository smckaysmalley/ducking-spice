<!DOCTYPE>
<html>
<head>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/spacelab/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script src=//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js></script>
    <script type="text/javascript" src="js/login.js"></script>
    
</head>

<body>
<br /><br />
<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
    <div class="box panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Please Login</div>
        </div>
        <div class="panel-body">
            {{ Form::open(array('route'=>'session.store','method'=>'post')) }}
            <div class="form-group">
               <span style="color:red">
                   @if(isset($error))
                     {{ $error }}
                   @endif
               </span>
               <span style="color:green">
                   @if(isset($msg))
                     {{ $msg }}
                   @endif
               </span>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" name="email" class='form-control' id="email" placeholder="john@mail.com" required/>
            </div>
            </br/>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" name="password" class="form-control" id="password" required/>
            </div>
            <div class="form-group">
               <button class="btn btn-primary" type="submit" href="session.index.php">Login</button>
               {{ HTML::linkRoute('user.create','Create Account',array(),array('class'=>'btn btn-primary pull-right')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</body>

</html>