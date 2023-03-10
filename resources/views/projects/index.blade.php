@extends('layout')
@section('title', 'projects')
@section('content')
    <h1>@lang('Projects')</h1>
    @auth
        <a href="{{ route('projects.create') }}">Crear Proyecto</a>
    @endauth
    <ul>
        @forelse ($projects as $project)
            <a href=""></a>
            <img src="/storage/{{ $project->file }}" alt="{{ $project->title }}">
            <li><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></li>
        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
        {{ $projects->links() }}
    </ul>

@endsection
