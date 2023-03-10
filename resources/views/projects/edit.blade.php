@extends('layout')
@section('title', 'Crear Proyecto')
@section('content')
    <h1>Editar Proyecto</h1>
    @include('partials.validation-errors')
    <form method="POST" action="{{ route('projects.update', $project) }}">
        @method('PATCH')
        <div class="custom-file">
            <input type="file" name="name" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile"></label>
        </div>
        @include('projects._form', ['btnText' => 'Actualizar'])

    </form>
@endsection
