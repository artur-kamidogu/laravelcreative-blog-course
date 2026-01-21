@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.post-header')

            <div class="row">
                <div class="col-12">
                    Post page
                    <div class="card">
                        <div class="post-images mb-4 w-25">
                            <div class="row">
                                <!-- Главное изображение -->
                                <div class="col-sm-6 mb-3">
                                    <small class="text-muted d-block mb-1">Главное изображение</small>
                                    @if($post->main_image)
                                        <img src="{{ url('storage/' . $post->main_image) }}"
                                             alt="main_image"
                                             class="img-thumbnail w-100">
                                    @else
                                        <div class="bg-light text-muted p-3 text-center border rounded">
                                            <i class="fas fa-image"></i> Нет изображения
                                        </div>
                                    @endif
                                </div>

                                <!-- Превью изображение -->
                                <div class="col-sm-6 mb-3 w-25">
                                    <small class="text-muted d-block mb-1">Превью изображение</small>
                                    @if($post->preview_image)
                                        <img src="{{ url('storage/' . $post->preview_image) }}"
                                             alt="preview_image"
                                             class="img-thumbnail w-100">
                                    @else
                                        <div class="bg-light text-muted p-3 text-center border rounded">
                                            <i class="fas fa-image"></i> Нет изображения
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <h3 class="card-title">Post #{{ $post->id }}</h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Редактировать
                                    </a>

                                    <form action="{{ route('admin.post.delete', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию {{ $post->name }}?')">
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
                                <dd class="col-sm-9">{{ $post->id }}</dd>

                                <dt class="col-sm-3">Название</dt>
                                <dd class="col-sm-9">{{ $post->title }}</dd>

                                <dt class="col-sm-3">Контент</dt>
                                <dd class="col-sm-9">{{ $post->content }}</dd>

                                <dt class="col-sm-3">category_id</dt>
                                <dd class="col-sm-9">{{ $post->category_id }}</dd>

                                <dt class="col-sm-3">tags</dt>
                                <dd class="col-sm-9">in dev...</dd>

                                <dt class="col-sm-3">Дата создания</dt>
                                <dd class="col-sm-9">{{ $post->created_at }}</dd>

                                <dt class="col-sm-3">Дата обновления</dt>
                                <dd class="col-sm-9">{{ $post->updated_at }}</dd>

                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.post.index') }}" class="btn btn-default">
                                <i class="fas fa-arrow-left"></i> Назад к списку posts
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
