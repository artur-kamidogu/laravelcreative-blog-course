<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{route('personal.index')}}" class="nav-link ">
                <i class="navbar-toggler-icon fas fa-home"></i>
                <p>Main page</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('personal.liked')}}" class="nav-link">
                <i class="navbar-toggler-icon fas fa-heart"></i>
                <p>Liked posts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('personal.comments')}}" class="nav-link">
                <i class="navbar-toggler-icon fas fa-comment"></i>
                <p>Comments</p>
            </a>
        </li>

    </ul>
</nav>
