<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
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

        $newType = new Type();

        $newType->name = $data['name'];
        $newType->desc = $data['desc'];

        $newType->save();

        return redirect()->route('admin.types.index');
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
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validation($request);

        $data = $request->all();

        $type->update($data);

        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        if ($type) {
            $type->delete();
        }

        return redirect()->route('admin.types.index');
    }

    private function validation($request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'desc' => 'required|max:200',
        ], [
            'name.required' => 'Il nome è necessario',
            'name.max' => 'Il nome non può essere più lungo di 100 caratteri',
            'desc.required' => 'Aggiungi una descrizione',
            'desc.max' => 'La descrizione non può essere più lunga di 200 caratteri',
        ])->validate();
    }
}
