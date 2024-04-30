<?php

namespace App\Interfaces\Post;

use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\Post;

interface PostRepositoryInterface
{
    public function getPosts(DataTables $dataTables, Post $post, string $role = 'admin'): JsonResponse;
    public function storePost(array $data): Post;
    public function updatePost(Post $post, array $data): void;
    public function deletePost(Post $post): void;
}
