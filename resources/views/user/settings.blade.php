<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Settings | Reporter'}}
    </x-slot>
    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <x-user.partials.alert />
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#">Settings</a>
                        </div>
                    </div>

                </div>

                <div class="row no-gutters-lg">
                    <div class="col-12">
                        <h2 class="section-title">Additional Settings</h2>
                        <hr>
                    </div>
                </div>

                <div class="widget">
                    <form action="{{ route('settings.saving') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="widget-body mt-4">
                            <div class="form-group">
                                <label for="avatar">Change Avatar</label>
                                <input type="file" name="avatar" class="form-control" id="avatar"
                                    aria-describedby="emailHelp">
                                @error('primary_image')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">The ideal ratio of primary image is
                                    1:1 (square), The
                                    image will be crop to fit if it is not maintain the exact ratio.</small>

                            </div>
                        </div>

                        <div class="widget-body mt-4">
                            <div class="form-group">
                                <label for="mail">Change Mailing Address</label>
                                <input type="email" name="mail" class="form-control" id="mail"
                                    value="{{ auth()->user()->profile->mail }}" aria-describedby="emailHelp">
                                @error('mail')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">Change mailing adrress does not
                                    affect your account. You can still be able to log in with your actual email
                                    address.</small>
                            </div>
                        </div>

                        <div class="widget-body mt-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" name="hide_mail" style="margin-top: 7px;"
                                    type="checkbox" value="1"
                                    {{  Auth::user()->settings->hide_mail == '1' ? 'checked' : '' }} id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Hide Mail Address
                                </label>
                            </div>
                        </div>



                        <div class="widget-body mt-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" name="badge" value="1" style="margin-top: 7px;"
                                    type="checkbox" value="1"
                                    {{  Auth::user()->settings->apply_badge == '1' ? 'checked' : '' }}
                                    id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Apply for badge
                                </label>
                            </div>
                        </div>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

            </div>
        </section>

        <x-user.partials.footer />

</x-user.master>