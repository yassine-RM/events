<div class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('event.index') }}">{{ env("APP_NAME") }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="nav mr-auto nav-tabs">
            <li class="nav-item ">
                <a class="nav-link {{ Route::is('event.index') ? 'active':''}}" href="{{ route('event.index') }}"><i
                        class="fa fa-home" aria-hidden="true"></i>
                    Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('event.create') ? 'active':''}}" href="{{ route('event.create') }}"><i
                        class="fa fa-plus" aria-hidden="true"></i>
                    Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('contact.index') ? 'active':''}}" href="{{ route('contact.index') }}"><i
                        class="fa fa-envelope" aria-hidden="true"></i> Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.show',Auth::user()->id) }}">
                    <img class="rounded-circle" width="30" height="30" src="{{ asset('storage/'.Auth::user()->image) }}" alt="">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('user.logOut') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>
                    log-Out</a>
            </li>


        </ul>

    </div>
</div>
