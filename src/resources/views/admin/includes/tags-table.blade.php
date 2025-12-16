{{--Встапвлять внутрь col-12 --}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Tags</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
{{--            {{dd($tags)}}--}}

            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Posts(in dev)</th>
                <th colspan="3">Actions</th>
{{--                <th>Delete this tag</th>--}}

            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag -> id}}</td>
                    <td>{{$tag -> title}}</td>
                    <td>{{$tag -> created_at}}</td>
                    <td>{{$tag -> updated_at}}</td>
                    <td><span class="tag tag-success">in dev...</span></td>

                    <td>
                        <a href="{{route('admin.tag.show', $tag->id)}}">
                            <i class="far fa-eye"></i>Show
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.tag.edit', $tag->id)}}">
                            <i class="fas fa-pencil-alt"></i>Edit
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию {{ $tag->name }}?')">
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
