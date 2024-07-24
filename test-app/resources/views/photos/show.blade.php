@extends('layouts.layout-bootstrap')

@section('content')

    <h1>{{ $photo->title }}</h1>
    <img src="/storage{{ $photo->url }}" alt="{{ $photo->title }}">
    <p>Creato il : {{ $photo->created_at }}</p>
@endsection
