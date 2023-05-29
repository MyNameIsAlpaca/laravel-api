<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create');
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

        $newTechnology = new Technology();

        $newTechnology->name = $data['name'];
        $newTechnology->color = $data['color'];

        $newTechnology->save();

        return redirect()->route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $this->validation($request);

        $data = $request->all();

        $technology->update($data);

        return redirect()->route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Technology::find($id);
        if ($type) {
            $type->delete();
        }

        return redirect()->route('admin.technologies.index');
    }

    private function validation($request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'color' => 'required|max:7',
        ], [
            'name.required' => 'Il nome è necessario',
            'name.max' => 'Il nome non può essere più lungo di 100 caratteri',
            'color.required' => 'Aggiungi un colore',
            'color.max' => 'Il colore non può essere più lunga di 7 caratteri',
        ])->validate();
    }
}
