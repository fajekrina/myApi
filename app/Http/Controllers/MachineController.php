<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineBrand;
use App\Models\MachineType;
use App\Models\MachineMutation;
use Illuminate\Http\Request;
use App\Http\Requests\MachineRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::all();

        return view('machine.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machine_brands = MachineBrand::all();
        $machine_types = MachineType::all();

        return view('machine.add', compact('machine_brands', 'machine_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineRequest $request)
    {
        $validatedData = $request->all();
        
        $machine = Machine::create($validatedData);
        
        return redirect()->route('machine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine = Machine::with('machine_brand', 'machine_type')->findOrFail($id);
        // dd($machine);

        return view('machine.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
        $machine_brands = MachineBrand::all();
        $machine_types = MachineType::all();


        return view('machine.edit', compact('machine', 'machine_brands', 'machine_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineRequest $request, $id)
    {
        $validatedData = $request->all();

        $machine = Machine::findOrFail($id);

        $machine->update($validatedData);

        if(
            trim(strtolower($validatedData["warehouse_location"])) != trim(strtolower($machine->warehouse_location)) ||
            trim(strtolower($validatedData["station_location"])) != trim(strtolower($machine->station_location)) ||
            trim(strtolower($validatedData["floor_location"])) != trim(strtolower($machine->floor_location))
        ) {
            $mutation = new Mutation;
            $mutation->barcode_id = $id;
            $mutation->previous_warehouse_location = $machine->warehouse_location;
            $mutation->previous_station_location = $machine->station_location;
            $mutation->previous_floor_location = $machine->floor_location || null;
            $mutation->new_warehouse_location = $$validatedData["warehouse_location"];
            $mutation->new_station_location = $validatedData["station_location"];
            $mutation->new_floor_location = $validatedData["floor_location"] || null;

        }

        return redirect()->route('machine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);

        $machine->delete();

        return redirect()->route('machine.index');
    }
}
