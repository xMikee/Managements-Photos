@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('photos.update', ['photo' => $photo->id]) }}">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Inserisci il titolo" value="{{ old('title', $photo->title) }}">
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control" placeholder="Inserisci l'url" value="{{ old('url',$photo->url) }}">
            <a class="btn btn-primary" id="screenshot-button">Preview Image</a>
        </div>
        <div class="form-group">
            <label for="description">Preview</label>
            <img id="photo-preview" src="{{ old('url') }}" alt="{{ old('title') }}">
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    <script>
        document.getElementById('screenshot-button').addEventListener('click',function () {
            const photoUrl = document.getElementById('url').value;
            if(photoUrl != null && photoUrl.trim() != '' ) {
                document.getElementById('photo-preview').src = '/storage/'+photoUrl;
                document.getElementById('photo-preview').style.display = 'block';
            }
        });
    </script>
@endsection
