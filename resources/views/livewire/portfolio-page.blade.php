{{-- <main>

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

                                        <img   decoding="async" src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->name}}">

                                            @else
                                            <img  decoding="async" src="https://scontent-sin6-1.xx.fbcdn.net/v/t39.30808-6/356218380_109736572167272_2856917891741394543_n.png?_nc_cat=107&ccb=1-7&_nc_sid=783fdb&_nc_eui2=AeEdqj_3Fk7k9jHsKPwywL7lKXGXl2NzTGwpcZeXY3NMbEpM__J6JUV9uv3aUREi43XTaB64NeSI971qhfeF0jYk&_nc_ohc=PEKxHek5BLkAX8f7l1l&_nc_ht=scontent-sin6-1.xx&oh=00_AfDv9sMWTzvqE0ufK2V9gdyQlyx0Vyg7wfXSEuh3Pm2OmQ&oe=65CA72EB" alt="">

                                            @endif

                                        </div>
                                        <div class="pt-4">

                                            @if ($blog->url != '')
                                            <h4 class=""><a class="text-black" style="text-align: center !important;" href="{{$blog->url}}" target="_blank">{{$blog->name}}</a></h4>
                                             @else
                                            <h4 class=""><a class="text-black" wrie:navigate style="text-align: center !important;" >{{$blog->name}}</a></h4>

                                            @endif
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




                </div>
            </div>
        </div>
    </section>

</main> --}}

<main class=" container">
    <div class="row position-relative">

        @if ($portfolios->isNotEmpty())
          @foreach ($portfolios as $p)


    <div class="col-xl-3 col-lg-4 col-md-6 mt-4 shadow-sm">
        <div class="card bg-transparent border-0 text-center">
            <div class="card-img">
                <img loading="lazy" decoding="async" src="{{asset('storage/'.$p->image)}}" alt="Scarlet Pena" class="rounded w-100" width="300" height="332">

                @if ($p->url != '')
                <ul class="card-social list-inline">

                    <li class="list-inline-item"><a class="instagram" target="_blank" href="{{url($p->url)}}"><i class="fas fa-link"></i></a>
                    </li>
                </ul>

                @endif


            </div>
            <div class="card-body">
                <h3>{{$p->name}}</h3>
                <p>Developed by Adons</p>
            </div>
        </div>
    </div>
    @endforeach


    @endif

    <div class="col-12">
        {{$portfolios->links()}}
    </div>

</div>
</main>
