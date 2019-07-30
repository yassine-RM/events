<div class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route("user.index") }}">{{ env("APP_NAME") }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav navbar-right ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>
                    login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.create') }}"><i class="fa fa-registered"
                        aria-hidden="true"></i> register</a>
            </li>
        </ul>

    </div>
</div>
