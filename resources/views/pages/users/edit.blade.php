{{-- hériter la page master et passer un parametre titre= "index" et nav ='navAuth' --}}
@extends('layouts.master',['titre'=>'Update Profile','nav'=>'partials/nav'])

{{-- fait un mise a jour a le content   --}}

@section('content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <h3 class="text-center"><i class="fa fa-edit    "></i> Edit profile </h3>

        <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="Name">Name</label>
                <input id="Name" value="{{ $user->nom }}" class="form-control @error('Name') is-invalid @enderror" type="text" name="Name">

                <div class="invalid-feedback">
                    {{ $errors->first("Name") }}
                </div>
            </div>
            <div class="form-group">
                <label for="Image">Image</label>
                <input id="Image" class="form-control @error('Image') is-invalid @enderror" type="file" accept="image/*"
                    name="Image">

                <div class="invalid-feedback">
                    {{ $errors->first("Image") }}
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
                <label for="Repeat_password">Confirmed password </label>
                <input id="Repeat_password" value="{{ old('Repeat_password') }}" class="form-control @error('Repeat_password') is-invalid @enderror"
                    type="password" name="Repeat_password">

                <div class="invalid-feedback">
                    {{ $errors->first("Repeat_password") }}
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-sm btn-warning">Modifier</button>
            </div>
        </form>

    </div>
</div>

@endsection
