<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Service;
use App\Models\socialMedia;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class HomeController extends Controller
{
    public function show(Service $services){

        return view('show', [
            "service"=> $services
        ]);
    }

    public function blog(Blog $blogs){
        // $blogs = Blog::select('blogs.*', 'categories.name as category_name')->leftJoin('categories', 'categoreis.id', 'blogs.category_id');
        return view('livewire.show-blog',[

            "blog"=> $blogs

        ]);
    }

    public function contact(){
        $links = socialMedia::where('status', 1)->orderBy('created_at', 'ASC')->get();
        $services = Service::where('status', 1)->orderBy('created_at', 'ASC')->get();
        return view('livewire.show-contact-page', [
            "services"=> $services,
            "links"=> $links
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:32',
            'email' => 'required|email',
            'message' => 'required|max:413',
            'service' => 'required|max:413',

            // 'collar' => 'required|string|required|max:255',
        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->service = $request->input('service');

        // $newBatman->collar = $request->input('collar');$newBatman->save();
        $contact->save();
        return redirect('/contact')->with('success', 'Message sent successfully!');

        // dd($request);

    }

}
