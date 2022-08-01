<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Repository\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogs;

    public function __construct(BlogRepository $blogs)
    {
        $this->blogs = $blogs;
    }
    
    public function index()
    {
        $blogs = $this->blogs->getAllBlogs();
        return response()->json($blogs);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $newBlog = $this->blogs->createBlog($request);
        return response()->json([
            'blog' => $newBlog
        ]);
    }

    public function show(Blog $blog)
    {
        return response()->json([$blog]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->fill($request->post())->save();
        return response()->json([
            'blog' => $blog
        ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json([
            'mensaje' => 'Blog eliminado'
        ]);
    }
}
