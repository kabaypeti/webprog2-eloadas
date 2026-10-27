@extends('layouts.main')

@section('title', 'Regisztráció')
@section('header')
@section('content')
	
	<section id="main">
		<div class="container">
			<div class="row aln-center">
				<div class="col-6">
				<!-- Main -->
					<form method="POST" action="/forgot-password">
						@csrf
						<div class="row gtr-25">
							<div class="col-12">
								<input type="email" id="email" name="email" placeholder="E-mail cím"/>
								<x-error>email</x-error>
							</div>
							<div class="col-12">
								<input type="submit" value="E-mail küldése"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection