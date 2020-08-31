<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Tags;

class TagsController extends Controller
{
    public function registerTag($post_id, $tag){
        foreach ($tag as $key => $value) {
            $data = array(
                'tag' => $value,
                'post_id' => $post_id
            );

            $tags = Tags::create($data);
        }

        if ($tags) {
            return response()->json([
                    $tags->id,
            ], 201);
        } else {
            return response()->json([
                'type' => 'tags',
                'message' => 'Fail'
            ], 400);
        }
    }
    public function updateTag($post_id, $tag){
        foreach ($tag as $key => $value) {
            $data = array(
                'tag' => $value,
                'post_id' => $post_id
            );

            $tags = Tags::create($data);
        }

        if ($tags) {
            return response()->json([
                    $tags->id,
            ], 201);
        } else {
            return response()->json([
                'type' => 'tags',
                'message' => 'Fail'
            ], 400);
        }
    }
}