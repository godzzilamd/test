@extends('layouts.app')

@section('content')
    @if ($auth_user->rights !== 1)
        <div class="mb-5 pb-1">
            <div class="float-right mr-5">
                <a href="/delete_user_group"><img src="img\q1.png" alt="add" width="35"></a>
            </div>
            <div class="float-right mr-5">
                <a href="/create_user_group"><img src="img\q.png" alt="add" width="35"></a>
            </div>
        </div>
    @endif
    <div class="mx-auto mt-5" align='center'>
        <h3>Grupuri inregistrate</h3>
        @if (count($groups) > 0)
            @foreach ($groups as $group)
                @if ($group->rights < $auth_user->rights)
                    <div class="well">
                    <h4><a href="/update_user_group/{{$group->group_id}}" class="text-decoration-none">{{$group->name}}</a></h4>
                @else 
                    <div class="well">
                    <h4>{{$group->name}}</h4>
                @endif
            @endforeach
        @else
            <h3>Nu sunt utilizatori</h3>
        @endif
    </div>
    <div align='center'>
        <a href="/" class="btn btn-primary mx-3 my-4">Pagina principala</a>
    </div>
@endsection