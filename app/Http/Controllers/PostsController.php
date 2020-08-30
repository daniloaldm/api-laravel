<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function show()
    {
    	$posts = Posts::all();
    	return response()->json($posts, 200);
    }

    public function register(Request $request)
    {
    	$title = $request->input('title');
    	$author = $request->input('author');
    	$content = $request->input('content');
    	$tags = $request->input('tags');
        
    	$data = array(
            'title' => $title,
            'author' => $author,
            'content' => $content,
            'tags' => $tags
    	);

    	$posts = Posts::create($data);

    	if ($posts) {
    		return response()->json([
                'data' => [
                    'type' => 'posts',
                    'message' => 'Success',
                    'id' => $posts->id,
                    'attributes' => $posts
                ]
            ], 201);
    	} else {
    		return response()->json([
                'type' => 'posts',
                'message' => 'Fail'
            ], 400);
    	}
    }
}