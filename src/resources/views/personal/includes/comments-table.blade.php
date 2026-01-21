{{--Встапвлять внутрь col-12 --}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">User comments</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Message</th>

                    <th colspan="3">Actions</th>
                    {{--                <th>Delete this post</th>--}}

                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment -> id}}</td>
                        <td>{{$comment -> message}}</td>
                        <td>
                            <a href="{{route('admin.post.show', $comment->id)}}">
                                <i class="far fa-eye"></i>Show
                            </a>
                        </td>
                        <td>
                            <a href="{{route('personal.comment.edit', $comment->id)}}">
                                <i class="fas fa-pencil-alt"></i>Edit
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('personal.comment.delete', $comment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Edit comment {{ $comment->message }}?')">
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
