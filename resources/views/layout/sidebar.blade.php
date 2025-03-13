<div class="sidebar-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="Dashlogo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
        </div>
        <ul class="nav flex-column">
            <div class="First_sec">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-table-columns"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}"
                        class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                        <i class="fa-regular fa-address-book"></i> <span>Client Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cases.index') }}"
                        class="nav-link {{ request()->routeIs('cases.*') ? 'active' : '' }}"><i
                            class="fa-regular fa-address-book"></i>
                        <span>Case Management</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('attorneys.index') }}"
                     class="nav-link {{ request()->routeIs('attorneys.*') ? 'active' : '' }}"
                    ><i class="fa-regular fa-file"></i>
                        <span>Attorneys</span></a>
                </li>
                {{-- <li class="">
                    <a href="#"><i class="fa-regular fa-address-book"></i>
                        <span>Contacts</span>
                    </a>
                </li> --}}
                <li class="nav-item"><a href="{{ route('calender.index') }}"
                     class="nav-link {{ request()->routeIs('calender.index') ? 'active' : '' }}"
                    ><i class="fa-regular fa-calendar-days"></i>
                        <span>Calender</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-regular fa-file"></i>
                        <span>
                            Document Generation
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-layer-group"></i>
                        <span>
                            Report
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                    ><i class="fa-solid fa-users"></i><span>
                            User Management
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-gear"></i><span>
                            Settings
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-shield"></i><span>
                            Backup & Security
                        </span>
                    </a>
                </li>
                {{-- <li class=""><a href="#"><i class="fa-solid fa-briefcase"></i>
                        <span>Time Entries</span></a>
                </li>
                <li class=""><a href="#"><i class="fa-solid fa-wallet"></i>
                        <span>Billing</span></a>
                </li>
                <li class="">
                    <a href="#"><i class="fa-solid fa-envelope"></i>
                        <span>
                            Payment
                        </span>
                    </a>
                </li> --}}



            </div>
        </ul>
        <div class="usersss">
            <ul>
                <h5>Insights</h5>
                <li><a href="#"><i class="fa-regular fa-envelope"></i>
                    </a><span>Newsletter</span></li>
                <li><a href="#">
                        <i class="fa-regular fa-bell"></i>
                    </a><span>Notifications</span></li>
                <div class="profile">

                    <a href="#">
                        <img src="{{ asset('assets/img/account.png') }} " alt="profile pic">
                    </a>

                    <span>
                        <a href="#" id="logout-link">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <script>
                        document.getElementById('logout-link').addEventListener('click', function(e) {
                            e.preventDefault();
                            document.getElementById('logout-form').submit();
                        });
                    </script>
                </div>
            </ul>
        </div>
    </div>
</div>
