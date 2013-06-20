@layout('master')

@section('styles')
	{{ HTML::style('code-prettify/prettify.css') }}
@endsection
	
@section('content')
	<pre class="prettyprint linenums pastepre">{{ e($paste->content) }}</pre>

	<div class="nav btn-group">
		{{ HTML::link_to_route('new_paste', 'Uusi', null, array('class' => 'btn btn-small btn-danger')) }}
		{{ HTML::link_to_route('fork_paste', 'Muokkaa', array($paste->shortcode), array('class' => 'btn btn-small btn-warning')) }}
	</div>

	<div class="dz-previews">
		@if( $files )
		@foreach( $files as $file )
			<a href="{{ $file->url }}" class="dz-preview btn btn-small btn-info">
				<div class="dz-processing dz-image-preview dz-success">  
					<div class="dz-details">    
						<div class="dz-filename">
							<span data-dz-name="">{{ $file->name }}</span>
						</div>    
						<div class="dz-size" data-dz-size="">
							<strong>{{ $file->size }}</strong>
						</div>    
					</div>   
				</div>
			</a>
		@endforeach
		@endif
	</div>
@endsection

@section('scripts')
	{{ HTML::script('code-prettify/prettify.js') }}
	<script>
		jQuery(document).ready(function($) {
			prettyPrint();
		});
	</script>
@endsection