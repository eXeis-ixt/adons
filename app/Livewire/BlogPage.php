<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPage extends Component
{
    // use WithPagination;
    #[Url]
    public $category = null;
    public function render()
    {
        $categories = Category::all();

        if(!empty($this->category)){
            $category = Category::where('slug', $this->category)->first();


            if(empty($category)){
                abort(404);
            }


            $blogs = Blog::where('status',1)->orderBy('title', 'ASC')
            ->where('category_id', $category->id)
            ->paginate(10);
        }else{
            $blogs = Blog::where('status',1)->orderBy('title', 'ASC')
            ->paginate(10);

        }
        // echo $this->category;


        return view('livewire.blog-page',[
            "blogs"=> $blogs,
            "categories"=> $categories,
        ]);
    }
}
