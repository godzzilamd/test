@extends('layouts.app')

@section('content')
{{ Form::open(['action' => 'UserGroupController@create_user_group_end', 'method' => 'POST']) }}
<div class="mx-auto" align='center'>
    <table class="w-50 table">
        <tr>
            <th>{{Form::label('name', 'Numele grupei:')}}</th>
            <th>
                {{Form::text('name', '', ['placeholder' => 'Orice nume'])}}
            </th>
        <tr>
            <th>{{Form::label('rights', 'Privilegii :')}}</th>
            <th>
                {{Form::text('rights', '', ['placeholder' => '<'.$auth_user->rights])}}
            </th>
    </table>
    {{Form::submit('Creeaza', ['class' => 'btn btn-success mx-3 mt-3 mb-2'])}}
</div>
{{ Form::close() }}
<div align='center'>
    <a href="/user_group_list" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
</div>
@endsection