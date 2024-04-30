<?php

namespace App\Repositories;
use App\Interfaces\Post\PostRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\Post;

use Illuminate\Support\Facades\Gate;

class PostRepository implements PostRepositoryInterface
{
    public function getPosts(DataTables $dataTables, Post $post, string $role = 'user') : JsonResponse
    {
        $posts = $post->orderBy("created_at", "desc")->with('user');

        if($role == 'user') {
            $posts = $posts->where('user_id', auth()->user()->id)
                ->orWhere('status', 1)
                ->orderByRaw('CASE WHEN user_id = ' . auth()->user()->id . ' THEN 0 ELSE 1 END');// show authored posts first
        }

        return $dataTables->eloquent($posts)
            ->addColumn('action', function (Post $post) {
                return view('layouts.posts.datatables.actions', compact('post'));
            })
            ->rawColumns((['action']))
            ->make(true);
    }

    public function storePost(array $data) : Post
    {
        return Post::create($data);
    }

    public function updatePost(Post $post, array $data) : void
    {
        Gate::authorize('update', $post);

        $post->fill($data);

        $post->save();
    }

    public function deletePost(Post $post) : void
    {
        Gate::authorize('delete', $post);

        $post->delete();
    }
}
