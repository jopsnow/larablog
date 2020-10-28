<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Log;



class CategoryController extends Controller
{
    public function index($slug)
    {
        // get the requested category
        $category = Category::query()->where('slug', $slug)->first();


        // get the posts in that category
        $posts = $category->posts()->get();
        
        // get all tags 
        $tags = Tag::all();

        // get all the categories 
        $categories = Category::all();

        // get the recent 5 posts 
        $recent_posts = Post::where('is_published', true)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
        // return the data to the corresponding view
        return view('category', array(
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ));

    }
}
