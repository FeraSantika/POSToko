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
                    <i class="uil-home-alt"></i>
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
                    <i class="uil-shop"></i>
                    <span> Produk </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('kategori')}}"
                    class="side-nav-link {{ Route::current()->getName() == 'kategori' ? 'active' : '' }}">
                    <i class="uil-tag-alt"></i>
                    <span> Kategori </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('transaksi')}}"
                    class="side-nav-link {{ Route::current()->getName() == 'transaksi' ? 'active' : '' }}">
                    <i class="uil-shopping-trolley"></i>
                    <span> Transaksi </span>
                </a>
            </li>


            {{--
            <li class="side-nav-title">Apps</li>

            <li class="side-nav-item">
                <a href="apps-calendar"
                    class="side-nav-link {{ Route::current()->getName() == 'apps-calendar' ? 'active' : '' }}">
                    <i class="uil-calender"></i>
                    <span> Calendar </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="apps-chat"
                    class="side-nav-link {{ Route::current()->getName() == 'apps-chat' ? 'active' : '' }}">
                    <i class="uil-comments-alt"></i>
                    <span> Chat </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm"
                    class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span class="badge bg-danger text-white float-end">New</span>
                    <span> CRM </span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'crm-projects' ? 'active' : '' }}"
                                href="crm-projects">Projects</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'crm-orders-list' ? 'active' : '' }}"
                                href="crm-orders-list">Orders List</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'crm-clients' ? 'active' : '' }}"
                                href="crm-clients">Clients</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'crm-management' ? 'active' : '' }}"
                                href="crm-management">Management</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                    aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-products' ? 'active' : '' }}"
                                href="apps-ecommerce-products">Products</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-products-details' ? 'active' : '' }}"
                                href="apps-ecommerce-products-details">Products Details</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-orders' ? 'active' : '' }}"
                                href="apps-ecommerce-orders">Orders</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-orders-details' ? 'active' : '' }}"
                                href="apps-ecommerce-orders-details">Order Details</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-customers' ? 'active' : '' }}"
                                href="apps-ecommerce-customers">Customers</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-shopping-cart.blade.php' ? 'active' : '' }}"
                                href="apps-ecommerce-shopping-cart">Shopping Cart</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-checkout' ? 'active' : '' }}"
                                href="apps-ecommerce-checkout">Checkout</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-ecommerce-sellers' ? 'active' : '' }}"
                                href="apps-ecommerce-sellers">Sellers</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail"
                    class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-email-inbox' ? 'active' : '' }}"
                                href="apps-email-inbox">Inbox</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-email-read' ? 'active' : '' }}"
                                href="apps-email-read">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false"
                    aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-projects-list' ? 'active' : '' }}"
                                href="apps-projects-list">List</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-projects-details' ? 'active' : '' }}"
                                href="apps-projects-details">Details</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-projects-gantt' ? 'active' : '' }}"
                                href="apps-projects-gantt">Gantt <span
                                    class="badge rounded-pill bg-light text-dark font-10 float-end">New</span></a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-projects-add' ? 'active' : '' }}"
                                href="apps-projects-add">Create Project</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="apps-social-feed" class="side-nav-link {{ Route::current()->getName() == 'apps-social-feed' ? 'active' : '' }}">
                    <i class="uil-rss"></i>
                    <span> Social Feed </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks"
                    class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Tasks </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTasks">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-tasks' ? 'active' : '' }}"
                                href="apps-tasks">List</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-tasks-details' ? 'active' : '' }}"
                                href="apps-tasks-details">Details</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'apps-kanban' ? 'active' : '' }}"
                                href="apps-kanban">Kanban Board</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="apps-file-manager" class="side-nav-link {{ Route::current()->getName() == 'apps-file-manager' ? 'active' : '' }}">
                    <i class="uil-folder-plus"></i>
                    <span> File Manager </span>
                </a>
            </li>

            <li class="side-nav-title">Custom</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="uil-copy-alt"></i>
                    <span> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-profile' ? 'active' : '' }}"
                                href="pages-profile">Profile</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-profile-2' ? 'active' : '' }}"
                                href="pages-profile-2">Profile 2</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-invoice' ? 'active' : '' }}"
                                href="pages-invoice">Invoice</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-faq' ? 'active' : '' }}"
                                href="pages-faq">FAQ</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-pricing' ? 'active' : '' }}"
                                href="pages-pricing">Pricing</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-maintenance' ? 'active' : '' }}"
                                href="pages-maintenance">Maintenance</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                                aria-controls="sidebarPagesAuth">
                                <span> Authentication </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-login' ? 'active' : '' }}"
                                            href="pages-login">Login</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-login-2' ? 'active' : '' }}"
                                            href="pages-login-2">Login 2</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-register' ? 'active' : '' }}"
                                            href="pages-register">Register</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-register-2' ? 'active' : '' }}"
                                            href="pages-register-2">Register 2</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-logout' ? 'active' : '' }}"
                                            href="pages-logout">Logout</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-logout-2' ? 'active' : '' }}" href="pages-logout-2">Logout 2</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-recoverpw' ? 'active' : '' }}" href="pages-recoverpw">Recover Password</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-recoverpw-2' ? 'active' : '' }}" href="pages-recoverpw-2">Recover Password 2</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-lock-screen' ? 'active' : '' }}" href="pages-lock-screen">Lock Screen</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-lock-screen-2' ? 'active' : '' }}" href="pages-lock-screen-2">Lock Screen 2</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-confirm-mail' ? 'active' : '' }}" href="pages-confirm-mail">Confirm Mail</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-confirm-mail-2' ? 'active' : '' }}" href="pages-confirm-mail-2">Confirm Mail 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false"
                                aria-controls="sidebarPagesError">
                                <span> Error </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesError">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-404' ? 'active' : '' }}" href="pages-404">Error 404</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-404-alt' ? 'active' : '' }}" href="pages-404-alt">Error 404-alt</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Route::current()->getName() == 'pages-500' ? 'active' : '' }}" href="pages-500">Error 500</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-starter' ? 'active' : '' }}" href="pages-starter">Starter Page</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-preloader' ? 'active' : '' }}" href="pages-preloader">With Preloader</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'pages-timeline' ? 'active' : '' }}" href="pages-timeline">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="landing" target="_blank" class="side-nav-link">
                    <i class="uil-globe"></i>
                    <span class="badge bg-secondary text-light float-end">New</span>
                    <span> Landing </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false"
                    aria-controls="sidebarLayouts" class="side-nav-link">
                    <i class="uil-window"></i>
                    <span> Layouts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-horizontal' ? 'active' : '' }}" href="layouts-horizontal" target="_blank">Horizontal</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-detached' ? 'active' : '' }}" href="layouts-detached" target="_blank">Detached</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-full' ? 'active' : '' }}" href="layouts-full" target="_blank">Full View</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-fullscreen' ? 'active' : '' }}" href="layouts-fullscreen" target="_blank">Fullscreen View</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-hover' ? 'active' : '' }}" href="layouts-hover" target="_blank">Hover Menu</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-compact' ? 'active' : '' }}" href="layouts-compact" target="_blank">Compact</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'layouts-icon-view' ? 'active' : '' }}" href="layouts-icon-view" target="_blank">Icon View</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Components</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false"
                    aria-controls="sidebarBaseUI" class="side-nav-link">
                    <i class="uil-box"></i>
                    <span> Base UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-accordions' ? 'active' : '' }}" href="ui-accordions">Accordions & Collapse</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-alerts' ? 'active' : '' }}" href="ui-alerts">Alerts</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-avatars' ? 'active' : '' }}" href="ui-avatars">Avatars</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-badges' ? 'active' : '' }}" href="ui-badges">Badges</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-breadcrumb' ? 'active' : '' }}" href="ui-breadcrumb">Breadcrumb</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-buttons' ? 'active' : '' }}" href="ui-buttons">Buttons</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-cards' ? 'active' : '' }}" href="ui-cards">Cards</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-carousel' ? 'active' : '' }}" href="ui-carousel">Carousel</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-dropdowns' ? 'active' : '' }}" href="ui-dropdowns">Dropdowns</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-embed-video' ? 'active' : '' }}" href="ui-embed-video">Embed Video</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-grid' ? 'active' : '' }}" href="ui-grid">Grid</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-list-group' ? 'active' : '' }}" href="ui-list-group">List Group</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-modals' ? 'active' : '' }}" href="ui-modals">Modals</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-notifications' ? 'active' : '' }}" href="ui-notifications">Notifications</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-offcanvas' ? 'active' : '' }}" href="ui-offcanvas">Offcanvas</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-placeholders' ? 'active' : '' }}" href="ui-placeholders">Placeholders</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-pagination' ? 'active' : '' }}" href="ui-pagination">Pagination</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-popovers' ? 'active' : '' }}" href="ui-popovers">Popovers</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-progress' ? 'active' : '' }}" href="ui-progress">Progress</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-ribbons' ? 'active' : '' }}" href="ui-ribbons">Ribbons</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-spinners' ? 'active' : '' }}" href="ui-spinners">Spinners</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-tabs' ? 'active' : '' }}" href="ui-tabs">Tabs</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-tooltips' ? 'active' : '' }}" href="ui-tooltips">Tooltips</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-links' ? 'active' : '' }}" href="ui-links">Links</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-typography' ? 'active' : '' }}" href="ui-typography">Typography</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::current()->getName() == 'ui-utilities' ? 'active' : '' }}" href="ui-utilities">Utilities</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                    aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <i class="uil-package"></i>
                    <span> Extended UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="extended-dragula.html">Dragula</a>
                        </li>
                        <li>
                            <a href="extended-range-slider.html">Range Slider</a>
                        </li>
                        <li>
                            <a href="extended-ratings.html">Ratings</a>
                        </li>
                        <li>
                            <a href="extended-scrollbar.html">Scrollbar</a>
                        </li>
                        <li>
                            <a href="extended-scrollspy.html">Scrollspy</a>
                        </li>
                        <li>
                            <a href="extended-treeview.html">Treeview</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="widgets.html" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Widgets </span>
                </a>
            </li> --}}

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons"
                    class="side-nav-link">
                    <i class="uil-streering"></i>
                    <span> Icons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="icons-remixicons.html">Remix Icons</a>
                        </li>
                        <li>
                            <a href="icons-mdi.html">Material Design</a>
                        </li>
                        <li>
                            <a href="icons-unicons.html">Unicons</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false"
                    aria-controls="sidebarCharts" class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false"
                                aria-controls="sidebarApexCharts">
                                <span> Apex Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarApexCharts">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="charts-apex-area.html">Area</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-bar.html">Bar</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-bubble.html">Bubble</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-candlestick.html">Candlestick</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-column.html">Column</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-heatmap.html">Heatmap</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-line.html">Line</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-mixed.html">Mixed</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-timeline.html">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-boxplot.html">Boxplot</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-treemap.html">Treemap</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-pie.html">Pie</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-radar.html">Radar</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-radialbar.html">RadialBar</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-scatter.html">Scatter</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-polar-area.html">Polar Area</a>
                                    </li>
                                    <li>
                                        <a href="charts-apex-sparklines.html">Sparklines</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarChartJSCharts" aria-expanded="false"
                                aria-controls="sidebarChartJSCharts">
                                <span> ChartJS </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarChartJSCharts">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="charts-chartjs-area.html">Area</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartjs-bar.html">Bar</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartjs-line.html">Line</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartjs-other.html">Other</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="charts-brite.html">Britecharts</a>
                        </li>
                        <li>
                            <a href="charts-sparkline.html">Sparklines</a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="uil-document-layout-center"></i>
                    <span> Forms </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="form-elements.html">Basic Elements</a>
                        </li>
                        <li>
                            <a href="form-advanced.html">Form Advanced</a>
                        </li>
                        <li>
                            <a href="form-validation.html">Validation</a>
                        </li>
                        <li>
                            <a href="form-wizard.html">Wizard</a>
                        </li>
                        <li>
                            <a href="form-fileuploads.html">File Uploads</a>
                        </li>
                        <li>
                            <a href="form-editors.html">Editors</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false"
                    aria-controls="sidebarTables" class="side-nav-link">
                    <i class="uil-table"></i>
                    <span> Tables </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="tables-basic.html">Basic Tables</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Data Tables</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps"
                    class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Maps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="maps-google.html">Google Maps</a>
                        </li>
                        <li>
                            <a href="maps-vector.html">Vector Maps</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                    aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                                aria-controls="sidebarSecondLevel">
                                <span> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                                aria-controls="sidebarThirdLevel">
                                <span> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false"
                                            aria-controls="sidebarFourthLevel">
                                            <span> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="side-nav-forth-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}


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
