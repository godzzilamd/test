@extends('layouts.app')

@section('content')
{{ Form::open(['action' => ['UserGroupController@update_user_group_end', $group->group_id], 'method' => 'POST']) }}
    <div align='center'>
        <table class="w-50 table">
            <tr class="text-center">
                <th>{{Form::label('name', 'Numele grupei:')}}</th>
                <th id="i1">
                    {{Form::label('name', $group->name)}}
                </th>
                <th id="d1" class="see">
                    {{Form::text('name', '', ['placeholder' => $group->name])}}
                </th>
            <tr class="text-center">
                <th>{{Form::label('rights', 'Nivelul privilegiilor :')}}</th>
                <th id="i2">
                    {{Form::label('rights', $group->rights)}}
                </th>
                <th id="d2" class="see">
                    {{Form::text('rights', '', ['placeholder' => '<'.$auth_user->rights])}}
                </th>
        </table>
        {{Form::submit('Salveaza', ['class' => 'see btn btn-success mx-3 mt-3 mb-2', 'id' => 'btn'])}}
    </div>
{{ Form::close() }}

<div align='center'>
    <button class="btn btn-success mx-3 mt-3 mb-2" onclick="show()" id="btn1">Modifica</button>
</div>
<div class="mx-auto" align='center'>
    <a href="/user_group_list" class="btn btn-primary mx-3 mt-5 mb-3">Pagina precedenta</a>
    <hr size="5" width="100%">
</div>

@endsection

<script>
function show() {
    document.getElementById('i1').style.display = 'none';
    document.getElementById('i2').style.display = 'none';
    document.getElementById('btn1').style.display = 'none';
    document.getElementById('d1').style.display = 'block';
    document.getElementById('d2').style.display = 'block';
    document.getElementById('btn').style.display = 'block';
}
</script>