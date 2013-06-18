@layout('master')

@section('content')
	{{ Form::open('/') }}	
		{{ Form::textarea('paste', Input::old('paste', $paste), array('class' => "pastebox", 'autofocus' => 'true' )) }}

		<div class="nav btn-group">
			{{ HTML::link_to_route('new_paste', 'Uusi', null, array('class' => 'btn btn-small btn-danger')) }}
			{{ Form::submit('Tallenna', array('class' => 'btn btn-small btn-success')) }}
		</div>
	{{ Form::close() }}
@endsection
