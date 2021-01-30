@extends('layouts.app')

@section('title', 'notes')

@section('content')
<a href="/notes/create" class="card-link btn-primary">Tambah Note</a>
@foreach ($notes as $note)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/notes/{{$note['id']}}" class="card-title">{{ $note['description'] }}</a>
   
    <hr>
      <a href="/presents/create" class="card-link btn-primary">Tambah Mahasiswa</a>
        @foreach ($note->presents as $present)
          <li>{{$present->nama}}</li>
        @endforeach
    <hr>
    <a href="/notes/{{$note['id']}}/edit" class="card-link btn-warning">Edit Note</a>
    <form action="/notes/{{ $note['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete Note</a>
    </form>
  </div>
</div>
    
@endforeach
<div>
{{ $notes->links() }} </div>
@endsection

