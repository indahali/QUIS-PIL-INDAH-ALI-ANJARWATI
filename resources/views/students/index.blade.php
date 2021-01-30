@extends('layouts.app')

@section('title', 'student')
@section('content')
<a href="/students/create" type="button" class="btn btn-secondary mb-2 btn-sm">Tambah Mahasiswa</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nama Mahasiswa</th>
      <th scope="col">Alamat</th>
      <th scope="col">NO Telepon</th>
      <th scope="col">Email</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($students as $student)
    <tr>
    <td>{{$student->nama_mahasiswa}}</td>
    <td>{!!$student->alamat !!}</td>
    <td>{!!$student->no_tlp !!}</td>
    <td>{!!$student->email !!}</td>
 
    <td><a href="/students/{{$student->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/students/{{$student->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $students -> links() }}
    </div>
@endsection