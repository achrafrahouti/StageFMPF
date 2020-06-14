<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
           
             {{-- <div class="py-3 text-center">
                 <h3>{{Auth::user()->profile->etudiant->nom}}<br> {{Auth::user()->profile->etudiant->prenom}} </h3>
             </div> --}}
         
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{-- {{ trans('global.dashboard') }} --}}Tableau de bord
                </a>
            </li>
            @if ( Auth::user()->isAdmin())
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users-cog nav-icon">

                    </i>
                   {{--  {{ trans('global.userManagement.title') }} --}} Gestion utilisateurs
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
                            {{-- {{ trans('global.user.title') }} --}}Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.etudiants.index") }}" class="nav-link {{ request()->is('admin/etudiants') || request()->is('admin/etudiants/*') ? 'active' : '' }}">
                            <i class="fas fa-user-md nav-icon">

                            </i>
                           {{--  {{ trans('global.etudiant.title') }} --}}Stagaires
                        </a>
                    </li>
                </ul>
            </li>
            {{-- ooooo --}}
    <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                            <i class="fas fa-hospital nav-icon">

                            </i>
                           {{--  {{ trans('global.userManagement.title') }} --}} Gestion stages
                  </a>
    <ul class="nav-dropdown-items">
            
            <li class="nav-item">
                <a href="{{ route("admin.periodes.index") }}" class="nav-link {{ request()->is('admin/periodes') || request()->is('admin/periodes/*') ? 'active' : '' }}">
                    <i class="fas fa-calendar nav-icon">

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
                    <i class="fas fa-procedures nav-icon">

                    </i>
                    {{ trans('global.service.title') }}
                </a>
            </li>
            {{-- ssssssssssssssssss --}}
            {{-- aaaaaaaaaaaaa --}}
            <li class="nav-item">
                <a href="{{ route("admin.stages.index") }}" class="nav-link {{ request()->is('admin/stages') || request()->is('admin/stages/*') ? 'active' : '' }}">
                    <i class="fas fa-stethoscope nav-icon">

                    </i>
                    {{ trans('global.stage.title') }}
                </a>
            </li>
            {{--  --}}
            {{-- encadrants --}}
           {{--  <li class="nav-item">
                <a href="{{ route("admin.encadrants.index") }}" class="nav-link {{ request()->is('admin/encadrants') || request()->is('admin/encadrants/*') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon">

                    </i>
                     Encadrants
                </a>
            </li>
 --}}            {{-- end encadrants--}}
            {{-- secretaires --}}
           {{--  <li class="nav-item">
                <a href="{{ route("admin.secretaires.index") }}" class="nav-link {{ request()->is('admin/secretaires') || request()->is('admin/secretaires/*') ? 'active' : '' }}">
                    <i class="fas fa-user-edit nav-icon">

                    </i>
                    secretaires
                </a>
            </li> --}}
            {{-- end secretaires--}}
            <li class="nav-item">
                <a href="{{ route("affectation.choix") }}" class="nav-link {{ request()->is('stagaire/affectation') || request()->is('stagaire/affectation/*') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon">
                        
                    </i>
                    {{-- {{ trans('global.stage.title') }} --}}
                    Liste des Stagaires
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("stagaire.repartition.show") }}" class="nav-link {{ request()->is('stagaire/repartition') || request()->is('stagaire/repartition/*') ? 'active' : '' }}">
                    <i class="far fa-calendar-check nav-icon">

                    </i>
                    {{-- {{ trans('global.stage.title') }} --}}
                    Planning 
                </a>
            </li>            
            <li class="nav-item">
                <a href="{{ route("stagaire.repartition.synch") }}" class="nav-link {{ request()->is('stagaire/getStagaire') || request()->is('stagaire/getStagaires/*') ? 'active' : '' }}">
                    <i class="fas fa-sync-alt nav-icon">

                    </i>
                    {{-- {{ trans('global.stage.title') }} --}}
                    Répartition 
                </a>
            </li>
              <li class="nav-item">
                <a href="{{ route("notes.ajax") }}" class="nav-link {{ request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : '' }}">
                    <i class="fas fa-plus nav-icon">

                    </i>
                    {{-- {{ 'Saisir les '.trans('global.note.title') }} --}}Notes
                </a>
            </li>     
             </ul>
             {{--demandes--}}

              <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-file-alt nav-icon">

                    </i>
                    {{ trans('global.demande.title') }}
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.demandes.indexv") }}" class="nav-link {{ request()->is('admin/demande/demandeverifiees') || request()->is('admin/demande/demandeverifiees/*') ? 'active' : '' }}">
                            <i class="fas fa-check nav-icon">

                            </i>
                            {{-- {{ trans('global.demande.title') }} --}} verifiées
                        </a>
                    </li>
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.demandes.index") }}" class="nav-link {{ request()->is('admin/demandes') || request()->is('admin/demandes/*') ? 'active' : '' }}">
                            <i class="fas fa-eye-slash nav-icon">

                            </i>
                            {{-- {{ trans('global.demande.title') }} --}}non  verifiées
                        </a>
                    </li>
                </ul>
            </li>    
           
      
            @endif
           
            {{-- etudaints --}}
            @if (Auth::user()->isEtudiant())
            <li class="nav-item">
                <a href="{{ route("stagaire.notes.index") }}" class="nav-link {{ request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : '' }}">
                    <i class="fas fa-chalkboard-teacher nav-icon">

                    </i>
                    {{ trans('global.note.title') }}
                </a>
            </li>
             {{--demandes--}}
            <li class="nav-item">
                <a href="{{ route("stagaire.demandes.index") }}" class="nav-link {{ request()->is('stagaire/demandes') || request()->is('stagaire/demandes/*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt nav-icon">

                    </i>
                    {{ trans('global.demande.title') }}
                </a>
            </li>
            @endif
            {{-- ssssssssssssssssss --}}
            @if (Auth::user()->isSecretaire())
                
            
            <li class="nav-item">
                <a href="{{ route("notes.ajax") }}" class="nav-link {{ request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : '' }}">
                    <i class="fas fa-plus nav-icon">

                    </i>
                    {{-- {{ 'Saisir les '.trans('global.note.title') }} --}} Insertion notes
                </a>
            </li>
            @endif
            {{-- ssssssssssssssssss --}}
                        {{-- ssssssssssssssssss --}}
                        @if (Auth::user()->isEncadrant())
                
            
                        <li class="nav-item">
                            <a href="{{ route("notes.ajax") }}" class="nav-link {{ request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : '' }}">
                                <i class="fas fa-cubes nav-icon">
            
                                </i>
                                {{ 'Verification des '.trans('global.note.title') }}
                            </a>
                        </li>
                        @endif
                        {{-- ssssssssssssssssss --}}
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{-- {{ trans('global.logout') }} --}}Deconnexion
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