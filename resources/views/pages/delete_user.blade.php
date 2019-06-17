@extends('layouts.app')

@section('content')
    <div class="mx-auto mt-5" align='center'>
        <h3>Alegeti utilizatorul ce urmeaza a fi sters</h3>
        @if (count($users) > 0)
            @foreach ($users as $user)
                    <div class="well">
                        {{-- <h4><a onclick="myFunction()" href="/delete_user_end/{{$user->id}}">{{$user->name}}</a></h4> --}}
                    <h4><a onclick="return confirm('Doriti sa stergeti acest utilizator?')" href="\delete_user_end/{{$user->id}}" class="text-decoration-none">{{$user->name}}</a></h4>
            @endforeach
        @else
            <h3>Nu sunt utilizatori pe care sa ii puteti sterge</h3>
        @endif
    </div>
    <div align='center'>
        <a href="/user_list" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
    </div>
@endsection
