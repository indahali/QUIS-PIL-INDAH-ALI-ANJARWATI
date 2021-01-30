@extends('layouts.app')

@section('title', 'note')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Description : {{ $note['description'] }}</h3>

</div>
@endsection