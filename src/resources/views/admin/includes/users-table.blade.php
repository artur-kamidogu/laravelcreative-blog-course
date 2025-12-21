{{--Встапвлять внутрь col-12 --}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
{{--            {{dd($users)}}--}}

            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>Create Date</th>
                <th>Update Date</th>

                <th colspan="3">Actions</th>
{{--                <th>Delete this user</th>--}}

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user -> id}}</td>
                    <td>{{$user -> name}}</td>
                    <td>{{$user -> email}}</td>
                    <td>{{$user -> created_at}}</td>
                    <td>{{$user -> updated_at}}</td>


                    <td>
                        <a href="{{route('admin.user.show', $user->id)}}">
                            <i class="far fa-eye"></i>Show
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.user.edit', $user->id)}}">
                            <i class="fas fa-pencil-alt"></i>Edit
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию {{ $user->name }}?')">
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
