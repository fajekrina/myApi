<?php

namespace App\Http\Controllers;

use App\Models\m_units;
use App\Models\m_departments;
use Illuminate\Http\Request;
use App\Http\Requests\MDepartmentRequest;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = m_departments::with('unit')->get();

        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = m_units::all();
        
        return view('department.add', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MDepartmentRequest $request)
    {
        $validatedData = $request->all();

        $validatedData['id'] = Str::uuid();
        
        $department = m_departments::create($validatedData);
        
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = m_departments::with('unit')->findOrFail($id);

        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = m_departments::findOrFail($id);
        $units = m_units::all();

        return view('department.edit', compact('department', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MDepartmentRequest $request, $id)
    {
        $validatedData = $request->all();

        $department = m_departments::findOrFail($id);

        $department->update($validatedData);

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = m_departments::findOrFail($id);

        $department->delete();

        return redirect()->route('department.index');
    }
}
