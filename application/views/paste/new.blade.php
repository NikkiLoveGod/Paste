@layout('master')

@section('content')
	
	{{ Form::open(URL::to_route('paste', $shortcode), 'POST', array('class' => 'dropzone', 'id' => 'dropzone' )) }}	
		{{ Form::textarea('paste', Input::old('paste', $paste), array('class' => "pastebox", 'autofocus' => 'true' )) }}

		<div class="nav btn-group">
			{{ HTML::link_to_route('new_paste', 'Uusi', null, array('class' => 'btn btn-small btn-danger')) }}
			{{ Form::submit('Tallenna', array('class' => 'btn btn-small btn-success')) }}
		</div>

		<div class="dz-previews"></div>
	{{ Form::close() }}

@endsection

	
@section('scripts')
	<script>
		Dropzone.options.dropzone = {
			url: '{{ URL::to_route("upload", $shortcode) }}',
			previewsContainer: '.dz-previews'
		}
	</script>
@endsection