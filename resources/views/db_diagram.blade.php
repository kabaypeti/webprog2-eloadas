@extends('layouts.main')

@section('title', 'Adatbázis')
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
					
					<canvas id="diagram">
					</canvas>
				</div>
			</div>
		</div>
	</section>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		const ctx = document.getElementById('diagram');
		
		var pizzanev = @json($data_pizzanev);
		var darab = @json($data_darab).map(function(v) { return parseInt(v); });
		var min = Math.min(...darab) - 20;
		console.log(darab);
		
		const data = {
			labels: pizzanev,
			datasets: [{
				label: 'Összesen rendelt darabszám',
				data: darab,
				hoverOffset: 0,
				backgroundColor: 'rgba(235, 70, 38, 0.8)',
				barThickness: 10,
				hoverBackgroundColor: 'rgba(255, 165, 82, 1)'
			}]
		};
		new Chart(ctx, {
			type: 'bar',
			data: data,
			options: {
				responsive: true,
				maintainAspectRatio: true,
				scales: {
					y: {
						min: min
					},
				}
			}
		});
	</script>
@endsection