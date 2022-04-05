@extends('layouts.app')
@section('content')
    <a type="button" class="btn btn-success" href="{{route('building-create')}}">Create Building</a>

    <div id="app">
        <building></building>
    </div>
@endsection
