<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                        <a href="{{route('menus.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Menu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('menus.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('menus.create')}}">Thêm menu</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('categories.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Thư mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('categories.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('categories.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="{{route('distributions.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Phân loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('distributions.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('distributions.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="{{route('users.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('users.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('users.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('products.index')}}"><i class="fa fa-users fa-fw"></i>Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('products.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('products.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('articles.index')}}"><i class="fa fa-users fa-fw"></i>Bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('articles.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('articles.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('orders.index')}}"><i class="fa fa-users fa-fw"></i>Hóa đơn<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>