@extends('layouts.app')

@section('content')
    <div class="mx-auto mt-5" align='center'>
        <h3>Alegeti grupul ce urmeaza a fi sters</h3>
        @if (count($groups) > 0)
            @foreach ($groups as $group)
                    <div class="well">
                    <h4><a onclick="return confirm('Doriti sa stergeti acest utilizator?')" href="\delete_user_group_end/{{$group->group_id}}" class="text-decoration-none">{{$group->name}}</a></h4>
            @endforeach
        @else
            <h3>Nu sunt grupuri pe care sa ii puteti sterge</h3>
        @endif
    </div>
    <div align='center'>
        <a href="/user_group_list" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
    </div>
@endsection
