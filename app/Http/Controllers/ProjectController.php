<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Http\Requests\UploadProjectsRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    public function store(SaveProjectRequest $request)
    {

        $fileModel = new Project();
        if ($request->file()) {


            $fileModel = new Project($request->validated());
            $url = $request->root();
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->title = $request->string('title');
            $fileModel->url = $request->string('url');
            $fileModel->description = $request->string('description');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = $url . '/storage/' . $filePath;
            $fileModel->save();

            return redirect()->route('projects.index')->with('status', 'El Proyecto fue Creado con Éxito.');
        }


    }

    public function download(Project $project)
    {
        $file_path = public_path() . "/" . $project->file;
        return Response::download($file_path);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, UploadProjectsRequest $request)
    {

        $project->update($request->validated());


        $fileModel = new Project();

        if ($request->hasFile('name')) {


            $fileModel = $project->fill($request->validated());
            $url = $request->root();
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('name')->storeAs('uploads', $fileName, 'public');
            $fileModel->title = $request->string('title');
            $fileModel->url = $request->string('url');
            $fileModel->description = $request->string('description');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = $url . '/storage/' . $filePath;
            $fileModel->save();

            return redirect()->route('projects.index')->with('status', 'El Proyecto fue Creado con Éxito.');
        } else {
            $project->update(array_filter($request->validated()));
        }
        return redirect()->route('projects.show', $project)->with('status', 'El Proyecto fue Actualizado con Éxito.');

    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'El Proyecto fue Eliminado con Éxito.');
    }
}