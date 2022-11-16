<x-user.master>
    <x-slot name="title">
        {{ $title ?? 'Profile | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />
    <x-user.partials.edit_user />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="about.html">Profile</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <img loading="lazy" decoding="async" src="/user/images/author.jpg" class="img-fluid w-100 mb-4"
                            alt="Author Image">
                        <h1 class="mb-4">About {{$user->name}},</h1>
                        <div class="content">
                            <p>{{$user->profile->about_you}}</p>
                        </div>
                        @if(Auth::user() && Auth::user()->username == $profile_data->username)
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger mt-4">Sign Out</button>
                        </form>

                        @endif
                        <hr>

                        <div class="row no-gutters-lg">
                            <div class="col-12">
                                <h2 class="section-title">Recent Articles</h2>
                            </div>
                            <div class="col-lg-12 mb-5 mb-lg-0">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <article class="card article-card">
                                            <a href="article.html">
                                                <div class="card-image">
                                                    <div class="post-info"> <span class="text-uppercase">04 Jun
                                                            2021</span>
                                                        <span class="text-uppercase">3 minutes read</span>
                                                    </div>
                                                    <img loading="lazy" decoding="async"
                                                        src="/user/images/post/post-1.jpg" alt="Post Thumbnail"
                                                        class="w-100">
                                                </div>
                                            </a>
                                            <div class="card-body px-0 pb-1">
                                                <ul class="post-meta mb-2">
                                                    <li> <a href="#!">travel</a>
                                                        <a href="#!">news</a>
                                                    </li>
                                                </ul>
                                                <h2 class="h1"><a class="post-title" href="article.html">Is it Ethical
                                                        to
                                                        Travel
                                                        Now?
                                                        With that Freedom Comes Responsibility.</a></h2>
                                                <p class="card-text">Heading Here is example of hedings. You can use
                                                    this
                                                    heading by following markdownify rules. For example: use # for
                                                    heading 1
                                                    and
                                                    use ###### for heading 6.</p>
                                                <div class="content"> <a class="read-more-btn" href="article.html">Read
                                                        Full
                                                        Article</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Article cards will be here -->
                                    <x-user.partials.article-cards />
                                    <x-user.partials.pagination />

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

    <x-user.partials.footer />


</x-user.master>