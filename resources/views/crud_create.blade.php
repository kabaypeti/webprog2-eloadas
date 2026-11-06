@extends('layouts.main')

@section('title', 'CRUD')
@section('head')
	<link rel="stylesheet" 
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back,arrow_forward"
	/>
@endsection
@section('header')
@section('content')
	<section id="main">
		<div class="container">
			<!-- Main -->
			<div class="row aln-center">
				
				<!-- Content -->
				<div id="content" class="col-8 col-12-medium">
					
					<h2>Új kategória hozzáadása</h2>
					

					<form action="{{ route('crud.kategoria.store') }}" method="POST" style="margin-top: 20px;">
						@csrf
						
						<div class="row gtr-uniform">
							<div class="col-12">
								<label Model="nev">Kategória neve:</label>
								<input type="text" name="nev" id="nev" value="{{ old('nev') }}" placeholder="kategória név" required />
								<x-error>nev</x-error>
							</div>

							<div class="col-12" style="margin-bottom: 15px;">
								<label for="ar">Ár:</label>
            					<input type="text" name="ar" id="ar" value="{{ old('ar') }}" inputmode="numeric" pattern="[0-9]*" placeholder="ár" required />
								<x-error>ar</x-error>
							</div>
							
							<div class="col-12" style="margin-top: 20px;">
								<ul class="actions">
									<li><button type="submit" class="button primary">Mentés</button></li>
								</ul>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>
@endsection