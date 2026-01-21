@extends('personal.layouts.user-admin-lte')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <h2>Edit comment №{{$comment->id}}</h2>
            <form action="{{route('personal.comment.update', $comment->id)}}" method="POST" class="col-12"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="message" placeholder="Post title"
                           value="{{$comment->message}}">
                    @error('title')
                    <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary mt-2">
                </div>
            </form>

        </div>
    </section>
@endsection
