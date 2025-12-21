@extends('admin.layouts.admin-lte')

@section('content')
    @include('admin.includes.tmp-cards')
    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.user-header')

            <div class="row">
                <div class="col-12">
                    Users page


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">user #{{ $user->id }}</h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Редактировать
                                    </a>

                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить user {{ $user->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3">ID</dt>
                                <dd class="col-sm-9">{{ $user->id }}</dd>

                                <dt class="col-sm-3">name</dt>
                                <dd class="col-sm-9">{{ $user->name }}</dd>

                                <dt class="col-sm-3">email</dt>
                                <dd class="col-sm-9">{{ $user->email }}</dd>

                                <dt class="col-sm-3">Дата создания</dt>
                                <dd class="col-sm-9">{{ $user->created_at }}</dd>

                                <dt class="col-sm-3">Дата обновления</dt>
                                <dd class="col-sm-9">{{ $user->updated_at }}</dd>

                                <dt class="col-sm-3">Посты</dt>
                                <dd class="col-sm-9">
{{--                                    <span class="badge badge-primary">{{ $user->posts_count ?? 0 }}</span>--}}
                                    in dev ...
                                </dd>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-default">
                                <i class="fas fa-arrow-left"></i> Назад к списку пользователей
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
