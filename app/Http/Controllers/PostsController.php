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

    /**
     * @OA\Get(
     ** path="/api/v1/posts/",
     *   tags={"List"},
     *   summary="List posts",
     *   operationId="listposts",
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/

    /**
     * @OA\Get(
     ** path="/api/v1/posts",
     *   tags={"List Tags"},
     *   summary="List Tags",
     *   operationId="listtag",
     *
     *  @OA\Parameter(
     *      name="tag",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function show(ModelFilters $modelFilters)
    {
        try {
            return $this->postsService->show($modelFilters);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    /**
     * @OA\Post(
     ** path="/api/v1/posts",
     *   tags={"Register Posts"},
     *   summary="Register",
     *   operationId="register",
     *
     *  @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="author",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="content",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   )
     * 
     *)
     **/
    public function register(Request $request)
    {
        try {
            return $this->postsService->register($request);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    /**
     * @OA\Put(
     ** path="/api/v1/posts/{id}",
     *   tags={"Update Posts"},
     *   summary="Update",
     *   operationId="update",
     * 
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=false,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="author",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="content",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   )
     * 
     *)
     **/
    public function update(Request $request, $post_id)
    {
        try {
            return $this->postsService->update($request, $post_id);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    /**
     * @OA\Delete(
     ** path="/api/v1/posts/{id}",
     *   tags={"Delete Post"},
     *   summary="Delete Post",
     *   operationId="deletepost",
     *
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=false,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=204,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Bad Request"
     *   )
     *)
     **/
    public function delete($post_id)
    {
        try {
            return $this->postsService->delete($post_id);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }

    /**
     * @OA\Get(
     ** path="/api/v1/posts/{id}",
     *   tags={"Find Post ID"},
     *   summary="Find Post ID",
     *   operationId="findpostid",
     *
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=false,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Bad Request"
     *   )
     *)
     **/
    public function find($id){
        try {
            return $this->postsService->find($id);
        } catch (\HttpException $e) {
            return ['message' => $e->getMessage(), 'status' => $e->getCode()];
        }
    }
}