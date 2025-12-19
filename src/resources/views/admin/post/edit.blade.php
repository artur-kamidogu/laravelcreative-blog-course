@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.tmp-cards')
            @include('admin.includes.post-header')


            <h2>Edit post №{{$post->id}}</h2>
            <form action="{{route('admin.post.update', $post->id)}}" method="POST" class="col-12"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Post title"
                           value="{{$post->title}}">
                    @error('title')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea id="summernote" name="content">
                        {{$post->content}}
                    </textarea>
                    @error('content')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="w-50 mb-2">
                        <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="w-50">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="preview_image">
                            <label class="custom-file-label">Choose file for preview</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="w-50 mb-2">
                        <img src="{{url('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="main_image">
                            <label class="custom-file-label">Choose file for main image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('main_image')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Select category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}"
                                {{$category->id == $post->category_id ? 'selected' : '' }}>
                                {{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Multiple</label>
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;">

                        @foreach($tags as $tag)
                            <option {{ is_array( $post->tags->pluck('id')->toArray()) &&
                                       in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                    value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary mt-2">
                </div>
            </form>

        </div>
    </section>

@endsection
