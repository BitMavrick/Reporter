<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="{{ route('super.home') }}">
                        <span>Reporter Admin</span>
                    </a></div>


                <li class="label">Options</li>

                <li {{ $side_val == 'users' ? 'class="active"' : '' }}><a href="{{ route('super.home') }}"><i
                            class="ti-user"></i> Users</a></li>
                <li {{ $side_val == 'articles' ? 'class="active"' : '' }}><a href="{{ route('super.articles') }}"><i
                            class="ti-file"></i>
                        Articles</a></li>

                <li><a><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>