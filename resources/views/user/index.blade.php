<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Blog | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row no-gutters-lg">
                    <div class="col-12">
                        <h2 class="section-title">Latest Articles</h2>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <article class="card article-card">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">04 Jun 2021</span>
                                                <span class="text-uppercase">3 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/post-1.jpg"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-1">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">travel</a>
                                                <a href="#!">news</a>
                                            </li>
                                        </ul>
                                        <h2 class="h1"><a class="post-title" href="article.html">Is it Ethical to
                                                Travel
                                                Now?
                                                With that Freedom Comes Responsibility.</a></h2>
                                        <p class="card-text">Heading Here is example of hedings. You can use this
                                            heading by following markdownify rules. For example: use # for heading 1
                                            and
                                            use ###### for heading 6.</p>
                                        <div class="content"> <a class="read-more-btn" href="article.html">Read Full
                                                Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- Article cards will be here -->
                            <x-user.partials.article-cards />
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <nav class="mt-4">
                                            <!-- pagination -->
                                            <nav class="mb-md-50">
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#!" aria-label="Pagination Arrow">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                                height="26" fill="currentColor" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active "> <a href="index.html"
                                                            class="page-link">
                                                            1
                                                        </a>
                                                    </li>
                                                    <li class="page-item"> <a href="#!" class="page-link">
                                                            2
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#!" aria-label="Pagination Arrow">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                                height="26" fill="currentColor" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </nav>
                                    </div>
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