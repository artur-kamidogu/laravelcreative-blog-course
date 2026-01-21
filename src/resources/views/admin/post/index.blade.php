@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.post-header')

            <div class="row">
                <div class="col-12">
                    Categories page
                    @include('admin.includes.posts-table')

                </div>
            </div>
        </div>
    </section>
@endsection
