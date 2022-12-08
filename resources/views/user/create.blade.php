<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Create New | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a
                                href="{{ route('profile', Auth::user()->username) }}">Profile</a>
                            <span class="mx-1">/</span> <a>Create</a>
                        </div>
                    </div>
                </div>

                <h1>Publish a new article,</h1>

                <form class="mt-5" action="{{ route('blog.creating') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control form-control-lg" id="title"
                            aria-describedby="emailHelp" maxlength="100" value="{{ old('title') }}"
                            placeholder="Enter the title of your article here">
                        @error('title')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cover">Primary Image</label>
                        <input type="file" name="main_image" class="form-control" id="cover"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">The ideal ratio of primary image is 16:9, The
                            image will be crop to fit if it is not maintain the exact ratio.</small>
                    </div>

                    <div class="form-group mt-4">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control form-control-lg" name="tags" aria-describedby="emailHelp"
                            required>
                        <small id="emailHelp" class="form-text text-muted">Tags will be separated via comma (,). You
                            must enter at least one tag</small>
                        @error('tags')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="intro">Introduction</label>
                        <textarea class="form-control" name="introduction" id="intro" rows="5" maxlength="1000"
                            placeholder="Write an overview of your article ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cover">Secondary Image (Optional)</label>
                        <input type="file" name="secondary_image" class="form-control" id="cover"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">The ideal ratio of image is 16:9, The
                            image will be crop to fit if it is not maintain the exact ratio.</small>
                    </div>

                    <div class="form-group mt-4">
                        <label for="des">Description</label>
                        <textarea class="form-control" name="description" id="des" rows="3"
                            placeholder="Start writing your article ..."></textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="youtube">Youtube Video Link (Optional)</label>
                        <input type="text" name="video_link" class="form-control" id="tags" aria-describedby="emailHelp"
                            placeholder="Paste the video link here ...">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Publish</button>
                    <button type="reset" class="btn btn-secondary">Discard All</button>
                </form>

            </div>
        </section>

    </main>

    <x-user.partials.footer />

    <script>
    tinymce.init({
        selector: "#des",
        height: "400",
        plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect",
        toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
        tinycomments_mode: "embedded",
        tinycomments_author: "Author name",
        mergetags_list: [{
                value: "First.Name",
                title: "First Name"
            },
            {
                value: "Email",
                title: "Email"
            },
        ],
    });
    </script>


    <!-- Character counter -->
    <script src="https://unpkg.com/short-and-sweet/dist/short-and-sweet.min.js"></script>
    <script>
    shortAndSweet("textarea, input");
    </script>

</x-user.master>