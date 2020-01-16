<ul class="nav nav-pills flex-column bg-light shadow-sm border-top">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? 'active' : ''}}" href="{{ route('dashboard') }}">
            <i class="fas fa-project-diagram"></i>
            <span class="d-inline-block">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('users*')) ? 'active' : ''}}" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span class="d-inline-block">Usuários</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('lawyer*')) ? 'active' : ''}}" href="{{ url('/lawyer') }}">
            <i class="fas fa-folder-open"></i>
            <span class="d-inline-block">Processos</span>
        </a>
    </li>
</ul>
