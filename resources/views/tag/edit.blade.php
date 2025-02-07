@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tag
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Tag</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tags.update', $tag->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tag.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
