@extends('layouts.app')

@section('content')
{{ Form::open(['action' => ['PagesController@update_user_end', $user->id], 'method' => 'POST']) }}
    <div align='center'>
        <table class="w-50 table">
            <tr class="text-center">
                <th>{{Form::label('name', 'Numele :')}}</th>
                <th id="i1">
                    {{Form::label('name', $user->name)}}
                </th>
                <th id="d1" class="see">
                    {{Form::text('name', '', ['placeholder' => $user->name])}}
                </th>
            <tr class="text-center">
                <th id="i22">{{Form::label('group', 'Grupul :')}}</th>
                <th id="i2">
                    {{Form::label('group', $group->name)}}
                </th>
                <th id="d2" class="see">
                    {{Form::text('group', '', ['placeholder' => $group->name])}}
                </th>
            <tr id="rights" class="text-center">
                <th>{{Form::label('right', 'Nivelul privilegiilor :')}}</th>
                <th >
                    {{Form::label('right', $group->rights)}}
                </th>
            <tr class="text-center">
                <th>{{Form::label('email', 'Email :')}}</th>
                <th id="i3">
                    {{Form::label('email', $user->email)}}
                </th>
                <th id="d3" class="see">
                    {{Form::text('email', '', ['placeholder' => $user->email])}}
                </th>
            <tr class="text-center">
                <th>{{Form::label('password', 'Parola :')}}</th>
                <th id="i4">
                    {{Form::label('password', '&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;')}}
                </th>
                <th id="d4" class="see">
                    {{Form::text('password', '')}}
                </th>
        </table>
        @if (Auth::user()->name !== $user->name)
            <div class="d-flex flex-row justify-content-center">
                <div class="float-left mr-4">
                    <label class="switch">
                        <input type="checkbox" name="blocked" <?php if ($user->blocat == 1) echo 'checked';?> id='checkbox' disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="flaot-right mr-5">
                    {{Form::label('email', 'Blocat', ['class' => 'mt-1'])}}
                </div>
            </div>
        @endif
        {{Form::submit('Salveaza', ['class' => 'see btn btn-success mx-3 mt-3 mb-2', 'id' => 'btn'])}}
    </div>
{{ Form::close() }}
@if (Auth::user()->name !== $user->name)
    <div align='center'>
        <button class="btn btn-success mx-3 mt-3 mb-2" onclick="show()" id="btn1">Modifica</button>
    </div>
@else
    <div align='center'>
        <button class="btn btn-success mx-3 mt-3 mb-2" onclick="show2()" id="btn1">Modifica</button>
    </div>
@endif
<div class="mx-auto" align='center'>
    <a href="/user_list" class="btn btn-primary mx-3 mt-5 mb-3">Pagina precedenta</a>
    <hr size="5" width="100%">
</div>
@endsection

<script>
function show() {
    document.getElementById('i1').style.display = 'none';
    document.getElementById('i2').style.display = 'none';
    document.getElementById('i3').style.display = 'none';
    document.getElementById('i4').style.display = 'none';
    document.getElementById('btn1').style.display = 'none';
    document.getElementById('d1').style.display = 'block';
    document.getElementById('d2').style.display = 'block';
    document.getElementById('d3').style.display = 'block';
    document.getElementById('d4').style.display = 'block';
    document.getElementById('btn').style.display = 'block';
    document.getElementById('rights').style.display = 'none';
    document.getElementById('checkbox').disabled = false;
}

function show2() {
    document.getElementById('i1').style.display = 'none';
    document.getElementById('i22').style.display = 'none';
    document.getElementById('i2').style.display = 'none';
    document.getElementById('i3').style.display = 'none';
    document.getElementById('i4').style.display = 'none';
    document.getElementById('btn1').style.display = 'none';
    document.getElementById('d1').style.display = 'block';
    document.getElementById('d3').style.display = 'block';
    document.getElementById('d4').style.display = 'block';
    document.getElementById('btn').style.display = 'block';
    document.getElementById('rights').style.display = 'none';
} 
</script>