<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'About | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#!">About</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <h1 class="mb-4">About Reporter</h1>
                        <div class="content">

                            <p>Welcome to Reporter, a new article writing website dedicated to providing high-quality
                                content for businesses and individuals.</p>
                            <br>

                            <p>In addition to our writing services, we also offer editing and proofreading services to
                                ensure that your content is error-free and meets the highest standards of quality.</p>
                            <br>
                            <p>At Reporter, we believe that effective content is essential for any business or
                                individual looking to succeed online. That's why we're committed to providing
                                affordable, reliable, and high-quality services to our clients.</p>
                            <br>
                            <p>If you're ready to take your online presence to the next level, contact us today to learn
                                more about how we can help you succeed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />


</x-user.master>