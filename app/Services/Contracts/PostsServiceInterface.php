<?php

namespace App\Services\Contracts;
use Illuminate\Http\Request;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;

interface PostsServiceInterface
{
    public function show(ModelFilters $modelFilters);

    public function register(Request $request);

    public function update(Request $request, int $post_id);

    public function delete(int $post_id);

    public function find(int $id);

}