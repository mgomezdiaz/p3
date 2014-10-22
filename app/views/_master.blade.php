<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		@yield('title','DBF')
	</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="./css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="./css/bootstrap-extended.css" />
	<link rel="stylesheet" href="./css/style.css" />

	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</head>
<body>
	<h1>Developer's Best Friend</h1>
	<div class="row-fluid">
		<nav class="span12 navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
					</a>
					<div class="nav-collapse collapse">
                        <ul class="nav menu nav-pills">
                        	<li class="item-101 {{$path == 'home' ? 'current active' : ''}}">
                        		<a href="./">Home</a>
                        	</li>
                        	<li class="item-102 {{$path == 'lorem-gen' ? 'current active' : ''}}">
                        		<a href="./lorem-gen">Lorem Ipsum Generator</a>
                        	</li>
                        	<li class="item-103 {{$path == 'user-gen' ? 'current active' : ''}}">
                        		<a href="./user-gen">User Generator</a>
                        	</li>
                        	
                        </ul>
                    </div>
				</div>
			</div>
		</nav>
	</div>

	<div>
		@yield('content')
	</div>
</body>
</html>