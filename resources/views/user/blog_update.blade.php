<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Re-write Article | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="{{ route('blog', $blog->id) }}">Article</a>
                            <span class="mx-1">/</span> <a>Re-write</a>
                        </div>
                    </div>
                </div>

                <h1>Re-write your article,</h1>
                <hr>

                <form class="mt-4" action="{{ route('blog.updating') }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" name="id" value="{{ $blog->id }}">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control form-control-lg" id="title"
                            aria-describedby="emailHelp" maxlength="100" value="{{ old('title', $blog->title) }}"
                            placeholder="Enter the title of your article here ...">
                        @error('title')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="intro">Introduction</label>
                        <textarea class="form-control" name="introduction" id="intro" rows="5" maxlength="1000"
                            placeholder="Write an overview of your article ...">{{ old('introduction', $blog->introduction) }}</textarea>
                        @error('introduction')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="des">Description</label>
                        <textarea class="form-control" name="description" id="editor" rows="3"
                            placeholder="Start writing your article ...">{{ old('description', $blog->description) }}</textarea>
                        @error('description')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <br>

                    <h1>Improve your article quality,</h1>
                    <hr>

                    <div class="form-group mt-4">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control form-control-lg" name="tags" @if(old('tags') !==null)
                            value="{{ old('tags') }}" @else value="{{ $all_tag }}" @endif aria-describedby="emailHelp"
                            required>
                        <small id="emailHelp" class="form-text text-muted">Tags will be separated via comma (,). You
                            must enter at least one tag</small>
                        @error('tags')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cover">Secondary Image (Optional)</label>
                        <input type="file" name="secondary_image" class="form-control" id="cover"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-danger">Leave it blank if you don't want to change
                            this image</small>
                        @error('secondary_image')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="youtube">Youtube Video Link (Optional)</label>
                        <input type="text" name="video_link" class="form-control" id="tags" aria-describedby="emailHelp"
                            placeholder="Paste the video link here ..."
                            value="{{ old('video_link', 'https://youtu.be/'.$blog->video_link) }}">
                        <small id="emailHelp" class="form-text text-muted">Paste the sharable link, otherwise it may not
                            work. (Please read terms & conditions to know more) Ex. https://youtu.be/0gNauGdOkro
                        </small>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Save and Publish</button>
                    <button type="reset" class="btn btn-secondary">Discard All</button>
                </form>

            </div>
        </section>

    </main>

    <x-user.partials.footer />

    <script>
    ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
        console.error(error);
    });
    </script>


    <!-- Character counter -->
    <script src="https://unpkg.com/short-and-sweet/dist/short-and-sweet.min.js"></script>
    <script>
    shortAndSweet("textarea, input");
    </script>

</x-user.master>