@extends('layouts.app')

@section('template_title')
    {{ $tag->name ?? __('Show') . " " . __('Tag') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tag</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tags.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $tag->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
