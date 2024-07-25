@extends('layouts.app')
@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(count($photos) == 0)
        <h1 class="text-center">Nessuna foto disponibile</h1>

    @else
        <table style="width: 100%" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>URL</th>
                    <th>Preview</th>
                    <th>Data Caricamento</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td>{{ $photo->title }}</td>
                        <td>{{ $photo->url }}</td>
                        <td><img src="/storage{{ $photo->url }}" alt="{{ $photo->title }}"></td>
                        <td>{{ $photo->created_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('photos.show', ['photo' => $photo->id]) }}">Vedi</a>
                            <a class="btn btn-primary" href="{{ route('photos.edit', ['photo' => $photo->id]) }}">Modifica</a>
                            <form method="POST" action="{{ route('photos.destroy', ['photo' => $photo->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
