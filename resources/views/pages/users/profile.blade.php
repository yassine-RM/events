{{-- hériter la page master et passer un parametre titre= "index" et nav ='nav'--}}
@extends('layouts.master',['titre'=>'Profile','nav'=>'partials/nav'])

{{-- fait un mise a jour a le content   --}}

@section('content')

<div class="row mt-5">
    <div class="col-md-6 offset-md-3">

        @if (session()->has("flash.message"))

        <div class="alert alert-{{ session()->get("flash.type") }} alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ session()->get("flash.titre") }}!</strong> {{ session()->get("flash.message") }}.
        </div>
        @endif
        <div class="text-center">
            <div class="text-right">
                <a href="{{ route('user.edit',Auth::user()->id) }}" class="btn btn-sm btn-warning">Modifier</a>

            </div>
            <div>
                <img class="rounded-circle" width="200" height="200" src="{{ asset('storage/'.Auth::user()->image) }}" alt="">
            </div>
            <p>
               <h3> Nom :<i class="text-danger">{{ Auth::user()->nom }}</i></h3>
                <h3>Email :<i class="text-danger">{{ Auth::user()->email }}</i></h3>
            </p>
        </div>

    </div>
</div>



@endsection
