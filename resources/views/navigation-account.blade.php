<div>
    <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">
            <div class="user-avatar">
                <img class="rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            </div>
            <div class="is-user-name"><span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
            <a href="{{ route('profile.show') }}" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>{{ __('Profile') }}</span>
            </a>
            <hr class="navbar-divider">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="navbar-item">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>{{ __('Log Out') }}</span>
                </button>
            </form>
        </div>
    </div>
</div>