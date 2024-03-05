<main>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="me-lg-4">
                        <div class="row gy-5">

                            @if ($portfolios->isNotEmpty())
                                @foreach ($portfolios as $blog)

                                <div class="col-md-4 " data-aos="fade">
                                    <article class="blog-post shadow shadow-rounded p-1">
                                        <div class="post-slider slider-sm rounded">
                                            @if ($blog->image != '')

                                            {{-- < wire:navigate href="{{route('show.blog',$blog->slug)}}"> --}}
                                        <img   decoding="async" src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->name}}">

                                            @else
                                            <img  decoding="async" src="https://scontent-sin6-1.xx.fbcdn.net/v/t39.30808-6/356218380_109736572167272_2856917891741394543_n.png?_nc_cat=107&ccb=1-7&_nc_sid=783fdb&_nc_eui2=AeEdqj_3Fk7k9jHsKPwywL7lKXGXl2NzTGwpcZeXY3NMbEpM__J6JUV9uv3aUREi43XTaB64NeSI971qhfeF0jYk&_nc_ohc=PEKxHek5BLkAX8f7l1l&_nc_ht=scontent-sin6-1.xx&oh=00_AfDv9sMWTzvqE0ufK2V9gdyQlyx0Vyg7wfXSEuh3Pm2OmQ&oe=65CA72EB" alt="">

                                            @endif

                                        </div>
                                        <div class="pt-4">
                                            {{-- <p class="mb-3">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</p> --}}
                                            {{-- <p class="mb-3">{{$blog->scopePublished()}}</p> --}}
                                            @if ($blog->url != '')
                                            <h4 class=""><a class="text-black" style="text-align: center !important;" href="{{$blog->url}}" target="_blank">{{$blog->name}}</a></h4>
                                             @else
                                            <h4 class=""><a class="text-black" wrie:navigate style="text-align: center !important;" >{{$blog->name}}</a></h4>

                                            @endif
                                            {{-- <p>Heading example Here is example of hedings. You can use this heading by following …</p>  --}}
                                            {{-- <a wire:navigate href="{{route('show.blog',$blog->slug)}}" class="text-primary fw-bold" aria-label="Read the full article by clicking here">Read More</a> --}}
                                        </div>
                                    </article>
                                </div>
                            @endforeach


                            @endif




                            <div class="col-12">
                                {{$portfolios->links()}}
                            </div>
                        </div>
                    </div>
                </div>



                    <!-- Social -->

                </div>
            </div>
        </div>
    </section>

</main>
