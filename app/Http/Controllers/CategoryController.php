<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;

class CategoryController extends Controller
{
    public function show(string $id)
    {
        $topics = Topic::all();
        $category = Category::findOrFail($id);
        $arrTopic = $category->topic()->pluck('id');
        $posts = Post::query()->with('topic')->whereIn('idLoaiTin', $arrTopic)->paginate(9);
        $categoryIsNull = count($posts->toArray()['data']);

        return ($categoryIsNull == 0)
        ? abort(404)
        : view('customers.categories.show', compact('posts', 'topics'));
    }
}
