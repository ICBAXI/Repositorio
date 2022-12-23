@csrf
<br>
<label>
    Titulo del Proyecto
    <br>
    <input type="text" name="title" value="{{ old('title', $project->title) }}">
</label>
<br>
<label>
    Url del Proyecto
    <br>
    <input type="text" name="url" value="{{ old('url', $project->url) }}">
</label>
<br>
<label>
    Descripción del Proyecto
    <br>
    <textarea type="text" name="description">{{ old('description', $project->description) }}</textarea>
</label>
<br>
<button class="btn btn-primary btn-block mt-4">
    {{ $btnText }}
</button>
