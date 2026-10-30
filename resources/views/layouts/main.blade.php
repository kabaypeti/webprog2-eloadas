<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<head>
	<title>@yield('title', 'Web Programozás II. házi feladat')</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="/assets/css/main-extended.css" />
	@yield('head')
</head>
<body class="homepage is-preload">
	<div id="page-wrapper">
		<section id="header">
			<div class="container">
				<!-- Nav -->
					@include('navigation')
					@hasSection('header')
						<div id="header-content">
							@yield('header')
						</div>
					@endif
				<!-- Header -->
			</div>
		</section>
		
		@yield('content')
    
		<section id="footer">
			<div id="copyright" class="container">
				<ul class="links">
				<li>Készítette: Tót Benedek (NZL3EF) & Palotai Péter (CVIZYT). </li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</section>
  	</div>
  
  	<!-- Scripts -->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/jquery.dropotron.min.js"></script>
		<script src="/assets/js/browser.min.js"></script>
		<script src="/assets/js/breakpoints.min.js"></script>
		<script src="/assets/js/util.js"></script>
		<script src="/assets/js/main.js"></script>
</body>
</html>
