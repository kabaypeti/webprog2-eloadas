@extends('layouts.main')

@section('title', 'Adatbázis')
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
							@foreach ($tablecolumns as $column)
								<th>{{$column}}</th>
							@endforeach
						</thead>
						@foreach ($tabledata as $data)
							<tr>
								@foreach ($data as $key => $value)
									<td>{{$value}}</td>
								@endforeach
							</tr>
						@endforeach
					</table>
					@if ($overlimit && !isset($_POST['no_limit']))
						<form method="POST">
							@csrf
							<input type="hidden" name="no_limit" value="{{ true }}"/>
							<div class="col-12">
								<input type="submit" value="Összes megjelenítése">
							</div>
						</form>
					@endif

				</div>
			</div>
		</div>
	</section>
@endsection