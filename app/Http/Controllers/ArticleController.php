<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return Article::all();
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        try {
            $article = Article::create($request->all());

            return response()->json($article, 201);
        }
        catch (\Exception $e){
            return response()->json([
                "status"    => 'failed',
                'statusCode'    => 400,
                'message'       => $e->getMessage()
            ], 400);
        }

    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
