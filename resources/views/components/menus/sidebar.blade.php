<div class="ui vertical menu icon">
    <a class="item {{ (request()->is('/')) ? 'active' : ''}}" href="{{ route('dashboard') }}">
        Dashboard <i class="icon home"></i>
    </a>
    <a class="item {{ (request()->is('lawyer/areas*')) ? 'active' : ''}}" href="{{ url('/lawyer/areas') }}">
        <i class="icon align left"></i>Áreas
    </a>
    <a class="item {{ (request()->is('lawyer/entities*')) ? 'active' : ''}}" href="{{ url('/lawyer/entities') }}">
        <i class="icon building"></i>Entidades
    </a>
    <a class="item {{ (request()->is('lawyer/processes*')) ? 'active' : ''}}" href="{{ url('/lawyer') }}">
        <i class="icon folder"></i>Processos
    </a>
    <div class="ui dropdown item">
        <i class="dropdown icon"></i>
        Cadastro
        <div class="menu">
            <a class="item" href="{{ route('personas.index') }}"><i class="icon male"></i>Pessoas</a>
            <a class="item" href="{{ route('areas.index') }}"><i class="icon file"></i>Áreas</a>
            <a class="item" href="{{ route('kinds.index') }}"><i class="icon file"></i>Classes</a>
            <a class="item" href="{{ route('entities.index') }}"><i class="icon building"></i>Entidades</a>
        </div>
    </div>
    <div class="ui dropdown item">
        <i class="dropdown icon"></i>
        Controle Acesso
        <div class="menu">
            <a class="item {{ (request()->is('users*')) ? 'active' : ''}}" href="{{ route('users.index') }}">
                <i class="icon users"></i>Usuários
            </a>
            <a class="item"><i class="icon user circle"></i>Perfil</a>
            <a class="item"><i class="fas fa-users"></i><span> Regras</span></a>
            <a class="item"><i class="fas fa-lock"></i><span> Permissões</span></a>
        </div>
    </div>
</div>
