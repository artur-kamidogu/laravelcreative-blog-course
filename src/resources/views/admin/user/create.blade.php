@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.tmp-cards')
            @include('admin.includes.user-header')


            <form action="{{route('admin.user.store')}}" method="POST" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="User name">
                    @error('name')
                    <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="User email">
                    @error('email')
                    <div class="text-danger">${{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="User password">
                    @error('password')
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

                <input type="submit" value="Add" class="btn btn-primary mt-2">
            </form>
        </div>
    </section>

@endsection
