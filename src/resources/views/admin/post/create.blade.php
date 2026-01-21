@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">

            @include('admin.includes.post-header')


            <form action="{{route('admin.post.store')}}" method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Post name"
                    value="{{old('title')}}">
                    @error('title')
                        <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea id="summernote" name="content">
                        {{old('content')}}
                    </textarea>
                    @error('content')
                        <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="preview_image">
                            <label class="custom-file-label" >Choose file for preview</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('preview_image')
                        <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="main_image">
                            <label class="custom-file-label" >Choose file for main image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('main_image')
                        <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Select category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}"
                                    {{$category->id == old('category_id') ? 'selected' : '' }}>
                                {{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Multiple</label>
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">

                        @foreach($tags as $tag)
                            <option {{ is_array( old('tag_ids')) &&
                                       in_array($tag->id, old('tag_ids')) ? ' selected' : ''}}
                                    value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                    @error('tag_ids')
                    <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </section>

@endsection

