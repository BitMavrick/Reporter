<div class="col-lg-4">
    <div class="widget-blocks">
        <div class="row">
            @if(Auth::user() && isset($profile_data) && Auth::user()->username == $profile_data->username)
            <div class="col-lg-12">
                <div class="widget">
                    <a href="{{ route('profile', Auth::user()->username) }}">
                        <div class="widget-body col-lg-12 btn btn-sm btn-outline-primary">
                            Create a New Blog
                        </div>
                    </a>

                </div>
            </div>
            @elseif(Auth::user())
            <div class="col-lg-12">
                <div class="widget">
                    <a href="{{ route('profile', Auth::user()->username) }}">
                        <div class="widget-body col-lg-12 btn btn-sm btn-outline-primary">
                            Welcome, {{ Auth::user()->name }}
                        </div>
                    </a>

                </div>
            </div>
            @else
            <div class="col-lg-12">
                <div class="widget">
                    <a href="{{ route('google.auth') }}">
                        <div class="widget-body col-lg-12 btn btn-sm btn-outline-secondary">

                            <div class="row justify-content-center ">
                                <i class="fab fa-2x fa-google mr-1"></i>
                                <span class="m-1">Sign In with Google</span>
                            </div>




                        </div>
                    </a>

                </div>
            </div>
            @endif

            @if(isset($profile_data))
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-body">



                        <h3 class="d-inline">
                            <img class="mr-2" style="max-width:20%;" src="{{$profile_data->avatar}}"
                                alt="Owner primary image">
                            {{ $profile_data->name }}
                        </h3>



                        <p>
                        <div class="d-inline">
                            <i class="las la-lg la-map-marker-alt"></i>
                            {{ $profile_data->profile->address }}
                        </div>
                        </p>
                        <p>
                        <div class="d-inline">
                            <i class="las la-lg la-envelope"></i>
                            {{ $profile_data->profile->mail }}
                        </div>
                        </p>
                        <p>
                        <div class="d-inline">
                            <i class="las la-lg la-industry"></i>
                            {{ $profile_data->profile->occupation }}
                        </div>
                        </p>

                        <p>
                        <div class="d-inline">
                            <i class="lab la-lg la-twitter"></i>
                            {{ $profile_data->profile->twitter_handle }}
                        </div>
                        </p>



                        @if(Auth::user() && Auth::user()->username == $profile_data->username)
                        <a href="about.html" class="btn btn-sm btn-outline-warning">Edit Profile</a>
                        @endif
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-body">
                        <img loading="lazy" decoding="async" src="/user/images/author.jpg" alt="About Me"
                            class="w-100 author-thumb-sm d-block">
                        <h2 class="widget-title my-3">Hootan Safiyari </h2>
                        <p class="mb-3 pb-2">Hello, I’m Hootan Safiyari. A Content writter,
                            Developer and Story teller. Working as a Content writter at CoolTech
                            Agency. Quam nihil …</p> <a href="about.html" class="btn btn-sm btn-outline-primary">Know
                            More</a>
                    </div>
                </div>
            </div>
            @endif



            <div class="col-lg-12 col-md-6">
                <div class="widget">
                    <h2 class="section-title mb-3">Recommended</h2>
                    <div class="widget-body">
                        <div class="widget-list">
                            <article class="card mb-4">
                                <div class="card-image">
                                    <div class="post-info"> <span class="text-uppercase">1 minutes
                                            read</span>
                                    </div>
                                    <img loading="lazy" decoding="async" src="/user/images/post/post-9.jpg"
                                        alt="Post Thumbnail" class="w-100">
                                </div>
                                <div class="card-body px-0 pb-1">
                                    <h3><a class="post-title post-title-sm" href="article.html">Portugal and France Now
                                            Allow Unvaccinated Tourists</a></h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor …</p>
                                    <div class="content"> <a class="read-more-btn" href="article.html">Read Full
                                            Article</a>
                                    </div>
                                </div>
                            </article>
                            <a class="media align-items-center" href="article.html">
                                <img loading="lazy" decoding="async" src="/user/images/post/post-2.jpg"
                                    alt="Post Thumbnail" class="w-100">
                                <div class="media-body ml-3">
                                    <h3 style="margin-top:-5px">These Are Making It Easier To Visit
                                    </h3>
                                    <p class="mb-0 small">Heading Here is example of hedings. You
                                        can use …</p>
                                </div>
                            </a>
                            <a class="media align-items-center" href="article.html"> <span
                                    class="image-fallback image-fallback-xs">No Image
                                    Specified</span>
                                <div class="media-body ml-3">
                                    <h3 style="margin-top:-5px">No Image specified</h3>
                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing …</p>
                                </div>
                            </a>
                            <a class="media align-items-center" href="article.html">
                                <img loading="lazy" decoding="async" src="/user/images/post/post-5.jpg"
                                    alt="Post Thumbnail" class="w-100">
                                <div class="media-body ml-3">
                                    <h3 style="margin-top:-5px">Perfect For Fashion</h3>
                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing …</p>
                                </div>
                            </a>
                            <a class="media align-items-center" href="article.html">
                                <img loading="lazy" decoding="async" src="/user/images/post/post-9.jpg"
                                    alt="Post Thumbnail" class="w-100">
                                <div class="media-body ml-3">
                                    <h3 style="margin-top:-5px">Record Utra Smooth Video</h3>
                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing …</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="widget">
                    <h2 class="section-title mb-3">Categories</h2>
                    <div class="widget-body">
                        <ul class="widget-list">
                            <li><a href="#!">computer<span class="ml-auto">(3)</span></a>
                            </li>
                            <li><a href="#!">cruises<span class="ml-auto">(2)</span></a>
                            </li>
                            <li><a href="#!">destination<span class="ml-auto">(1)</span></a>
                            </li>
                            <li><a href="#!">internet<span class="ml-auto">(4)</span></a>
                            </li>
                            <li><a href="#!">lifestyle<span class="ml-auto">(2)</span></a>
                            </li>
                            <li><a href="#!">news<span class="ml-auto">(5)</span></a>
                            </li>
                            <li><a href="#!">telephone<span class="ml-auto">(1)</span></a>
                            </li>
                            <li><a href="#!">tips<span class="ml-auto">(1)</span></a>
                            </li>
                            <li><a href="#!">travel<span class="ml-auto">(3)</span></a>
                            </li>
                            <li><a href="#!">website<span class="ml-auto">(4)</span></a>
                            </li>
                            <li><a href="#!">hugo<span class="ml-auto">(2)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>