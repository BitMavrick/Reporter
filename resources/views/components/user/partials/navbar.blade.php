<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Log in Required!</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You need to log in to access this feature. Would you like to log in?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Maybe Later!</button>
                <a href="{{ route('google.auth') }}"><button type="button" class="btn btn-primary">Yes,
                        Sure!</button></a>
            </div>
        </div>
    </div>
</div>

<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="{{ route('home') }}" data-toggle="tooltip" data-placement="top"
                title="Go to Home">
                <img loading="prelaod" decoding="async" class="img-fluid" src="/user/images/logo.png"
                    alt="Reporter Hugo">
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
                    data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form action="{{ route('search') }}" class="search order-lg-3 order-md-2 order-3 ml-auto">
                <input id="search-query" name="keyword" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}" data-toggle="tooltip"
                            data-placement="top" title="Explore the latest articles">Explore</a>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Articles
                        </a>
                        <div class="dropdown-menu">
                            @if(Auth::user())
                            <a class="dropdown-item" href="{{ route('blog.create')}}">Create New</a>
                            <a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">My
                                Profile</a>
                            <a class="dropdown-item" href="{{ route('settings')}}">Settings</a>
                            @else

                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Create
                                New</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">My
                                Profile</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Settings</a>

                            @endif
                        </div>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('library') }}" data-toggle="tooltip"
                            data-placement="top"
                            title="Collection of the articles based on the popular topics">Library</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>