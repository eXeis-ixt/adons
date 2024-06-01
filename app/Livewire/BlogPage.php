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
        $categories = Category::where('status', 1,)->get();

        if(!empty($this->category)){
            $category = Category::where('slug', $this->category)->first();


            if(empty($category)){
                abort(404);
            }


            $blogs = Blog::where('status',1)->orderBy('created_at', 'DESC')
            ->where('category_id', $category->id)
            ->paginate(10);
        }else{
            $blogs = Blog::where('status',1)->orderBy('created_at', 'DESC')
            ->paginate(4);

        }


        // echo $this->category;
        $latests = Blog::where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();

        return view('livewire.blog-page',[
            "blogs"=> $blogs,
            "categories"=> $categories,
            "latests"=> $latests,
        ]);
    }
}
