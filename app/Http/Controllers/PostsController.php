<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Tags;
use App\Http\Controllers;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;

class PostsController extends Controller
{
    /**
     * @param \eloquentFilter\QueryFilter\ModelFilters\ModelFilters $modelFilters
     */
    public function show(ModelFilters $modelFilters)
    {

        if (!empty($modelFilters->filters())) {
            $posts = Tags::filter($modelFilters)->with('tags')->orderByDesc('id')->get();
        } else {
            $posts = Posts::all()->map(function ($postTag) {
                $postTag['tags'] = $postTag->tags()->get()->pluck('tag')->all();
                return $postTag;
             })->all();
        }
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
            'content' => $content
        );

    	$posts = Posts::create($data);

    	if ($posts) {
            app('App\Http\Controllers\TagsController')->registerTag($posts->id, $tags);
    		return response()->json([
                'title' => $posts->title,
                'author' => $posts->author,
                'content' => $posts->content,
                'tags' => $tags,
                'id' => $posts->id
            ], 201);
    	} else {
    		return response()->json([
                'type' => 'posts',
                'message' => 'Fail'
            ], 400);
    	}
    }

    public function update(Request $request, $post_id)
    {
    	$post = Posts::find($post_id);

    	if ($post) {
    		$post->title = $request->input('title');
    		$post->author = $request->input('author');
    		$post->content = $request->input('content');
    		$post->tags = $request->input('tags');
    		$post->save();

    		return response()->json([
                'data' => [
                    'type' => 'posts',
                    'message' => 'Update Success',
                    'id' => $post->id,
                    'attributes' => $post
                ]
            ], 201);
    	} else {
    		return response()->json([
                'type' => 'posts',
                'message' => 'Not Found'
            ], 404);
    	}
    }

    public function delete($post_id)
    {
        $post = Posts::find($post_id);

        if ($post) {
            $post->delete();

            return response()->json([], 204);
        } else {
            return response()->json([
                'type' => 'posts',
                'message' => 'Not Found'
            ], 404);
        }
    }
}