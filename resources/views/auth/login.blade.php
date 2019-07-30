{{-- hériter la page master et passer un parametre titre= "index" et nav ='navAuth' --}}
@extends('layouts.master',['titre'=>'login','nav'=>'partials/navAuth'])

{{-- fait un mise a jour a le content   --}}

@section('content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        @if (session()->has("flash.message"))
            <div class="alert alert-{{ session()->get("flash.type")}} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session()->get('flash.titre') }} !!!</strong> {{ session()->get('flash.message') }}!!!.
            </div>
        @endif
        <h3 class="text-center">Login </h3>

        <form action="{{ route('user.login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="Email">Email</label>
                <input id="Email" value="{{ old('Email') }}" class="form-control @error('Email') is-invalid @enderror" type="text" name="Email">

                <div class="invalid-feedback">
                    {{ $errors->first("Email") }}
                </div>
            </div>
            <div class="form-group">
                <label for="Password">Password </label>
                <input id="Password" value="{{ old('Password') }}" class="form-control @error('Password') is-invalid @enderror" type="password"
                    name="Password">

                <div class="invalid-feedback">
                    {{ $errors->first("Password") }}
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-sm btn-info">login</button>
            </div>
        </form>

    </div>
</div>

@endsection
