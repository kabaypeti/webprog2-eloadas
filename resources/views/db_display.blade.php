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
					
					<table>
						<thead>
							@foreach ($column_names as $name)
								<th>{{$name}}</th>
							@endforeach
						</thead>
						@foreach ($data as $d)
							<tr>
								@foreach ($d as $k => $v)
									<td>{{$v}}</td>
								@endforeach
							</tr>
						@endforeach
					</table>
				</div>
				<x-pager :page="$page" :perpage="$per_page" :maxpages="$max_pages"/>
			</div>
		</div>
	</section>
@endsection