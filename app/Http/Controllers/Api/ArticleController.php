<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ArticleRequest $request)
    {
        $validatedData = $request->all();

        try {
            $article = Article::create($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Article created successfully',
                'data' => $article,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create article',
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
            $article = Article::find($id);
    
            if (!$article) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Article not found',
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $article,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve article',
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
    public function update(ArticleRequest $request, $id)
    {
        $validatedData = $request->all();

        try {
            $article = Article::find($id);

            if (!$article) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Article not found',
                ], 404);
            }
    
            $article->update($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Article updated successfully',
                'data' => $article,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update article',
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
            $article = Article::find($id);
    
            if (!$article) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Article not found',
                ], 404);
            }
    
            $article->delete();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Article deleted successfully',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete article',
            ], 500);
        }
    }
}
