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

                <h1>This is the library</h1>

            </div>
        </section>
    </main>

    <x-user.partials.footer />

</x-user.master>