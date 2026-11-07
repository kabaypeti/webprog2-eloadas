@extends('layouts.main')

@section('header')
	<div class="container">
		<h1 id="logo"><a href="/">WEB Programozás II.</a></h1>
		<p>A weboldal sémáját készítette: <a href="http://twitter.com/ajlkn">@ajlkn</a></p>
	</div>
@endsection

@section('content')
	<!--
	<section id="features">
		<div class="container">
			<header>
				<h2>Üdvözöllek az oldalon!</h2>
			</header>
		</div>
	</section>-->

	<!-- Banner -->
	 @yield('msg_extra')

	<section id="main">
		<div class="container">
			<!-- Main -->
			<div class="row">

				<!-- Content -->
					<div id="content" class="col-8 col-12-medium">

						<!-- Post -->
							<article class="box post">
								<header>
									<h2>Üdvözöllek az oldalon!</h2>
								</header>
								<a class="image featured"><img src="images/pizza1.jpg" alt="Pizza" /></a>
								<!--<h3>Ez a főoldal</h3>-->
								<p>Szereted a pizzát?</p>
								<p>Ezen az oldalon egy egyszerű pizzás adatbázis tábláit lehet megnézni, üzenetet küldeni a rendszergazdának, valamint az egyik adatbázis diagrammja található. Lehet felhasználót létrehozni, ki és be jelentkezni vele, egyes oldalak csak bejelentkezett vagy admin felhasználónak érhetőek el. Az egyik táblára egy CRUD oldal is meg van valósítva. Az aloldalakról részletesen jobbra olvashatsz.</p>
							</article>

						
					</div>

				<!-- Sidebar -->
					<div id="sidebar" class="col-4 col-12-medium">
							<section>
								<ul class="divided">
									<li>
											<article class="box highlight">
												<header>
													<h3>Adatbázis</h3>
												</header>
												<p>Ezen az aloldalon tudod az adatbázis tábláit megnézni. Az adott tábláknak külön oldaluk van, az adatok tizessével vannak megjelenítve.</p>
											</article>
									</li>
									<li>
											<article class="box highlight">
												<header>
													<h3>Kapcsolat</h3>
												</header>
												<p>Egy üzenet küldése és üzenetek megtekintése aloldalakból áll. Az elsőnél lehet üzenetet küldeni, a másodiknál megtekinteni lehet azokat. (Megtekintés csak bejelentekezett felhasználóknak)</p>
											</article>
									</li>
									<li>
											<article class="box highlight">
												<header>
													<h3>Diagram</h3>
												</header>
												<p>Itt egy diagram található, ahol a rendeles táblából az adatok pizza neve szerint vannak összesítve.</p>
											</article>
									</li>
									<li>
											<article class="box highlight">
												<header>
													<h3>CRUD</h3>
												</header>
												<p>Itt található a CRUD alkalmazás. (Csak admin felhasználóként elérhető!)</p>
											</article>
									</li>
									<li>
											<article class="box highlight">
												<header>
													<h3>Fiók</h3>
												</header>
												<p>Itt lehet regisztrálni és bejelentkezni.</p>
											</article>
									</li>
								</ul>
							</section>
					</div>
			</div>
		</div>
	</section>
@endsection