<!DOCTYPE html>
<html>
<head>
	<title>G-Works Paste</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/main.css') }}
	@yield('styles')
</head>
<body>
	<header>
		<h1>
			<a href="{{ URL::to_route('pastes') }}">
				{{ HTML::image('img/gworks.png', 'G-Works Oy', array('class' =>'logo'))}}
			</a>
		</h1>
	</header>

	@if(Session::get('message'))
		<div class="message alert alert-error">{{ Session::get('message') }}</div>
	@endif

	@if($errors->has())
		<div class="message alert alert-error">{{ $errors->first() }}</div>
	@endif

	<div class="content">
		@yield('content')
	</div>

	{{ HTML::script('js/vendors/jquery.js') }}
	{{ HTML::script('js/vendors/tabby.js') }}
	{{ HTML::script('js/vendors/bootstrap.js') }}
	{{ HTML::script('js/main.js') }}
	@yield('scripts')
</body>
</html>