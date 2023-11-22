<?php

namespace App\Http\Controllers;

use App\Models\m_units;
use Illuminate\Http\Request;
use App\Http\Requests\MUnitRequest;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = m_units::all();

        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MUnitRequest $request)
    {
        $validatedData = $request->all();

        $validatedData['id'] = Str::uuid();
        
        $unit = m_units::create($validatedData);
        
        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = m_units::findOrFail($id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = m_units::findOrFail($id);

        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MUnitRequest $request, $id)
    {
        $validatedData = $request->all();

        $unit = m_units::findOrFail($id);

        $unit->update($validatedData);

        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = m_units::findOrFail($id);

        $unit->delete();

        return redirect()->route('unit.index');
    }
}
