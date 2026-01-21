@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">

            @include('admin.includes.tag-header')



            <h2>Edit tag №{{$tag->id}}</h2>
            <form action="{{route('admin.tag.update', $tag->id)}}" method="POST" class="col-12">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Name</label>

                    <input type="text"
                           class="form-control"
                           name="title"
                           placeholder="Category name"
                           value="{{$tag->title}}">

                    @error('title')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror

                    <input type="submit" value="Update" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </section>

@endsection
