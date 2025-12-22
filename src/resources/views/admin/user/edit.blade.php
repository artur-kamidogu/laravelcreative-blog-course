@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.tmp-cards')
            @include('admin.includes.user-header')


            <h2>Edit user №{{$user->id}}</h2>
            <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="col-12">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Name</label>

                    <input type="text"
                           class="form-control"
                           name="name"
                           placeholder="user name"
                           value="{{$user->name}}">

                    @error('name')
                    <div class="text-danger">Field this ${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="email" placeholder="User email" value="{{$user->email}}">
                    @error('email')
                    <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Select role</label>
                    <select name="role" class="form-control">
                        @foreach($roles as $id => $role)
                            <option
                                value="{{$id}}"
                                {{$id == old('role') ? 'selected' : '' }}>
                                {{$role}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>

                <input type="submit" value="Update" class="btn btn-primary mt-2">
            </form>
        </div>
    </section>

@endsection
