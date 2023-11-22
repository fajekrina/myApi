<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_units;
use App\Http\Requests\MUnitRequest;
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
        try {
            $units = m_units::all();
    
            if (count($units) < 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unit not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $units,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve unit',
                'error' => $error,
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        try {
            $unit = m_units::create($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Unit created successfully',
                'data' => $unit,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create unit',
                'error' => $error,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $unit = m_units::find($id);
    
            if (!$unit) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unit not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $unit,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve unit',
                'error' => $error,
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        try {
            $unit = m_units::find($id);

            if (!$unit) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unit not found',
                ], 404);
            }
    
            $unit->update($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Unit updated successfully',
                'data' => $unit,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update unit',
                'error' => $error,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $unit = m_units::find($id);
    
            if (!$unit) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unit not found',
                ], 404);
            }
    
            $unit->delete();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Unit deleted successfully',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete unit',
                'error' => $error,
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $key = $request->input('key');

            $units = m_units::where('name', 'like', '%' . $key . '%')->get();
    
            if (count($units) < 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unit not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $units,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve unit',
                'error' => $error,
            ], 500);
        }
    }
}
