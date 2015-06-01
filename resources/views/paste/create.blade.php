@extends('master')

@section('header')
    {!! link_to_route('paste.create', 'Uusi') !!}

    {!! Form::open(['url' => '/store', 'method' => 'POST', 'class' => 'inline-form save-paste']) !!}
        {!! Form::hidden('content', '', ['class' => 'content-paste']) !!}
        {!! Form::submit('Tallenna', ['class' => 'submit-paste']) !!}

        {!! Form::select('mode', $modes, $type, ['class' => 'mode-selector']) !!}

    {!! Form::close() !!}

@stop

@section('content')
    <div id="editor"></div>

    <script>
        var mode = "{{ $type }}";
    </script>
    @if($paste)
        <script>
            var paste = {!! $paste !!}
        </script>
    @endif
@stop