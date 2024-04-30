<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Interfaces\Post\PostRepositoryInterface;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function __construct(
        private PostRepositoryInterface $postRepository
    ) {
    }

    public function index() : View
    {
        return view('posts.index')->with('posts_url', route(role_prefix() . ".posts.data"));
    }

    public function create() : View
    {
        return view('posts.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request) : RedirectResponse
    {
        $this->postRepository->storePost($request->prepareInsert());
        return redirect()->route(role_prefix() . '.posts.index')->with('success_add', 'Post Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'posted_at' => Carbon::parse($post->created_at)->diffForHumans(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) : View
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * @tobedeleted: unused method - already used livewire for updating posts
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $this->postRepository->updatePost($post, $data);
        return redirect()->route(role_prefix() . '.posts.index')->with('success_edit', 'Post Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->postRepository->deletePost($post);
        return redirect()->route(role_prefix() . '.posts.index')->with('success_delete', 'Post Successfully Deleted');
    }

    /**
     * Query posts records for Users
     */
    public function getPosts(DataTables $dataTables, Post $post) : JsonResponse
    {
        $posts = $this->postRepository->getPosts($dataTables, $post, role_prefix());
        return $posts;
    }
}
