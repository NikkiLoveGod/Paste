@layout('master')

@section('content')
	{{ Form::open('/') }}	
		{{ Form::textarea('paste', Input::old('paste', $paste->content), array('class' => "pastebox")) }}

		{{ HTML::link_to_route('new_paste', 'New') }}
		{{ Form::submit('Save') }}
	{{ Form::close() }}
@endsection