@extends('layouts.app')

@section('content')
    <div align='center'>
        <div class="w-75">
            <h3 class="m-5">Actiuni asupra utilizatorilor</h3>
            <div class="d-flex flex-row justify-content-center">
                <a href="/user_list" class="btn btn-primary float-left mx-3">Afiseaza lista utilizatorilor</a>
            </div>
        </div>
        <div class="w-75">
            <h3 class="m-5">Actiuni asupra grupurilor</h3>
            <div class="d-flex flex-row justify-content-center">
                <a href="/user_group_list" class="btn btn-primary float-left mx-3">Afiseaza lista grupurilor</a>
            </div>
        </div>
    </div>
@endsection
