@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
    <div class="row padding-1 p-1">
        <div class="col-md-12">
            <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                @include('user.create-form')
            </form>
        </div>
    </div>
@endsection
