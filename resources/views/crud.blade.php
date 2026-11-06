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
					
					<div style="margin-bottom: 15px; text-align: left;">
						<a style="width:100%" href="{{ route('crud.kategoria.create') }}" class="button small">
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
									<a href="{{ route('crud.kategoria.edit', $primaryKeyValue) }}" class="button small"  style="height: auto; line-height: inherit; padding: 0 15px;">
										Szerkesztés
									</a>
								</td>
								<td>
									<a href="#" class="button small alert" onclick="
											event.preventDefault();
											if (confirm('Biztosan törölni szeretnéd ezt a kategóriát?')) {
												document.getElementById('delete-{{$primaryKeyValue}}').submit();
											}
										" 
										style="height: auto; line-height: inherit; padding: 0 15px;">
										Törlés
									</a>
									<form id="delete-{{$primaryKeyValue}}" action="{{ route('crud.kategoria.destroy', $primaryKeyValue) }}" method="POST" style="margin: 0;">
										@csrf
										@method('DELETE')
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