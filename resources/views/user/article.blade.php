<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Article | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <article>
                            <img loading="lazy" decoding="async" src="/storage/blog_images/{{ $blog->main_image }}"
                                alt="Post Thumbnail" class="w-100">
                            <ul class="post-meta mb-2 mt-4">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
                                        <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                        <path
                                            d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                    </svg> <span>29 May, 2021</span>
                                </li>
                            </ul>
                            <h1 class="my-3">{{ $blog->title }}</h1>

                            <ul class="post-meta mb-4">
                                @foreach($tags as $tag)
                                <li> <a href="/categories/destination">{{ $tag->tag_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="content text-left">
                                <hr>
                                <h2 id="heading">Introdcution</h2>
                                <p>{{ $blog->introduction }}</p>


                                <h2 id="emphasis">Description</h2>
                                {!! $blog->description !!}

                                <hr>

                                @if(isset($blog->secondary_image))
                                <h2 id="image">Image</h2>
                                <img loading="lazy" decoding="async" class="w-100 d-block mb-4"
                                    src="/storage/blog_images/{{ $blog->secondary_image }}" alt="THIS IS AN IMAGE">
                                <hr>
                                @endif


                                <h2 id="youtube-video">Youtube video</h2>
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                                    <iframe src="https://www.youtube-nocookie.com/embed/Ed0dWP01FkI"
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;"
                                        allowfullscreen title="YouTube Video"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </article>
                        <div class="mt-5">
                            <div id="disqus_thread"></div>
                            <script type="application/javascript">
                            var disqus_config = function() {



                            };
                            (function() {
                                if (["localhost", "127.0.0.1"].indexOf(window.location.hostname) != -1) {
                                    document.getElementById('disqus_thread').innerHTML =
                                        'Disqus comments not available by default when the website is previewed locally.';
                                    return;
                                }
                                var d = document,
                                    s = d.createElement('script');
                                s.async = true;
                                s.src = '//' + "themefisher-template" + '.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a
                                    href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                            </noscript>
                            <a href="https://disqus.com" class="dsq-brlink">comments powered by <span
                                    class="logo-disqus">Disqus</span></a>
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