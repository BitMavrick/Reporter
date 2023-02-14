<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Library | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">

                <x-user.partials.alert />

                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#">Library</a>
                        </div>
                    </div>
                </div>

                <div class="row no-gutters-lg">
                    <div class="col-12 my-3">
                        <h2 class="section-title">Trendings
                        </h2>
                        <hr>
                    </div>
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="row">

                            <!-- Article cards will be here -->

                            @if(isset($trendings))
                            @foreach($trendings as $trending)

                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="{{ route('blog', $trending->id) }}">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">
                                                    {{ date('M j, Y', strtotime($trending->created_at)) }}
                                                </span>
                                                <span class="text-uppercase">{{$trending->reading_time}} minutes to
                                                    read</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="/storage/blog_images/{{ $trending->main_image }}"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">

                                        <h2><a class="post-title"
                                                href="{{ route('blog', $trending->id) }}">{{$trending->title}}</a></h2>
                                        <p class="card-text">{{ Str::limit($trending->introduction, 150) }}</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="{{ route('blog', $trending->id) }}">Read Full
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

                <div class="row no-gutters-lg">
                    <div class="col-12 my-3">
                        <h2 class="section-title">Recommended
                        </h2>
                        <hr>
                    </div>
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="row">

                            <!-- Article cards will be here -->

                            @if(isset($rec_blogs))
                            @foreach($rec_blogs as $rec_blog)

                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="{{ route('blog', $rec_blog->id) }}">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">
                                                    {{ date('M j, Y', strtotime($rec_blog->created_at)) }}
                                                </span>
                                                <span class="text-uppercase">{{$rec_blog->reading_time}} minutes to
                                                    read</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="/storage/blog_images/{{ $rec_blog->main_image }}"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">

                                        <h2><a class="post-title" href="{{ route('blog', $rec_blog->id) }}">
                                                {{$rec_blog->title}}
                                            </a></h2>
                                        <p class="card-text">{{ Str::limit($rec_blog->introduction, 150) }}</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="{{ route('blog', $rec_blog->id) }}">Read Full
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

                <div class="row no-gutters-lg">
                    <div class="col-12 my-3">
                        <h2 class="section-title">Recent
                        </h2>
                        <hr>
                    </div>
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="row">

                            <!-- Article cards will be here -->
                            @if(isset($recents))
                            @foreach($recents as $recent)
                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="{{ route('blog', $recent->id) }}">
                                        <div class="card-image">
                                            <div class="post-info"> <span
                                                    class="text-uppercase">{{ date('M j, Y', strtotime($recent->created_at)) }}</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="/storage/blog_images/{{ $recent->main_image }}"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">

                                        <h2><a class="post-title"
                                                href="{{ route('blog', $recent->id) }}">{{$recent->title}}</a></h2>
                                        <p class="card-text">{{ Str::limit($recent->introduction, 150) }}</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="{{ route('blog', $recent->id) }}">Read Full
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
        </section>
    </main>

    <x-user.partials.footer />

</x-user.master>