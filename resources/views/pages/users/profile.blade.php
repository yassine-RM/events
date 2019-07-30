{{-- hériter la page master et passer un parametre titre= "index" et nav ='nav'--}}
@extends('layouts.master',['titre'=>'Profile','nav'=>'partials/nav'])

{{-- fait un mise a jour a le content   --}}

@section('content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        @if (session()->has('flash.message'))
            <div class="alert alert-{{ session()->get('flash.type')}} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session()->get('flash.titre')}}</strong> {{ session()->get('flash.message')}}
            </div>
        @endif

        <h3 class="text-center"><i class="fa fa-user" aria-hidden="true"></i> Profile </h3>

        <h6 class="text-right"><a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Modifier</a></h6>

        <div class="text-center">
            <img class="rounded-circle" width="200" height="200" src="{{ asset('storage/'.$user->image)}}" alt="user">
            <br>
            <b>Nom : {{ $user->nom }}</b>
            <p>Email : {{ $user->email }}</p>
        </div>


    </div>
</div>

@endsection
