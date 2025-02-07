@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('User') }}
                            </span>
                            <form action="{{ route('users.index') }}" method="GET" class="float-right">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search..."
                                        value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Tags</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    @if ($user->tags->count() > 0)
                                                        <ul class="list-unstyled">
                                                            @foreach ($user->tags as $tag)
                                                                <li class="badge bg-primary">{{ $tag->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <div class="flex justify-center">
                                                            <span class="badge bg-danger">No tags</span>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary"
                                                            href="{{ route('users.show', $user->id) }}">
                                                            <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                        </a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('users.edit', $user->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No records found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Enlaces de paginación -->
                <div class="mt-3">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
