<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Article | Reporter'}}
    </x-slot>



    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <x-user.partials.alert />

                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <article>

                            <div class="card-image">
                                @if( Auth::user() and (Auth::user()->username == $writter->username))
                                <!-- Modal -->
                                <div class="modal fade" id="primary-image-update" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Change Primary Image</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('blog.update.mainImage') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf

                                                <div class="modal-body">
                                                    <input type="text" name="id" hidden value="{{ $blog->id }}">
                                                    <div class="form-group">
                                                        <label for="cover">Primary Image</label>
                                                        <input type="file" name="primary_image" class="form-control"
                                                            id="cover" aria-describedby="emailHelp">
                                                        @error('primary_image')
                                                        <small id="emailHelp"
                                                            class="form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <small id="emailHelp" class="form-text text-muted">The ideal
                                                            ratio of primary image is 16:9, The
                                                            image will be crop to fit if it is not maintain the exact
                                                            ratio.</small>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <span class="text-uppercase">{{$blog->reading_time}} minutes to read</span>
                                    <a href="#" data-toggle="modal" data-target="#primary-image-update"><span
                                            class="text-uppercase">Change Image</span></a>
                                </div>
                                @else
                                <div class="post-info">
                                    <span class="text-uppercase">{{$blog->reading_time}} minutes to read</span>
                                </div>
                                @endif

                                <img loading="lazy" decoding="async" src="/storage/blog_images/{{ $blog->main_image }}"
                                    alt="Post Thumbnail" class="w-100">

                            </div>

                            <ul class="post-meta mb-2 mt-4">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
                                        <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                        <path
                                            d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                    </svg> <span>{{ date('M j, Y', strtotime($writter->created_at)) }}</span>
                                </li>

                                <li class="float-right m-4 d-flex">
                                    @if(Auth::user())


                                    @if($my_react)
                                    <a id="like" style="background-color: white;"><i
                                            class="fa-solid fa-2x fa-heart text-danger m-1"></i></a>
                                    @else
                                    <a id="like" style="background-color: white;"><i
                                            class="fa-regular fa-2x fa-heart text-danger m-1"></i></a>

                                    @endif


                                    @else

                                    <a onclick="myFunction()" style="background-color: white;"><i
                                            class="fa-regular fa-2x fa-heart text-secondary m-1 mr-2"></i></a>
                                    <script>
                                    function myFunction() {
                                        alert("You have to sign in to react to this article.");
                                    }
                                    </script>

                                    @endif

                                    <h2 class="ml-1" id="total_like">{{ $total_react }}</h2>
                                </li>

                                @if(Auth::user())

                                <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->username }}"
                                    hidden>
                                <input type="text" name="blog_id" id="blog_id" value="{{ $blog->id }}" hidden>


                                <script>
                                document.getElementById('like').addEventListener('click', click_event)

                                function click_event() {



                                    if (document.getElementById('like').innerHTML ==
                                        '<i class="fa-regular fa-2x fa-heart text-danger m-1"></i>') {
                                        // if like  

                                        document.getElementById('like').innerHTML =
                                            '<i class="fa-solid fa-2x fa-heart text-danger m-1"></i>'



                                        let user_id = document.getElementById('user_id').value;
                                        let blog_id = document.getElementById('blog_id').value;

                                        $.ajax({

                                            type: "post",
                                            url: "/like",
                                            data: {
                                                user_id: user_id,
                                                blog_id: blog_id,
                                                _token: '{{ csrf_token() }}'

                                            },
                                            success: function(response) {
                                                console.log(response);
                                            },
                                        })

                                        document.getElementById('total_like').innerHTML = parseInt(
                                            document.getElementById('total_like').innerHTML) + 1;

                                    } else {

                                        // if dislike

                                        document.getElementById('like').innerHTML =
                                            '<i class="fa-regular fa-2x fa-heart text-danger m-1"></i>'

                                        let user_id = document.getElementById('user_id').value;
                                        let blog_id = document.getElementById('blog_id').value;

                                        $.ajax({

                                            type: "post",
                                            url: "/dislike",
                                            data: {
                                                user_id: user_id,
                                                blog_id: blog_id,
                                                _token: '{{ csrf_token() }}'

                                            },
                                            success: function(response) {
                                                console.log(response);
                                            },
                                        })


                                        document.getElementById('total_like').innerHTML = parseInt(
                                            document.getElementById('total_like').innerHTML) - 1;
                                    }

                                }
                                </script>
                                @endif
                            </ul>

                            <br>

                            <h3 class="d-inline">

                                @if($writter->avatar and $writter->settings->default_avatar == 1)
                                <img class="mr-2" style="max-width:20%;" src="{{$writter->avatar}}"
                                    alt="Owner primary image">
                                @elseif($writter->avatar and $writter->settings->default_avatar == 0)
                                <img class="mr-2" style="max-width:20%;" src="/storage/avatar/{{ $writter->avatar }}"
                                    alt="Owner primary image">
                                @endif

                                {{ $writter->name }}
                                @if($writter->role == 1)
                                <span class="text-success"><i class="fa-solid fa-circle-check"></i></span>
                                @elseif($writter->role == 2)
                                <span class="text-danger"><i class="fa-solid fa-chess-king"></i></span>
                                @endif
                            </h3>
                            <h1 class="my-3">{{ $blog->title }}</h1>

                            <ul class="post-meta mb-4">
                                @foreach($tags as $tag)
                                <li> <a href="{{ route('tag.filter', $tag->tag_name) }}">{{ $tag->tag_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="content text-left">
                                <hr>
                                <h2 id="heading">Introduction</h2>
                                <p>{{ $blog->introduction }}</p>


                                <h2 id="emphasis">Description</h2>
                                {!! $blog->description !!}

                                <hr>

                                @if(isset($blog->secondary_image))
                                <h2 id="image">Image</h2>

                                <div class="card-image">
                                    @if( Auth::user() and (Auth::user()->username == $writter->username))
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete-secondary-image" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('blog.delete.secondaryImage') }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="text" name="id" hidden value="{{ $blog->id }}">
                                                    <div class="modal-body">
                                                        <h4 class="text-danger">Are you sure that you want to remove
                                                            this
                                                            image?</h4>
                                                        <p>You can always add a new secondary image from the re-write
                                                            article option.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No!</button>
                                                        <button type="submit" class="btn btn-danger">Yes, I'm
                                                            sure</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-info">
                                        <a href="#" data-toggle="modal" data-target="#delete-secondary-image"><span
                                                class="text-uppercase">Remove Image</span></a>
                                    </div>
                                    @endif
                                    <img loading="lazy" decoding="async" class="w-100 d-block mb-4"
                                        src="/storage/blog_images/{{ $blog->secondary_image }}" alt="THIS IS AN IMAGE">
                                </div>

                                <hr>
                                @endif

                                @if(isset($blog->video_link))
                                <h2 id="youtube-video">Youtube video</h2>
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                                    <iframe src="https://www.youtube-nocookie.com/embed/{{$blog->video_link}}"
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;"
                                        allowfullscreen title="YouTube Video"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                @endif
                            </div>
                        </article>

                        @if( Auth::user() and (Auth::user()->username == $writter->username))


                        <div class="modal fade" id="blogDelete" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-danger" id="exampleModalLongTitle">Remove Article!
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('blog.remove') }}" method="POST" class="mt-4">
                                        @csrf
                                        <div class="modal-body">

                                            <h4>Are you sure that you want to remove this article?</h4>
                                            <p class="text-danger">This article will be deleted parmanently!</p>

                                            <input type="text" hidden name="id" value="{{ $blog->id }}">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">No!</button>
                                            <button type="Submit" class="btn btn-danger">Yes! I'm Sure</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('blog.update', $blog->id) }}"
                                class="btn btn-sm btn-outline-warning">Re-write Article</a>
                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                data-target="#blogDelete">Remove
                                Article</a>

                        </div>
                        @endif
                    </div>
                    <!-- Side bar will be here -->
                    <x-user.partials.sidebar />
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />

</x-user.master>