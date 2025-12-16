{{--Встапвлять внутрь col-12 --}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
{{--            {{dd($categories)}}--}}

            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Posts(in dev)</th>
                <th colspan="3">Actions</th>
{{--                <th>Delete this category</th>--}}

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category -> id}}</td>
                    <td>{{$category -> title}}</td>
                    <td>{{$category -> created_at}}</td>
                    <td>{{$category -> updated_at}}</td>
                    <td><span class="tag tag-success">in dev...</span></td>

                    <td>
                        <a href="{{route('admin.category.show', $category->id)}}">
                            <i class="far fa-eye"></i>Show
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.category.edit', $category->id)}}">
                            <i class="fas fa-pencil-alt"></i>Edit
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию {{ $category->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Удалить
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
