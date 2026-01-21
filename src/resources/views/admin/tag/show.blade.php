@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.tag-header')

            <div class="row">
                <div class="col-12">
                    Tag page


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tag #{{ $tag->id }}</h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Редактировать
                                    </a>

                                    <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию {{ $tag->name }}?')">
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
                                <dd class="col-sm-9">{{ $tag->id }}</dd>

                                <dt class="col-sm-3">Название</dt>
                                <dd class="col-sm-9">{{ $tag->title }}</dd>

                                <dt class="col-sm-3">Дата создания</dt>
                                <dd class="col-sm-9">{{ $tag->created_at }}</dd>

                                <dt class="col-sm-3">Дата обновления</dt>
                                <dd class="col-sm-9">{{ $tag->updated_at }}</dd>

                                <dt class="col-sm-3">Посты</dt>
                                <dd class="col-sm-9">
{{--                                    <span class="badge badge-primary">{{ $tag->posts_count ?? 0 }}</span>--}}
                                    in dev ...
                                </dd>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.tag.index') }}" class="btn btn-default">
                                <i class="fas fa-arrow-left"></i> Назад к списку Tags
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
