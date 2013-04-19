@layout('master')

@section('content')
	
	@if($pastes)
		<ul class="pastes">
		@foreach($pastes as $paste)
			<li>
				{{ HTML::link_to_route('paste', $paste->shortcode . ' ' . date('j.n.Y', strtotime($paste->updated_at)), array($paste->shortcode), array('class' => 'btn btn-info')) }}
			</li>
		@endforeach
		</ul>
	@endif
	

	<div class="nav btn-group">
		{{ HTML::link_to_route('new_paste', 'Uusi', null, array('class' => 'btn btn-mini btn-danger')) }}
	</div>
@endsection

