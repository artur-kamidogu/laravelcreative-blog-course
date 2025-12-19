{{--Встапвлять внутрь col-12 --}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">


            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>category</th>
                <th>tags</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Posts(in dev)</th>
                <th colspan="3">Actions</th>
{{--                <th>Delete this post</th>--}}

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post -> id}}</td>
                    <td>{{$post -> title}}</td>
                    <td>{{$post -> content}}</td>
                    <td>{{$post->category_id}} in dev...</td>
                    <td>in dev...</td>
                    <td>{{$post -> created_at}}</td>
                    <td>{{$post -> updated_at}}</td>
                    <td><span class="tag tag-success">in dev...</span></td>

                    <td>
                        <a href="{{route('admin.post.show', $post->id)}}">
                            <i class="far fa-eye"></i>Show
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.post.edit', $post->id)}}">
                            <i class="fas fa-pencil-alt"></i>Edit
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('admin.post.delete', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию {{ $post->name }}?')">
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
