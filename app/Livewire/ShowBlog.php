<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use Livewire\Component;

class ShowBlog extends Component
{
    public $blogSlug = null;

    public function mount($slug){
        $this->blogSlug = $slug;
    }
    public function render()
    {
        $blogs = Blog::select('blogs.*', 'categories.name as category_name')->leftJoin('categories', 'categories.id', 'blogs.category_id')->findOrFail($this->blogSlug);
        // $blogs = Blog::all()
        return view('livewire.show-blog', [
            "blog"=> $blogs
        ]);
    }
}
