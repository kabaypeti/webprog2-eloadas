@extends('layouts.main')

@section('title', 'CRUD')
@section('header')
@section('content')
	<section id="main">
		<div class="container">
			<!-- Main -->
			<div class="row aln-center">
				
				<!-- Content -->
				<div id="content" class="col-8 col-12-medium">
					
					<h2>Új kategória hozzáadása</h2>
					
					<form action="{{ route('crud.kategoria.store') }}" method="POST">
						@csrf
						
						<div class="row gtr-uniform">
							<div class="col-12">
								<input type="text" name="nev" id="nev" value="{{ old('nev') }}" placeholder="Kategória neve" required />
								<x-error>nev</x-error>
							</div>
							<div class="col-12">
            					<input type="text" name="ar" id="ar" value="{{ old('ar') }}" inputmode="numeric" pattern="[0-9]*" placeholder="Ár" required />
								<x-error>ar</x-error>
							</div>
							<div class="col-12">
								<button type="submit" class="button primary">Mentés</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>
@endsection