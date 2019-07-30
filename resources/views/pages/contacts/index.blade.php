{{-- hériter la page master et passer un parametre titre= "index" et nav ='nav'--}}
@extends('layouts.master',['titre'=>'Contact-Index','nav'=>'partials/nav'])

{{-- fait un mise a jour a le content   --}}

@section('content')
<div class="row mt-5">
    <div class="col-md-12">

        @if (session()->has("flash.message"))

        <div class="alert alert-{{ session()->get('flash.type') }} alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ session()->get('flash.titre') }}!!!</strong> {{ session()->get('flash.message') }}
        </div>

        @endif
        @if ($contacts->count())

        <div class="row">
            <div class="col-md-6 text-center">
                <h3>Liste des évenements </h3>
                <h6>Totale = {{ $contacts->count()}} {{ Str::plural('Message',$contacts->count()) }} </h6>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info btn-sm" href="{{ route('contact.create') }}">Contacter-Nous <i
                        class="fa fa-envelope" aria-hidden="true"></i></a>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Image</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)

                <tr>
                    <td><img class="rounded-circle" width="40" src="{{ asset('storage/'.$contact->user->image) }}"
                            alt="user image" srcset=""></td>
                    <td>{{ $contact->user->nom }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->sujet }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->created_at }}</td>
                    <td>
                        <form action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                            <div class="btn-group">

                                @method("Delete")

                                @csrf
                                <button class="btn btn-sm text-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
        @else
        <p class="text-danger b text-center">Auccun message envoyer cliquer <a href="{{ route('contact.create') }}">ici</a> pour contacter nous</p>
        @endif

    </div>
</div>
<div class="row justify-content-center mt-2">
    {{ $contacts->links() }}
</div>
@endsection
