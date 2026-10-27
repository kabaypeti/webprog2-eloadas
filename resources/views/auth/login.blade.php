@extends('layouts.main')

@section('title', 'Bejelentkezés')
@section('header')
@section('content')
	
	<section id="main">
		<div class="container">
			<div class="row aln-center">
				<div class="col-6">
				<!-- Main -->
					<form method="POST" action="/login">
						@csrf
						<div class="row gtr-25">
							<div class="col-12">
								<input type="email" id="email" name="email" placeholder="E-mail cím"/>
								<x-error>email</x-error>
							</div>
							<div class="col-12">
								<input type="password" id="password" name="password" placeholder="Jelszó"/>
							</div>
							<div class="col-6">
								<input type="checkbox" id="remember" name="remember"/>
								<label class="small-text" for="remember">Bejelentkezve maradok</label>
							</div>
							<div class="col-12">
								<input type="submit" value="Bejelentkezés"/>
							</div>
							<div class="col-12 center-align">
								<span>Nem vagy még felhasználó? <a href="/register"><strong>Regisztrálj!</strong></a></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection