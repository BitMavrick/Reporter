<div class="col-lg-4">
    <div class="widget-blocks">
        <div class="row">
            @if(Auth::user() && isset($profile_data) && Auth::user()->username == $profile_data->username)
            <div class="col-lg-12">
                <div class="widget">
                    <a href="{{ route('blog.create')}}">
                        <div class="widget-body col-lg-12 btn btn-sm btn-outline-primary">
                            <div class="row justify-content-center ">
                                <i class="fa-solid fa-2x fa-plus mr-2"></i>
                                <span class="m-1">Create a new Article</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @elseif(Auth::user())
            <div class="col-lg-12">
                <div class="widget">
                    <a href="{{ route('profile', Auth::user()->username) }}">
                        <div class="widget-body col-lg-12 btn btn-sm btn-outline-primary">

                            <div class="row justify-content-center ">
                                <i class="fa-solid fa-2x fa-id-card-clip mr-1"></i>
                                <span class="m-1">{{ Auth::user()->name }}</span>
                            </div>
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

            @if(isset($writter) && isset($profile))
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-body">
                        <img loading="lazy" decoding="async" src="/storage/cover_images/{{ $profile->cover_image }}"
                            alt="About Me" class="w-100 author-thumb-sm d-block">
                        <h2 class="widget-title my-3">{{ $writter->name }} </h2>

                        @if($profile->address)
                        <p>
                        <div class="d-inline">
                            <i class="las la-lg la-map-marker-alt"></i>
                            {{ $profile->address }}
                        </div>
                        </p>
                        @endif

                        @if($profile->twitter_handle)
                        <p>
                        <div class="d-inline">
                            <i class="lab la-lg la-twitter"></i>
                            {{ $profile->twitter_handle }}
                        </div>
                        </p>

                        <a href="{{ route('profile', $writter->username) }}" class="btn btn-sm btn-outline-primary">View
                            Profile</a>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-12 col-md-6">
                <div class="widget">
                    <h2 class="section-title mb-3">Recommended </h2>
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
            @if(isset($top_tags))
            <div class="col-lg-12 col-md-6">
                <div class="widget">
                    <h2 class="section-title mb-3">Hot Topics</h2>
                    <div class="widget-body">
                        <ul class="widget-list">
                            @foreach($top_tags as $name => $value)
                            <li><a href="{{ route('tag.filter', $name) }}">{{ $name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>