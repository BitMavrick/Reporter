<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Privacy & Policy | Reporter'}}
    </x-slot>

    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#!">Privacy policy</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <h1 class="mb-4">Our Privacy Policy</h1>
                        <div class="content">
                            <h4 id="responsibility-of-contributors">Overview</h4>
                            <p>At Reporter, we understand the importance of protecting your personal information
                                and are committed to maintaining the privacy of our users. This privacy policy explains
                                how we collect, use, and disclose your personal information when you use our website.
                            </p>

                            <h4 id="Disclosure of Personal Information">Disclosure of Personal Information</h4>
                            <p>We do not sell or disclose your personal information to third parties without your
                                consent, except as required by law or to protect the rights, property, or safety of our
                                website, our users, or the public.</p>

                            <h4 id="Collection of Personal Information">Collection of Personal Information</h4>
                            <p>We use your personal information for the following purposes:</p>
                            <ol class="m-3">
                                <li>To verify your identity and maintain the security of your account.</li>
                                <li>To communicate with you about your account and our services.</li>
                                <li>To publish your articles on our website.
                                </li>

                            </ol>

                            <h4 id="Updates to this Privacy Policy">Updates to this Privacy Policy</h4>
                            <p>We reserve the right to modify this privacy policy at any time. Any updates to this
                                policy will be posted on this page, and we encourage you to review our privacy policy
                                regularly to stay informed about how we collect, use, and disclose your personal
                                information.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-user.partials.footer />


</x-user.master>