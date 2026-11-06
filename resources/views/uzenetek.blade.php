@extends('layouts.main')

@section('title', 'Üzenetek')
@section('header')
@section('content')
	<section id="main">
		<div class="container">
			<div class="row aln-center">
				<div id="content" class="col-8 col-12-medium">
					
					<h2>Üzenetek</h2>
					
					<div style="margin-top: 30px;">
						@forelse ($uzenetek as $u)
							<div style="background: #f8f9fa; border: 1px solid #dbdbdb; border-radius: 6px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">

								<div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e6e6e6; padding-bottom: 8px; margin-bottom: 12px;">
									<strong style="color: #333; font-size: 1.1em;">{{ $u->felhasznalo }}</strong>
									<span style="color: #888; font-size: 0.9em;">{{ $u->created_at->format('Y.m.d. H:i') }}</span>
								</div>

								<div style="color: #555; line-height: 1.6; white-space: pre-wrap;">{{ $u->szoveg }}</div>
								
							</div>
						@empty
							<p style="text-align: center; color: #888;">Még nem érkezett üzenet.</p>
						@endforelse
					</div>

				</div>
			</div>
		</div>
	</section>
@endsection