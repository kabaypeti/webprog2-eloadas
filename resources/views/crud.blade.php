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
					
					<div sstyle="margin-bottom: 15px; text-align: left;">
						<a href="{{ route('crud.kategoria.store') }}" class="button small">
							Új kategória hozzáadása
						</a>
					</div>

					<table style="margin-top: 20px;">
						<thead>
							@foreach ($column_names as $name)
								<th>{{$name}}</th>
							@endforeach
							<th></th>
							<th></th>
						</thead>
						@foreach ($data as $d)
							@php
								$primaryKeyValue = $d['id'] ?? reset($d);
							@endphp
							<tr>
								@foreach ($d as $k => $v)
									<td>{{$v}}</td>
								@endforeach
								<td>
										<a href="{{ url('crud/' .  $primaryKeyValue . '/edit') }}" class="button small"  style="height: auto; line-height: inherit; padding: 0 15px;">
											Szerkesztés
										</a>
									</td>
									<td>
										<form action="{{ route('crud.kategoria.destroy',  $primaryKeyValue) }}" method="POST" onsubmit="return confirm('Biztosan törölni szeretnéd ezt a kategóriát?');" style="margin: 0;">
											@csrf
											@method('DELETE')
											<button type="submit" class="button small alert" style="height: auto; line-height: inherit; padding: 0 15px;">
												törlés
											</button>
										</form>
									</td>
							</tr>
						@endforeach
					</table>
				</div>
				<x-pager :page="$page" :perpage="$per_page" :maxpages="$max_pages"/>
			</div>
		</div>
	</section>
@endsection