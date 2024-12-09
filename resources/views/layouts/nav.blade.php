@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand px-4 py-3 shadow-sm">
    <h3 class="fw-bold fs-4 ms-3">{{$pageTitle}}</h3>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">

                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="{{Vite::asset('resources/images/icons/3135715.png')}}" class="avatar img-fluid" alt="tes">
                </a>
                <div class="dropdown-menu dropdown-menu-end rounded">
                    <ul>
                        <a href="#">
                            <li class="py-2">Profile</li>
                        </a>
                        <a href="#">
                            <li class="py-2">Logout</li>
                        </a>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>