<!DOCTYPE>
<html>
<head>
    <title>Ducking-Spice</title>
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/spacelab/bootstrap.min.css" rel="stylesheet">
    <link href="http://ducking-spice-c9-smckaysmalley.c9.io/css/ducking-spice.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>{{ HTML::linkRoute('account.index','Manage Passwords') }}</li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        @if($admin) <li><a href="/admin">Admin</a></li> @endif
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Logged in as {{$fname}} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/user/show">My Profile</a></li>
              <li><a href="/logout">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
  @yield('content')
</div>
    
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src=//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js></script>
    @yield('js')
</body>
</html>