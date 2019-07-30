{{-- hériter la page master et passer un parametre titre= "index" et nav ='nav'--}}
@extends('layouts.master',['titre'=>'Index','nav'=>'partials/nav'])

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
        @if ($events->count())
        <h3 class="text-center">Liste des évenements </h3>
        <h6>Totale = {{ $events->count()}} {{ Str::plural('Evenement',$events->count()) }} </h6>

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
                @foreach ($events as $event)

                <tr>
                    <td><img class="rounded-circle" width="40" src="{{ asset('storage/'.$event->user->image) }}"
                            alt="user image" srcset=""></td>
                    <td>{{ $event->user->nom }}</td>
                    <td>{{ $event->user->email }}</td>
                    <td>{{ $event->titre }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->created_at }}</td>
                    <td>
                        <form action="{{ route('event.destroy',$event->id) }}" method="POST">
                            <div class="btn-group">

                                @method("Delete")
                                @csrf
                                <a class="btn text-success btn-sm" href="{{ route('event.edit',$event->id) }}"><i
                                        class="fa fa-edit    "></i></a>
                                &nbsp;
                                <button class="btn text-danger btn-sm"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
        @else
        <p class="text-center text-danger">Aucun évenment existe pour le moment essai de créer des évenements <a href="{{ route('event.create') }}">ici</a></p>
        @endif

    </div>
</div>
<div class="row justify-content-center mt-2">
    {{ $events->links() }}
</div>
@endsection
