<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Article | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <x-user.partials.alert />
                <div class="row no-gutters-lg">
                    <div class="col-12 my-3">
                        <h2 class="section-title">Showing results for "<span class="text-danger">{{ $the_tag }}</span>"
                        </h2>
                        <p>Total {{ $total_tag }} results found</p>
                        <hr>
                    </div>
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="row">

                            <!-- Article cards will be here -->
                            @foreach($blogs as $blog)
                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="{{ route('blog', $blog->id) }}">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">
                                                    {{ date('M j, Y', strtotime($blog->created_at)) }}
                                                </span>
                                                <span class="text-uppercase">{{$blog->reading_time}} minutes
                                                    to read</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="/storage/blog_images/{{ $blog->main_image }}" alt="Post Thumbnail"
                                                class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="{{ route('tag.filter', $the_tag) }}">{{ $the_tag }}</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="{{ route('blog', $blog->id) }}">
                                                {{$blog->title}} </a></h2>
                                        <p class="card-text">{{ Str::limit($blog->introduction, 150) }}</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="{{ route('blog', $blog->id) }}">Read Full
                                                Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    {!! $blogs->links() !!}

    <x-user.partials.footer />

</x-user.master>