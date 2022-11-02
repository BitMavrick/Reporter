<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Blog | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs mb-4"> <a href="index.html">Home</a>
                            <span class="mx-1">/</span> <a href="#!">Contact</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pr-0 pr-lg-4">
                            <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labor.
                                <div class="mt-5">
                                    <p class="h3 mb-3 font-weight-normal"><a class="text-dark"
                                            href="mailto:hello@reporter.com">hello@reporter.com</a>
                                    </p>
                                    <p class="mb-3"><a class="text-dark"
                                            href="tel:&#43;211234565523">&#43;211234565523</a>
                                    </p>
                                    <p class="mb-2">9567 Turner Trace Apt. BC C3G8A4</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <form method="POST" action="#!" class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-4" placeholder="Name" name="name" id="name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control mb-4" placeholder="Email" name="email"
                                    id="email">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-4" placeholder="Subject" name="subject"
                                    id="subject">
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="message" class="form-control mb-4"
                                    placeholder="Type You Message Here" rows="5"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-primary" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />


</x-user.master>