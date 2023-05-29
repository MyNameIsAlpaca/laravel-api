<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.add_projects', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validation($request);

        $data = $request->all();

        $newProject = new Project();

        if ($request->hasFile('project_image')) {
            $path = Storage::put('project_image', $request->project_image);
            $data['project_image'] = $path;
        };

        $newProject->project_image = $path;
        $newProject->name = $data['name'];
        $newProject->desc = $data['desc'];
        $newProject->link = $data['link'];
        $newProject->publication_date = $data['publication_date'];
        $newProject->type_id = $data['type_id'];

        $newProject->slug = Str::slug($newProject->name, '-');

        $newProject->save();

        if (array_key_exists('technologies', $data)) {

            $newProject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit_project', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $this->validation($request);

        if ($request->hasFile('project_image')) {
            if ($project->project_image) {
                Storage::delete($project->project_image);
            }
            $path = Storage::put('project_image', $request->project_image);

            $data['project_image'] = $path;
        }

        $project->update($data);

        if (array_key_exists('technologies', $data)) {
            $project->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    private function validation($request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'desc' => 'required|max:200',
            'publication_date' => 'required',
            'link' => 'required|max:255',
            'type_id' => 'nullable',
            'project_image' => 'nullable|file|max:2048',
        ], [
            'name.required' => 'Il nome è necessario',
            'name.max' => 'Il nome non può essere più lungo di 100 caratteri',
            'desc.required' => 'Aggiungi una descrizione',
            'desc.max' => 'La descrizione non può essere più lunga di 200 caratteri',
            'publication_date.required' => 'Aggiungi la data di pubblicazione',
            'link.required' => 'Aggiungi un link',
            'link.max' => 'Il link non può essere cosi lungo',
            'project_image.max' => 'La dimensione massima della foto è di 2 MB',

        ])->validate();
    }
}
