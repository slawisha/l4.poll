<!DOCTYPE html>
<html>
  <head>
    <title> Laravel4 and Angular Poll App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" >    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-app="pollsAppAdmin">
    <header>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="/">Polls App</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            @if(Auth::guest())
            <li><a href="/login">Login</a></li>
            @else
            <li><a href="/admin">Admin</a></li>
            <li><a href="/logout">Logout</a></li>
            @endif
        </nav>
    </header>
    <div class="container">
      @yield('content')
     </div><!-- end .container --> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.2.16/angular-route.min.js"></script>
    <script src="//cdn.jsdelivr.net/d3js/3.4.6/d3.min.js"></script>   
    <script src="//cdn.jsdelivr.net/angular.charts/0.2.0/angular-charts.min.js"></script>
    <script src="../js/lib/ui-bootstrap-tpls-0.11.0.min.js"></script>
    <script src="../js/lib/sortable.js"></script>
    <script src="../js/admin.js"></script>
    <script src="../js/directives/pollAlert.js"></script>
    <script src="../js/services/pollService.js"></script>
    <script src="../js/services/answerService.js"></script>
    <script src="../js/controllers/indexCtrl.js"></script>
    <script src="../js/controllers/pollCtrl.js"></script>
    <script src="../js/controllers/adminController.js"></script>
  </body>
</html>