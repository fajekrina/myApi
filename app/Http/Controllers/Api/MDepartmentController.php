<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_departments;
use App\Http\Requests\MDepartmentRequest;
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
        try {
            $departments = m_departments::all();
    
            if (count($departments) < 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Department not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $departments,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve department',
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
    public function store(MDepartmentRequest $request)
    {
        $validatedData = $request->all();

        $validatedData['id'] = Str::uuid();

        try {
            $department = m_departments::create($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Department created successfully',
                'data' => $department,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create department',
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
            $department = m_departments::find($id);
    
            if (!$department) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Department not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $department,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve department',
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
    public function update(MDepartmentRequest $request, $id)
    {
        $validatedData = $request->all();

        try {
            $department = m_departments::find($id);

            if (!$department) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Department not found',
                ], 404);
            }
    
            $department->update($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Department updated successfully',
                'data' => $department,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update department',
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
            $department = m_departments::find($id);
    
            if (!$department) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Department not found',
                ], 404);
            }
    
            $department->delete();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Department deleted successfully',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete department',
                'error' => $error,
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $key = $request->input('key');

            $departments = m_departments::where('name', 'like', '%' . $key . '%')->get();
    
            if (count($departments) < 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Department not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $departments,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve department',
                'error' => $error,
            ], 500);
        }
    }
}
