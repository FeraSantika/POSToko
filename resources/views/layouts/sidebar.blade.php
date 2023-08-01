<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index-2.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index-2.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-dark.png') }} " alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo-dark-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    {{-- <span class="badge bg-success float-end">5</span> --}}
                    <span> Master User </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'role' ? 'active' : '' }}"
                                href="{{ route('role') }}">Role</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'user' ? 'active' : '' }}"
                                href="{{ route('user') }}">User</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'supplier' ? 'active' : '' }}"
                                href="{{ route('supplier') }}">Supplier</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Master Menu </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'menu' ? 'active' : '' }}"
                                href="{{ route('menu') }}">Menu</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('barang') }}"
                    class="side-nav-link {{ Route::current()->getName() == 'barang' ? 'active' : '' }}">
                    <i class="uil-tag-alt"></i>
                    <span> Produk </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('kategori') }}"
                    class="side-nav-link {{ Route::current()->getName() == 'kategori' ? 'active' : '' }}">
                    <i class="uil-label"></i>
                    <span> Kategori </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTransaksi" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-shopping-trolley"></i>
                    <span> Transaksi </span>
                </a>
                <div class="collapse" id="sidebarTransaksi">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'transaksi.bk' ? 'active' : '' }}"
                                href="{{ route('transaksi.bk') }}">Transaksi Barang Keluar</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'transaksi.bm' ? 'active' : '' }}""
                                href="{{route('transaksi.bm')}}">Transaksi Barang Masuk</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Help Box -->
            <div class="help-box text-white text-center">
                <a href="javascript: void(0);" class="float-end close-btn text-white">
                    <i class="mdi mdi-close"></i>
                </a>
                <img src="{{ asset('assets/images/svg/help-icon.svg') }}" height="90" alt="Helper Icon Image" />
                <h5 class="mt-3">Unlimited Access</h5>
                <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
            </div>
            <!-- end Help Box -->
        </ul>
        <!--- End Sidemenu -->
        <div class="clearfix"></div>
    </div>
</div>
