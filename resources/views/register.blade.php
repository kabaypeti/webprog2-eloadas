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
						<div class="row gtr-50">
							<x-errors/>
							<div class="col-12">
								<input type="text" id="name" name="name" placeholder="Teljes név"/>
							</div>
							<div class="col-12">
								<input type="email" id="email" name="email" placeholder="E-mail cím"/>
							</div>
							<div class="col-12">
								<input type="password" id="password" name="password" placeholder="Jelszó"/>
							</div>
							<div class="col-12">
								<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Jelszó megerősítése"/>
							</div>
							<div class="col-12">
								<input type="submit" value="Regisztráció"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection