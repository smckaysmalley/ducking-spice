<!DOCTYPE>
<html>
<head>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/spacelab/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script src=//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js></script>
    <script type="text/javascript" src="js/login.js"></script>
    <link rel="stylesheet" href="css/login.css"/>
    
</head>

<body>
    <div class="box panel panel-primary">
        <div class="panel-heading">Ducking Spice</div>
        <hr/>
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
                   <label for="name">Name</label>
                   <input type="text" name="name" class='form-control' id="name" placeholder="Lastname, Firstname" required/>
                </div>
                </br/>
                <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" id="password" name="password" required/>
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
            {{ Form::close() }}
        </div>
    </div>
</body>

</html>