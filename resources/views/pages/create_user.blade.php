@extends('layouts.app')

@section('content')
{{ Form::open(['action' => 'PagesController@create_user_end', 'method' => 'POST']) }}
<div class="mx-auto" align='center'>
    <table class="w-50 table">
        <tr>
            <th>{{Form::label('name', 'Numele :')}}</th>
            <th>
                {{Form::text('name', '', ['placeholder' => 'Your Name'])}}
            </th>
        <tr>
            <th>{{Form::label('group', 'Grupa :')}}</th>
            <th>
                {{Form::text('group', '', ['placeholder' => 'new'])}}
            </th>
        <tr>
            <th>{{Form::label('email', 'Email :')}}</th>
            <th>
                {{Form::text('email', '', ['placeholder' => 'example@gmail.com'])}}
            </th>
        <tr>
            <th>{{Form::label('password', 'Parola :')}}</th>
            <th>
                {{Form::text('password', '')}}
            </th>
        <tr>
            <th>{{Form::label('confirm_password', 'Confirma Parola :')}}</th>
            <th>
                {{Form::text('confirm_password', '')}}
            </th>
    </table>
    {{Form::submit('Creeaza', ['class' => 'btn btn-success mx-3 mt-3 mb-2'])}}
</div>
{{ Form::close() }}
<div align='center'>
    <a href="/user_list" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
</div>
@endsection