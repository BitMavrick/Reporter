<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Terms & Conditions | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#!">Terms & Conditions</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <h1 class="mb-4">Our Terms & Conditions</h1>
                        <div class="content">
                            <h3 id="Acceptance of terms">Acceptance of terms</h3>
                            <p>By accessing or using the website, you agree to be bound by these terms and conditions
                                and any additional terms and conditions that may apply. If you do not agree to these
                                terms, do not use the website.</p>

                            <h4 id="Changes to terms">Changes to terms</h4>
                            <p>We reserve the right to update and modify these terms and conditions at any time without
                                prior notice. It is your responsibility to review these terms and conditions regularly.
                                Your continued use of the website after any changes have been made constitutes your
                                acceptance of the revised terms.</p>
                            <h4 id="Use of the website">Use of the website</h4>
                            <p>The website is for your personal and non-commercial use. You may not use the website for
                                any illegal or unauthorized purpose. You may not modify, copy, distribute, transmit,
                                display, perform, reproduce, publish, license, create derivative works from, transfer,
                                or sell any information, software, products, or services obtained from the website.</p>

                            <h4 id="User content">User content</h4>
                            <p>You are solely responsible for any content that you submit, post, or transmit through the
                                website. You may not post or transmit any content that is illegal, fraudulent, or
                                infringes on the rights of any third party. You grant us a non-exclusive, perpetual,
                                irrevocable, royalty-free, worldwide license to use, reproduce, modify, publish,
                                translate, distribute, and display your content.</p>

                            <h4 id="Intellectual property">Intellectual property</h4>
                            <p>All content on the website, including but not limited to text, graphics, logos, and
                                images
                                is the property of the website or its content suppliers and is protected
                                by copyright and other intellectual property laws. You may not use any content on the
                                website for any commercial purpose without the express written consent of the website.
                            </p>

                            <h4 id="Governing law">Governing law</h4>
                            <p>These terms and conditions shall be governed by and construed in accordance with the laws
                                of the [State/Country] without giving effect to any principles of conflicts of law. If
                                any provision of these terms and conditions is found to be invalid or unenforceable,
                                that provision shall be enforced to the maximum extent possible and the remaining
                                provisions shall remain in full force and effect.
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />


</x-user.master>