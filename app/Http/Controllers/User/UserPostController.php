<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\PostController;
use App\Models\Post;
use Yajra\DataTables\DataTables;

class UserPostController extends PostController
{
    public function index()
    {
        return view('posts.index')->with('posts_url', route("user.posts.data"));
    }

    /**
     * Query posts records for Users
     */
    public function getPosts(DataTables $dataTables, Post $post)
    {
        $posts = $post->where('user_id', auth()->user()->id)
            ->orWhere('status', 1)
            ->orderByRaw('CASE WHEN user_id = ' . auth()->user()->id . ' THEN 0 ELSE 1 END') // show authored posts first
            ->orderBy("created_at", "desc")->with('user');

        return $dataTables->eloquent($posts)
            ->addColumn('action', function (Post $post) {
                return view('layouts.posts.datatables.actions', compact('post'));
            })
            ->rawColumns((['action']))
            ->make(true);
    }
}
