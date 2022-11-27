<x-user.master>

    <x-slot name="title">
        {{ $title ?? '404 | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <img loading="lazy" decoding="async" src="/user/images/404.png" alt="404" class="img-fluid mb-4"
                            width="500" height="350">
                        <h1 class="mb-4">Page Not Found!</h1>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Back To Home</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />


</x-user.master>