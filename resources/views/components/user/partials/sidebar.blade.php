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

                        @if(isset($rec_blogs))
                        @foreach($rec_blogs as $key => $rec_blog)
                        @if($key == 0)

                        <div class="widget-list">
                            <article class="card mb-4">
                                <div class="card-image">
                                    <div class="post-info"> <span class="text-uppercase">{{$rec_blog->reading_time}}
                                            minutes to
                                            read</span>
                                    </div>
                                    <img loading="lazy" decoding="async"
                                        src="/storage/blog_images/{{ $rec_blog->main_image }}" alt="Post Thumbnail"
                                        class="w-100">
                                </div>
                                <div class="card-body px-0 pb-1">
                                    <h3><a class="post-title post-title-sm" href="article.html">{{$rec_blog->title}}</a>
                                    </h3>
                                    <p class="card-text"> {{ Str::limit($rec_blog->introduction, 90) }}</p>
                                    <div class="content"> <a class="read-more-btn" href="article.html">Read Full
                                            Article</a>
                                    </div>
                                </div>
                            </article>

                            @else

                            <a class="media align-items-center" href="{{ route('blog', $rec_blog->id) }}">
                                <img loading="lazy" decoding="async"
                                    src="/storage/blog_images/{{ $rec_blog->main_image }}" alt="Post Thumbnail"
                                    class="w-100">
                                <div class="media-body ml-3">
                                    <h3 style="margin-top:-5px"> {{ Str::limit($rec_blog->title, 35) }}
                                    </h3>
                                    <p class="mb-0 small">{{ Str::limit($rec_blog->introduction, 40) }}</p>
                                </div>
                            </a>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($top_tags))
            <div class="col-lg-12 col-md-6">
                <div class="widget">
                    <h2 class="section-title mb-3">Popular Topics</h2>
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