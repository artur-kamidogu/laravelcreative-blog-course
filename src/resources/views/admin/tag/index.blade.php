@extends('admin.layouts.admin-lte')

@section('content')

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.tag-header')

            <div class="row">
                <div class="col-12">
                    Tags page
                    @include('admin.includes.tags-table')

                </div>
            </div>
        </div>
    </section>
@endsection
