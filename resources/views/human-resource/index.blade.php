<!DOCTYPE html>
<html>
<head>
    <title>Cuhfear</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('human-resource') }}">human resource Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('human-resource') }}">View All human-resource</a></li>
        <li><a href="{{ URL::to('human-resource/create') }}">Create a human resource</a>
    </ul>
</nav>

<h1>All the human-resource</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>NIP</td>
            <td>Tanggal Lahir</td>
            <td>Peran</td>
            <td>Jabatan</td>
        </tr>
    </thead>
    <tbody>
    @foreach($human_resource as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->jenis_kelamin }}</td>
            <td>{{ $value->nip }}</td>
            <td>{{ $value->tanggal_lahir }}</td>
            <td>{{ $value->peran }}</td>
            <td>{{ $value->jabatan }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the human resource (uses the destroy method DESTROY /human-resource/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the human resource (uses the show method found at GET /human-resource/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('human-resource/' . $value->id) }}">Show this human resource</a>

                <!-- edit this human resource (uses the edit method found at GET /human-resource/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('human-resource/' . $value->id . '/edit') }}">Edit this human resource</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
