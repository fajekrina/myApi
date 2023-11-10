<?php

namespace App\Http\Controllers;

use App\Models\MachineBrand;
use Illuminate\Http\Request;
use App\Http\Requests\MachineBrandRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MachineBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine_brands = MachineBrand::all();

        return view('machine_brand.index', compact('machine_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machine_brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineBrandRequest $request)
    {
        $validatedData = $request->all();
        
        $machine_brand = MachineBrand::create($validatedData);
        
        return redirect()->route('machine_brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine_brand = MachineBrand::findOrFail($id);

        return view('machine_brand.show', compact('machine_brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine_brand = MachineBrand::findOrFail($id);

        return view('machine_brand.edit', compact('machine_brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineBrandRequest $request, $id)
    {
        $validatedData = $request->all();

        $machine_brand = MachineBrand::findOrFail($id);

        $machine_brand->update($validatedData);

        return redirect()->route('machine_brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine_brand = MachineBrand::findOrFail($id);

        $machine_brand->delete();

        return redirect()->route('machine_brand.index');
    }
}
