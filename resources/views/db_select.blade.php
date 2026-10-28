@extends('layouts.main')

@section('title', 'Adatbázis')
@section('header')
@section('content')

	<section id="features">
		<div class="container">
			<div class="row aln-center">
				<div class="col-4 col-6-medium col-12-small">
					<section>
						<a href="/db/kategoria" class="image featured"><img src="/images/pic01.jpg" alt="" /></a>
						<header><h3>Kategóriák</h3></header>
					</section>
				</div>
				<div class="col-4 col-6-medium col-12-small">
					<section>
						<a href="/db/pizza" class="image featured"><img src="/images/pic02.jpg" alt="" /></a>
						<header><h3>Pizzák</h3></header>
					</section>
				</div>
				<div class="col-4 col-6-medium col-12-small">
					<section>
						<a href="/db/rendeles" class="image featured"><img src="/images/pic03.jpg" alt="" /></a>
						<header><h3>Rendelések</h3></header>
					</section>
				</div>
			</div>
		</div>
	</section>
@endsection