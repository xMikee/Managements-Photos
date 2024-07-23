@if(count($photos) == 0)
    <h1 class="text-center">Nessuna foto disponibile</h1>

@else
    <table style="width: 100%" class="table table-striped">
        <thead>
            <tr><th>ID</th>
            <th>Nome</th>
            <th>URL</th>
            <th>Preview</th>
            <th>Data Caricamento</th></tr>
        </thead>
        <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td>{{ $photo->title }}</td>
                    <td>{{ $photo->url }}</td>
                    <td><img src="/storage{{ $photo->url }}" alt="{{ $photo->title }}"></td>
                    <td>{{ $photo->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
