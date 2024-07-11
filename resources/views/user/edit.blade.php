@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} User {{ $user->name }}</span>
                        @if ($userTags->count() > 0)
                            @foreach ($userTags as $tag)
                                <span class="badge bg-secondary">{{ $tag->name }}</span>
                            @endforeach
                        @else
                            <span class="badge bg-danger">No tags</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('user.edit-form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
