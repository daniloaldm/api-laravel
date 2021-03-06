<?php

namespace App\Repositories;

use App\Repositories\Contracts\PostsRepositoryInterface;
use App\Soda;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;

class PostsRepository implements PostsRepositoryInterface
{
    public function show(ModelFilters $modelFilters){
        if (!empty($modelFilters->filters())) {
            $posts = Tags::filter($modelFilters)->with('tags')->orderByDesc('id')->get();
            return response()->json($posts, 200);
        } else {
            $posts = Posts::all()->map(function ($postTag) {
                $postTag['tags'] = $postTag->tags()->get()->pluck('tag')->all();
                return $postTag;
             })->all();
             return response()->json($posts, 200);
        }
    }

    public function register(Request $request){
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

    public function update(Request $request, $post_id){
        $post = Posts::find($post_id);
        $tag = Tags::where('post_id', $post_id)->delete();
    	if ($post) {
    		$post->title = $request->input('title');
    		$post->author = $request->input('author');
    		$post->content = $request->input('content');
            $tags = $request->input('tags');
            app('App\Http\Controllers\TagsController')->registerTag($post_id, $tags);
    		$post->save();

    		return response()->json([
                'title' => $post->title,
                'author' => $post->author,
                'content' => $post->content,
                'tags' => $tags,
                'id' => $post->id
            ], 201);
    	} else {
    		return response()->json([
                'type' => 'posts',
                'message' => 'Not Found'
            ], 404);
    	}
    }

    public function delete($post_id){
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

    public function find(int $id){
        $post = Posts::with('tags')->find($id);
    	if ($id) {
            return response()->json($post, 200);
    	} else {
    		return response()->json([
                'type' => 'posts',
                'message' => 'Fail'
            ], 404);
    	}
    }

}