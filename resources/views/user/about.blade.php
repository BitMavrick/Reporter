<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Blog | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="index.html">Home</a>
                            <span class="mx-1">/</span> <a href="about.html">About</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <img loading="lazy" decoding="async" src="/user/images/author.jpg" class="img-fluid w-100 mb-4"
                            alt="Author Image">
                        <h1 class="mb-4">Hootan Safiyari</h1>
                        <div class="content">
                            <p>Hello, I&rsquo;m Hootan Safiyari. A Content writter, Developer and Story teller. Working
                                as a Content writter at CoolTech Agency. Quam nihil enim maxime corporis cumque totam
                                aliquid nam sint inventore optio modi neque laborum officiis necessitatibus, facilis
                                placeat pariatur! Voluptatem, sed harum pariatur adipisci voluptates voluptatum cumque,
                                porro sint minima similique magni perferendis fuga! Optio vel ipsum excepturi tempore
                                reiciendis id quidem? Vel in, doloribus debitis nesciunt fugit sequi magnam accusantium
                                modi neque quis, vitae velit, pariatur harum autem a! Velit impedit atque maiores animi
                                possimus asperiores natus repellendus excepturi sint architecto eligendi non, omnis
                                nihil. Facilis, doloremque illum. Fugit optio laborum minus debitis natus illo
                                perspiciatis corporis voluptatum rerum laboriosam.</p>
                            <blockquote>
                                <p>Facilis, doloremque illum. Fugit optio laborum minus debitis natus illo perspiciatis
                                    corporis voluptatum rerum laboriosam.</p>
                            </blockquote>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nihil enim maxime corporis
                                cumque totam aliquid nam sint inventore optio modi neque laborum officiis
                                necessitatibus, facilis placeat pariatur! Voluptatem, sed harum pariatur adipisci
                                voluptates voluptatum cumque, porro sint minima similique magni perferendis fuga! Optio
                                vel ipsum excepturi tempore reiciendis id quidem.</p>
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