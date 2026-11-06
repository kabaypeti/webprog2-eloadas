@extends('layouts.main')

@section('title', 'Üzenet')
@section('header')
@section('content')
	<section id="main">
		<div class="container">
			<div class="row aln-center">
				<div id="content" class="col-8 col-12-medium">

					<h2 style="color: #2da949; margin-bottom: 20px;">Üzenet küldése sikeres!</h2>
					<p>Az üzenetedet rögzítettük az adatbázisban.</p>

					<div style="margin-top: 30px;">
						<a href="/" class="button primary">
							Vissza a főoldalra
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
@endsection