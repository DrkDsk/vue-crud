<?php

namespace App\Repository;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogRepository{

    public function getAllBlogs()
    {
        return Blog::all();
    }

    public function createBlog(Request $request)
    {
        return Blog::create($request->post());
    }
}