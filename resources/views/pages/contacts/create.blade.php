{{-- hériter la page master et passer un parametre titre= "index" et nav ='navAuth' --}}
@extends('layouts.master',['titre'=>'Contact-Create','nav'=>'partials/nav'])

{{-- fait un mise a jour a le content   --}}

@section('content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <h3 class="text-center">Create the Contact </h3>

        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                    type="text" name="email">

                <div class="invalid-feedback">
                    {{ $errors->first("email") }}
                </div>
            </div>
            <div class="form-group">
                <label for="sujet">Sujet</label>
                <input id="sujet" value="{{ old('sujet') }}" class="form-control @error('sujet') is-invalid @enderror"
                    type="text" name="sujet">

                <div class="invalid-feedback">
                    {{ $errors->first("sujet") }}
                </div>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message"
                    cols="30" rows="5">
                   {{ old("message") }}
               </textarea>

                <div class="invalid-feedback">
                    {{ $errors->first("message") }}
                </div>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-block btn-sm btn-success">Envoyer</button>
            </div>
        </form>

    </div>
</div>

@endsection
