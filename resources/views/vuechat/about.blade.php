<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://d3dhju7igb20wy.cloudfront.net/assets/0-4-0/all-the-things.css" />
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logo.png" width=41 height=30></a>
                </div>
                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"> <a href=""><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span> Home</a></li>
                        <li><a href="{{ route('vuechat.about') }}"><span class="glyphicon glyphicon-info-sign"
                         aria-hidden="true"></span> About</a></li>
                        <li><a href="{{ route('vuechat.contact') }}"><i class="fa fa-envelope-o"></i> Contact</a></li>
                    </ul>         
                </div>
            </div>
        </nav>
	
	<div id="app">
  		<a v-link="{ path: '/about' }"><h1>Our company</h1></a>
  		<ul class="navigation">
    		<li><a v-link="{ path: '/people' }">People</a></li>
  		</ul>

  		<router-view></router-view>
	</div>

	<script src="js/app.js"></script>
</body>
</html>