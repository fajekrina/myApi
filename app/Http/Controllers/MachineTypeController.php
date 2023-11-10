<?php

namespace App\Http\Controllers;

use App\Models\MachineType;
use Illuminate\Http\Request;
use App\Http\Requests\MachineTypeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MachineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine_types = MachineType::all();

        return view('machine_type.index', compact('machine_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machine_type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineTypeRequest $request)
    {
        $validatedData = $request->all();
        
        $machine_type = MachineType::create($validatedData);
        
        return redirect()->route('machine_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine_type = MachineType::findOrFail($id);

        return view('machine_type.show', compact('machine_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine_type = MachineType::findOrFail($id);

        return view('machine_type.edit', compact('machine_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineTypeRequest $request, $id)
    {
        $validatedData = $request->all();

        $machine_type = MachineType::findOrFail($id);

        $machine_type->update($validatedData);

        return redirect()->route('machine_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine_type = MachineType::findOrFail($id);

        $machine_type->delete();

        return redirect()->route('machine_type.index');
    }
}
