@extends('layouts.main')

@section('title', 'Üzenet')
@section('header')
@section('content')
	<section id="main">
		<div class="container">
			<div class="row aln-center">
				<div id="content" class="col-8 col-12-medium">

					@isset ($feedback)
						<x-feedback :feedback="$feedback">message_success</x-feedback>
					@endisset
					
					<h2>Új üzenet küldése</h2>

					<form action="{{ route('uzenetek.store') }}" method="POST" style="margin-top: 20px;">
						@csrf
						<div class="row gtr-uniform">
							<div class="col-12" style="margin-bottom: 5px;">
								<label for="szoveg">Üzenet:</label>
								<textarea name="szoveg" id="szoveg" placeholder="Írd ide az üzeneted..." rows="5" required>{{ old('szoveg') }}</textarea>
								<x-error>szoveg</x-error>
							</div>
							<div class="col-12">
								<button type="submit" class="button primary">Küldés</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection