<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Tags;
use App\Http\Controllers;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;
use App\Services\Contracts\PostsServiceInterface;

class PostsController extends Controller
{

    private $postsService;

    public function __construct(PostsServiceInterface $postsService)
    {
        $this->postsService = $postsService;
    }

    public function show(ModelFilters $modelFilters)
    {
        try {
            return $this->postsService->show($modelFilters);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    public function register(Request $request)
    {
        try {
            return $this->postsService->register($request);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    public function update(Request $request, $post_id)
    {
        try {
            return $this->postsService->update($request, $post_id);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    public function delete($post_id)
    {
        try {
            return $this->postsService->delete($post_id);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    public function find($id){
        try {
            return $this->postsService->find($id);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }
}