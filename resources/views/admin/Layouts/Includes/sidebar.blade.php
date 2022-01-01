<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Quản lý tài khoản</li>
            <li>
                <a class="has-arrow" href="{{ route('QLtaikhoan')}}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Quản lý tài khoản</span>
                </a>

            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="{{ route('QLsanpham')}}" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Quản lý sản phẩm</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('QLsanpham')}}">Quản lý danh sách sản phẩm</a></li>
                    <li><a href="{{ route('Themsanpham')}}">Thêm sản phẩm</a></li>
                    <li><a href="{{ route('QLloaiSP')}}">Quản lý loại sản phẩm</a></li>

                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Quản lý đơn hàng</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('QLhoadonban')}}">Quản lý hoá đơn xuất</a></li>
                    <li><a href="{{ route('QLhoadonnhap')}}">Quản lý hoá đơn nhập</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
