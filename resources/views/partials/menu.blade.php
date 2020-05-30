<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @if ( Auth::user()->isAdmin())
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users-cog nav-icon">

                    </i>
                    {{ trans('global.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    {{-- <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.role.title') }}
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.user.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- ooooo --}}
            
            <li class="nav-item">
                <a href="{{ route("admin.periodes.index") }}" class="nav-link {{ request()->is('admin/periodes') || request()->is('admin/periodes/*') ? 'active' : '' }}">
                    <i class="fas fa-cogs nav-icon">

                    </i>
                    {{ trans('global.periode.title') }}
                </a>
            </li>
            {{-- oooooo --}}
            <li class="nav-item">
                <a href="{{ route("admin.groupes.index") }}" class="nav-link {{ request()->is('admin/groupes') || request()->is('admin/groupes/*') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.groupe.title') }}
                </a>
            </li>
            {{-- aaaaaaaaaaaaa --}}
            <li class="nav-item">
                <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                    <i class="fas fa-stethoscope nav-icon">

                    </i>
                    {{ trans('global.service.title') }}
                </a>
            </li>
            {{-- ssssssssssssssssss --}}
            {{-- aaaaaaaaaaaaa --}}
            <li class="nav-item">
                <a href="{{ route("admin.stages.index") }}" class="nav-link {{ request()->is('admin/stages') || request()->is('admin/stages/*') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon">

                    </i>
                    {{ trans('global.stage.title') }}
                </a>
            </li>
            {{-- ------------------ --}}
            <li class="nav-item">
                <a href="{{ route("stagaire.affictation.index") }}" class="nav-link {{ request()->is('stagaire/affictation') || request()->is('stagaire/affictation/*') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon">

                    </i>
                    {{-- {{ trans('global.stage.title') }} --}}
                    Affictation
                </a>
            </li>
            @endif
            {{-- ssssssssssssssssss --}}
            @if (Auth::user()->isEtudiant())
            <li class="nav-item">
                <a href="{{ route("stagaire.notes.index") }}" class="nav-link {{ request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon">

                    </i>
                    {{ trans('global.note.title') }}
                </a>
            </li>
            @endif
            {{-- ssssssssssssssssss --}}
            @if (Auth::user()->isAdmin() || Auth::user()->isSecretaire())
                
            
            <li class="nav-item">
                <a href="{{ route("stagaire.notes.choix") }}" class="nav-link {{ request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon">

                    </i>
                    {{ 'Saisir les '.trans('global.note.title') }}
                </a>
            </li>
            @endif
            {{-- ssssssssssssssssss --}}
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
            
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>