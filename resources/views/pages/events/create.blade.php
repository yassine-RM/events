{{-- hériter la page master et passer un parametre titre= "index" et nav ='navAuth' --}}
@extends('layouts.master',['titre'=>'Create','nav'=>'partials/nav'])

{{-- fait un mise a jour a le content   --}}

@section('content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <h3 class="text-center">Create the Event </h3>

        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="titre">Titre</label>
                <input id="titre" value="{{ old('titre') }}" class="form-control @error('titre') is-invalid @enderror"
                    type="text" name="titre">

                <div class="invalid-feedback">
                    {{ $errors->first("titre") }}
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" cols="30" rows="5">
                   {{ old("description") }}
               </textarea>

                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-block btn-sm btn-info">create</button>
            </div>
        </form>

    </div>
</div>

@endsection
