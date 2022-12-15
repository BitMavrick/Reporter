<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Blog | Reporter'}}
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

                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">02 Jun 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/ls-2.jpg"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">lifestyle</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">What
                                                to Do in Houston: Ideas for Your Visit</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn" href="article.html">Read Full
                                                Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>



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

                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">02 Jun 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/ls-2.jpg"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">lifestyle</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">What
                                                to Do in Houston: Ideas for Your Visit</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn" href="article.html">Read Full
                                                Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>



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

                            <div class="col-md-4 mb-4">
                                <article class="card article-card article-card-sm h-100">
                                    <a href="article.html">
                                        <div class="card-image">
                                            <div class="post-info"> <span class="text-uppercase">02 Jun 2021</span>
                                                <span class="text-uppercase">2 minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async" src="/user/images/post/ls-2.jpg"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    </a>
                                    <div class="card-body px-0 pb-0">
                                        <ul class="post-meta mb-2">
                                            <li> <a href="#!">lifestyle</a>
                                            </li>
                                        </ul>
                                        <h2><a class="post-title" href="article.html">What
                                                to Do in Houston: Ideas for Your Visit</a></h2>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna …</p>
                                        <div class="content"> <a class="read-more-btn" href="article.html">Read Full
                                                Article</a>
                                        </div>
                                    </div>
                                </article>
                            </div>



                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>

    <x-user.partials.footer />

</x-user.master>