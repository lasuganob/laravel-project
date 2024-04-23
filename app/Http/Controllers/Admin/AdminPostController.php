<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\PostController;
use App\Models\Post;
use Yajra\DataTables\DataTables;

class AdminPostController extends PostController
{
    public function index()
    {
        return view('posts.index')->with('posts_url', route("admin.posts.data"));
    }

    /**
     * Query posts records for Admin
     */
    public function getPosts(DataTables $dataTables, Post $post)
    {
        $posts = $post->orderBy("created_at", "desc")->with('user');

        return $dataTables->eloquent($posts)
            ->addColumn('action', function (Post $post) {
                return view('layouts.posts.datatables.actions', compact('post'));
            })
            ->rawColumns((['action']))
            ->make(true);
    }
}
