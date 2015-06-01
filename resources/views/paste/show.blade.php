@extends('master')

@section('header')
    {!! link_to_route('paste.create', 'Uusi') !!}
    {!! link_to_route('paste.fork', 'Muokkaa', [$paste->getHash()]) !!}
@stop

@section('content')
    <div id="editor" class="show-paste"></div>

    <script>
        var paste = {!! $paste !!}
    </script>
@stop