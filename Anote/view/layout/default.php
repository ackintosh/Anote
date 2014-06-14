<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Anote Default Template</title>
	<link href="/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="/js/bootstrap.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</a>
			<a class="brand" href="../">Anote</a>
			<div class="nav-collapse" id="main-menu">
				<ul class="nav" id="main-menu-left">
					<li><a href="#">Menu1</a></li>
					<li><a id="swatch-link" href="#">Menu2</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu3 <b class="caret"></b></a>
						<ul class="dropdown-menu" id="swatch-menu">
							<li><a href="#">Default</a></li>
							<li class="divider"></li>
							<li><a href="#">Amelia</a></li>
							<li><a href="#">Cerulean</a></li>
							<li><a href="#">Cyborg</a></li>
							<li><a href="#">Journal</a></li>
							<li><a href="#">Readable</a></li>
							<li><a href="#">Simplex</a></li>
							<li><a href="#">Slate</a></li>
							<li><a href="#">Spacelab</a></li>
							<li><a href="#">Spruce</a></li>
							<li><a href="#">Superhero</a></li>
							<li><a href="#">United</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav pull-right" id="main-menu-right">
					<li>
						<a target="_blank" href="https://github.com/ackintosh/Anote">github<i class="icon-share-alt icon-white"></i></a>
					</li>
					<li>
						<a target="_blank" href="http://bootswatch.com/amelia/">bootswatch<i class="icon-share-alt icon-white"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 60px;">

	<?php echo $this->_content; ?>
	
	<footer class="footer">
		<p class="pull-right"><a href="#">Back to top</a></p>
	</footer>
</div>
</body>
</html>