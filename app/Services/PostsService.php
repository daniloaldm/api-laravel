<?php

namespace App\Services;

use App\Repositories\Contracts\PostsRepositoryInterface;
use App\Services\Contracts\PostsServiceInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;
use App\Models\Posts;
use App\Models\Tags;

class PostsService implements PostsServiceInterface
{
    private $postsRepository;

    public function __construct(PostsRepositoryInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function show(ModelFilters $modelFilters){
        return $this->postsRepository->show($modelFilters);
    }

    public function register(Request $request){
        return $this->postsRepository->register($request);
    }

    public function update(Request $request, $post_id){
        return $this->postsRepository->update($request, $post_id);
    }

    public function delete($post_id){
        return $this->postsRepository->delete($post_id);
    }

    public function find($id){
        return $this->postsRepository->find($id);
    }
}