<div class="head">
    <nav class="navbar is-info" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/forum">
                <img src="/images/logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navLink" id="burger">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navLink" class="navbar-menu">
            <div class="navbar-start">
                @auth('lecturer')
                    <a href="/myforum" class="navbar-item {{ ($title === "My Forum") ? 'tabActive' : '' }}">
                        My Forum
                    </a>
                @endauth

                <a href="/forum" class="navbar-item {{ ($title === "Forum") ? 'tabActive' : '' }}">
                Forum
                </a>

                <a href="/history" class="navbar-item {{ ($title === "History") ? 'tabActive' : '' }}">
                History
                </a>
            </div>

            @auth('student')
                <div class="navbar-end">
                    <a href="/profile" class="navbar-item {{ ($title === "Profile") ? 'tabActive' : '' }}">
                        Profile
                    </a>

                    <div class="navbar-item">
                        <div class="buttons">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="button is-primary"><strong>Logout</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
            @elseauth('lecturer')
                <div class="navbar-end">
                    <a href="/profile" class="navbar-item {{ ($title === "Profile") ? 'tabActive' : '' }}">
                        Profile
                    </a>

                    <div class="navbar-item">
                        <div class="buttons">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="button is-primary"><strong>Logout</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="/signup" class="button is-primary">
                                <strong>Sign up</strong>
                            </a>
                            <a href="/" class="button is-light">
                                Log in
                            </a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
</div>
