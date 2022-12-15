<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Blog | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <x-user.partials.alert />
                <div class="row no-gutters-lg">
                    <div class="col-12">
                        <h2 class="section-title">Article Of The Day</h2>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="row">
                            @if(isset($blog_of_the_day))
                            <div class="col-12 mb-4">
                                <article class="card article-card">
                                    <a href="{{ route('blog', $blog_of_the_day->id) }}">
                                        <div class="card-image">
                                            <div class="post-info"> <span
                                                    class="text-uppercase">{{ date('M j, Y', strtotime($blog_of_the_day->created_at)) }}</span>
                                                <span class="text-uppercase">{{$blog_of_the_day->reading_time }} minutes
                                                    to
                                                    read</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="/storage/blog_images/{{ $blog_of_the_day->main_image }}"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-1">
                                        <ul class="post-meta mb-2">

                                            <li>
                                                @foreach($blog_of_the_day_tags as $tag)
                                                <a
                                                    href="{{ route('tag.filter', $tag->tag_name) }}">{{ $tag->tag_name }}</a>
                                                @endforeach

                                            </li>
                                        </ul>
                                        <h2 class="h1"><a class="post-title"
                                                href="{{ route('blog', $blog_of_the_day->id) }}">{{$blog_of_the_day->title }}</a>
                                        </h2>
                                        <p class="card-text"> {{ Str::limit($blog_of_the_day->introduction, 300) }} </p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="{{ route('blog', $blog_of_the_day->id) }}">Read Full
                                                Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endif
                            <!-- Article cards will be here -->
                            <x-user.partials.article-cards />

                            <x-user.partials.pagination />

                        </div>
                    </div>
                    <!-- Side bar will be here -->
                    <x-user.partials.sidebar />
                </div>
            </div>
        </section>
    </main>


    <x-user.partials.footer />

</x-user.master>