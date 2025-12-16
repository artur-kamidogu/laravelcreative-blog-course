@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.tmp-cards')
            @include('admin.includes.tag-header')



            <form action="{{route('admin.tag.store')}}" method="POST" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="title" placeholder="Tag title">
                    @error('title')
                        <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                    <input type="submit" value="Add" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </section>

@endsection
