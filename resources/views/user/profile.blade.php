<x-user.master>
    <x-slot name="title">
        {{ $title ?? $profile_data->name.' | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />
    <x-user.partials.edit_user />

    <main>
        <section class="section">
            <div class="container">
                <x-user.partials.alert />

                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#">Profile</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <div class="card-image">
                            @if(Auth::user() && Auth::user()->username == $profile_data->username)
                            <div class="post-info">
                                <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><span
                                        class="text-uppercase">Update
                                        Cover</span></a>
                            </div>
                            @endif
                            <img loading="lazy" decoding="async"
                                src="/storage/cover_images/{{ $profile_data->profile->cover_image }}"
                                class="img-fluid w-100 mb-4" alt="Author Image">

                        </div>


                        <div class="widget">
                            <div class="widget-body">
                                <h3 class="d-inline">
                                    @if($profile_data->avatar and $profile_data->settings->default_avatar == 1)
                                    <img class="mr-2" style="max-width:20%;" src="{{$profile_data->avatar}}"
                                        alt="Owner primary image">
                                    @elseif($profile_data->avatar and $profile_data->settings->default_avatar == 0)
                                    <img class="mr-2" style="max-width:20%;"
                                        src="/storage/avatar/{{ $profile_data->avatar }}" alt="Owner primary image">
                                    @endif

                                    {{ $profile_data->name }}

                                    @if($profile_data->role == 1)
                                    <span class="text-success"><i class="fa-solid fa-circle-check"></i></span>
                                    @elseif($profile_data->role == 2)
                                    <span class="text-danger"><i class="fa-solid fa-chess-king"></i></span>
                                    @endif


                                </h3>
                                @if($profile_data->profile->address)
                                <p>
                                <div class="d-inline">
                                    <i class="las la-lg la-map-marker-alt"></i>
                                    {{ $profile_data->profile->address }}
                                </div>
                                </p>
                                @endif

                                @if($profile_data->profile->mail and $profile_data->settings->hide_mail == 0)
                                <p>
                                <div class="d-inline">
                                    <i class="las la-lg la-envelope"></i>
                                    {{ $profile_data->profile->mail }}
                                </div>
                                </p>
                                @endif

                                @if($profile_data->profile->occupation)
                                <p>
                                <div class="d-inline">
                                    <i class="las la-lg la-industry"></i>
                                    {{ $profile_data->profile->occupation }}
                                </div>
                                </p>
                                @endif

                                @if($profile_data->profile->twitter_handle)
                                <p>
                                <div class="d-inline">
                                    <i class="lab la-lg la-twitter"></i>
                                    {{ $profile_data->profile->twitter_handle }}
                                </div>
                                </p>
                                @endif

                                @if(Auth::user() && Auth::user()->username == $profile_data->username)


                                <a href="" class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                    data-target="#editUser">Edit Profile</a>
                                @endif

                            </div>
                        </div>

                        <hr>

                        <h1 class="mb-4">About {{$user->name}},</i></h1>
                        <div class="content">
                            {!!$user->profile->about_you!!}
                        </div>
                        @if(Auth::user() && Auth::user()->username == $profile_data->username)
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger mt-4" data-toggle="tooltip"
                                data-placement="top" title="Signing out from your current account">Sign Out</button>
                        </form>

                        @endif
                        <hr>

                        <div class="row no-gutters-lg">
                            <div class="col-12">
                                <h2 class="section-title">Last Article</h2>
                            </div>
                            <div class="col-lg-12 mb-5 mb-lg-0">
                                <div class="row">

                                    @if(isset($last_blog))

                                    <!-- Start Latest blog -->

                                    <div class="col-12 mb-4">
                                        <article class="card article-card">
                                            <a href="{{ route('blog', $last_blog->id) }}">
                                                <div class="card-image">
                                                    <div class="post-info"> <span class="text-uppercase">
                                                            {{ date('M j, Y', strtotime($last_blog->created_at)) }}
                                                        </span>
                                                        <span class="text-uppercase">{{$last_blog->reading_time}}
                                                            minutes to read</span>
                                                    </div>
                                                    <img loading="lazy" decoding="async"
                                                        src="/storage/blog_images/{{ $last_blog->main_image }}"
                                                        alt="Post Thumbnail" class="w-100">
                                                </div>
                                            </a>
                                            <div class="card-body px-0 pb-1">
                                                <ul class="post-meta mb-2">
                                                    <li>
                                                        @foreach($last_blog_tags as $tag)
                                                        <a
                                                            href="{{ route('tag.filter', $tag->tag_name) }}">{{ $tag->tag_name }}</a>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                                <h2 class="h1"><a class="post-title"
                                                        href="{{ route('blog', $last_blog->id) }}">{{$last_blog->title}}</a>
                                                </h2>
                                                <p class="card-text">
                                                    {{ Str::limit($last_blog->introduction, 300) }}
                                                </p>
                                                <div class="content"> <a class="read-more-btn"
                                                        href="{{ route('blog', $last_blog->id) }}">Read
                                                        Full
                                                        Article</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- End Latest blog -->
                                    @else

                                    @if(Auth::user() && Auth::user()->username == $profile_data->username)

                                    <div class="col-12 mb-4">
                                        <article class="card article-card">
                                            <h3 class="text-center text-danger mt-3">You don't have any published
                                                article
                                                yet.</h3>

                                            <br>
                                            <p class="text-center"><a href="{{ route('blog.create')}}"
                                                    class="btn btn-sm btn-outline-success">Create Now</a></p>
                                        </article>
                                    </div>

                                    @else
                                    <div class="col-12 mb-4">
                                        <article class="card article-card">
                                            <h3 class="text-center text-danger">This user don't have any published
                                                article
                                                yet.</h3>
                                        </article>
                                    </div>
                                    @endif
                                    @endif

                                    @if(isset($my_blogs))
                                    <div class="col-12 my-4">
                                        <h2 class="section-title">All Latest Article</h2>
                                        <hr>
                                    </div>
                                    @foreach($my_blogs as $key=>$my_blog)


                                    <!-- Article cards will be here -->
                                    <div class="col-md-6 mb-4">
                                        <article class="card article-card article-card-sm h-100">
                                            <a href="{{ route('blog', $my_blog->id) }}">
                                                <div class="card-image">
                                                    <div class="post-info"> <span class="text-uppercase">
                                                            {{ date('M j, Y', strtotime($my_blog->created_at)) }}
                                                        </span>
                                                        <span class="text-uppercase">{{$my_blog->reading_time}} minutes
                                                            to read</span>
                                                    </div>
                                                    <img loading="lazy" decoding="async"
                                                        src="/storage/blog_images/{{ $my_blog->main_image }}"
                                                        alt="Post Thumbnail" class="w-100">
                                                </div>
                                            </a>
                                            <div class="card-body px-0 pb-0">

                                                <h2><a class="post-title"
                                                        href="{{ route('blog', $my_blog->id) }}">{{$my_blog->title}}</a>
                                                </h2>
                                                <p class="card-text">
                                                    {{ Str::limit($last_blog->introduction, 100) }}
                                                </p>
                                                <div class="content"> <a class="read-more-btn"
                                                        href="{{ route('blog', $my_blog->id) }}">Read
                                                        Full
                                                        Article</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side bar will be here -->
                    <x-user.partials.sidebar />
                </div>
            </div>
        </section>
    </main>
    @if(isset($my_blogs))
    {{ $my_blogs->links() }}
    @endif

    <x-user.partials.footer />


</x-user.master>