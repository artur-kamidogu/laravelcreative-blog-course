@extends('admin.layouts.admin-lte')

@section('content')
    @include('admin.includes.tmp-cards')
    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.user-header')

            <div class="row">
                <div class="col-12">
                    Categories page
                    @include('admin.includes.users-table')

                </div>
            </div>
        </div>
    </section>
@endsection
