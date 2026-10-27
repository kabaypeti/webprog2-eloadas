@extends('layouts.main')

@section('title', 'Regisztráció')
@section('header')
@section('content')
	
	<section id="main">
		<div class="container">
			<div class="row aln-center">
				<div class="col-6">
				<!-- Main -->
					<form method="POST" action="/register">
						@csrf
						<div class="row gtr-25">
							<div class="col-12">
								<input type="text" id="name" name="name" placeholder="Teljes név"/>
								<x-error>name</x-error>
							</div>
							<div class="col-12">
								<input type="email" id="email" name="email" placeholder="E-mail cím"/>
								<x-error>email</x-error>
							</div>
							<div class="col-12">
								<input type="password" id="password" name="password" placeholder="Jelszó"/>
								<x-error>password</x-error>
							</div>
							<div class="col-12">
								<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Jelszó megerősítése"/>
								<x-error>password_confirmation</x-error>
							</div>
							<div class="col-12">
								<input type="submit" value="Regisztráció"/>
							</div>
							<div class="col-12 center-align">
								<span>Van már fiókod? <a href="/login"><strong>Bejelentkezés</strong></a></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection