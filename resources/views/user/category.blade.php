<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Category | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs mb-4"> <a href="index.html">Home</a>
                            <span class="mx-1">/</span> <a href="#!">Articles</a>
                            <span class="mx-1">/</span> <a href="#!">Travel</a>
                        </div>
                        <h1 class="mb-4 border-bottom border-primary d-inline-block">Travel</h1>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">04 Jun 2021</span>
                                                <span class="text-uppercase">3 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-1.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                                <a href="#!">news</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">Is It Ethical to Travel Now? With
                                                That Freedom Comes Responsibility.</a></h2>
                                        <p class="card-text">Heading Here is example of hedings. You can use this
                                            heading by following markdownify rules. For example: use # for …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-1/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">03 Jun 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-2.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">An
                                                Experiential Guide to Explore This Kingdom</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-2/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">01 Jan 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-6.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                                <a href="#!">news</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">Eight
                                                Awesome Places to Visit in Montana This Summer</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-3/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">01 Jun 2020</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-8.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">website</a>
                                                <a href="#!">website</a>
                                                <a href="#!">hugo</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">Portugal and France Now Allow
                                                Unvaccinated Tourists</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-4/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">04 Jun 2021</span>
                                                <span class="text-uppercase">3 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-1.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                                <a href="#!">news</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">Is It Ethical to Travel Now? With
                                                That Freedom Comes Responsibility.</a></h2>
                                        <p class="card-text">Heading Here is example of hedings. You can use this
                                            heading by following markdownify rules. For example: use # for …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-1/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">03 Jun 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-2.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">An
                                                Experiential Guide to Explore This Kingdom</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-2/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">01 Jan 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-6.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                                <a href="#!">news</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">Eight
                                                Awesome Places to Visit in Montana This Summer</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-3/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">01 Jun 2020</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-8.jpg"
                                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">website</a>
                                                <a href="#!">website</a>
                                                <a href="#!">hugo</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">Portugal and France Now Allow
                                                Unvaccinated Tourists</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn"
                                                href="/articles/travel/post-4/">Read Full Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar will be here -->
                    <x-user.partials.sidebar />

                    <x-user.partials.pagination />
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />


</x-user.master>