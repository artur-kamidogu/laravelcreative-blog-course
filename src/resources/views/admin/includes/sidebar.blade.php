<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link ">
                <i class="navbar-toggler-icon fas fa-th-list"></i>
                <p>Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.tag.index')}}" class="nav-link">
                <i class="navbar-toggler-icon fas fa-tags"></i>
                <p>Tags</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="navbar-toggler-icon fas fa-th-list"></i>
                <p>Posts</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
                <i class="navbar-toggler-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
    </ul>
</nav>
