<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->avatar_url }}" class="user-image rounded-circle shadow"
                        alt="User Image" />
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <img src="{{ auth()->user()->avatar_url }}" class="rounded-circle shadow" alt="User Image" />
                        <p>
                            {{ auth()->user()->name }}
                        </p>
                    </li>
                    <li class="px-3 py-2">
                        <form action="{{ route('users.avatar', auth()->user()) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="file" name="avatar"
                                class="form-control form-control-sm mb-2 @error('avatar') is-invalid @enderror"
                                accept="image/*" required>

                            @error('avatar')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button class="btn btn-primary btn-sm w-100">
                                Atualizar foto
                            </button>
                        </form>
                    </li>
                    <li class="user-footer">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger float-end">Logout</button>
                        </form>
                        <a href="#" class="btn btn-outline-secondary">Profile</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
