@extends('layouts.admin')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@section('content')
@can('update', Model::class)
    
@endcan
    <div class="row">
        <div class="col-lg-12">
            @if (Auth::user()->isEtudiant())
            @php
                        $user=Auth::user()->profile;
                        $groupe=$user->groupe;
                        $stages=$groupe->stages;
            @endphp
            <div class="card">
                <div class="card-header">
                   <h4 class="text-primary"> Profile</h4>
                </div>   
                <div class="card-body">
                    <h4 class="text-info">Information Personnele</h4>
                    <ul class="list-group-horizontal">
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-id-card nav-icon">{{ ' CNE    :' }} {{ Auth::user()->profile->etudiant->cne }}</h4></li>
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-portrait nav-icon">{{ ' Nom    :' }} {{ Auth::user()->profile->etudiant->nom }}</h4></li>
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-portrait nav-icon">{{ ' Prenom :' }} {{ Auth::user()->profile->etudiant->prenom }}</h4></li>
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-clone nav-icon">{{ ' Groupe :' }} {{ Auth::user()->profile->groupe->groupe_tot.'.'.Auth::user()->profile->groupe->groupe_sgh }}</h4></li>
                    </ul>
                    <h4 class="text-info">{{ trans('global.cursus.title') }}</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">
                                        
                                    </th>  
                                    <th>
                                        {{ trans('global.stage.title_singular') }}
                                    </th>  
                                    <th>
                                        {{ trans('global.periode.title_singular') }}
                                    </th>
                                    <th>
                                        {{ trans('global.periode.fields.date_debut') }}
                                    </th>
                                    <th>
                                        {{ trans('global.periode.fields.date_fin') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>    
                            </thead> 
                            <tbody>
                                @foreach ($stages   as $stage)
                                <tr data-entry-id="{{ $stage->id }}">
                                    @php
                                            $periode_id=$stage->pivot->periode_id ;
                                           $periode=App\Periode::find($periode_id);
                                    @endphp
                                    <td>
                        
                                    </td>
                                    <td>
                                        {{ $stage->name ?? ''}}
                                    </td>
                                    <td>
                                        {{ $periode->name ?? ''}}
                                    </td>
                                    <td>
                                        {{ $periode->date_debut ?? '' }}
                                    </td>
                                    <td>
                                        {{ $periode->date_fin ?? '' }}
                                    </td>
                                    <td>
                            
                                    </td>        
                                 </tr>
                                @endforeach
                            </tbody>   
                        </table>    
                    </div>    
                </div> 
            </div> 
            @elseif(Auth::user()->isAdmin())
            
                   <p class="font-weight-bold">Bienvenue retour {{Auth::user()->name}}</p>
                 
                 
                 {{--  start card deck --}}
                <div class="card-columns">
                          <div class="card bg-primary">
                            <div class="card-body text-center">
                                <div class="fa fa-user-md fa-2x "></div>
                              <p class="card-text">Nombre totales des etudiants  <span class="badge badge-light">{{$stagaire->count()}}</span></p>
                            </div>
                          </div>
                          <div class="card bg-warning">
                             <div class="card-body text-center">
                                <div class="fas fa-briefcase-medical fa-2x "></div>
                            <p class="card-text">Nombre totales des encadrants  <span class="badge badge-light">30</span></p>
                            </div>
                          </div>
                          <div class="card bg-success">
                           <div class="card-body text-center">
                            <div class="fas fa-user-edit md fa-2x"></div>
                            <p class="card-text">Nombre totales des secretaires  <span class="badge badge-light">30</span></p>
                            </div>
                          </div>
                          <div class="card bg-danger">
                          <div class="card-body text-center">
                            <div class="fas fa-microscope fa-2x"></div>
                           <p class="card-text">Nombre totales des services d'accueil  <span class="badge badge-light">{{$service->count()}}</span></p>
                            </div>
                          </div>
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <div class="fas fa-file-medical-alt fa-2x"></div>
                                   <p class="card-text">Nombre totales des stages <span class="badge badge-dark">{{$stage->count()}}</span></p>
                                </div>
                          </div>
                          <div class="card bg-info">
                            <div class="card-body text-center">
                                <div class="fa far fa-hospital fa-2x "></div>
                                   <p class="card-text">Nombre totales des lieu de stages <span class="badge badge-light">30</span></p>
                             </div>
                          </div>
                 </div>
                  {{-- end card deck --}}
                  {{-- start chart  --}}
                <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                    var ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['1ére année', '2éme année', '3éme année', '4éme année', '5éme année', '6éme année'],
                            datasets: [{
                                label: 'Taux de Réussite',                                  
                                /*here data from database*/
                                data: [12, 19, 3, 5, 2, 3],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    </script>
                  {{-- end chart --}}

            @else
                home
            @endif
        </div>
    </div>
@endsection
@section('scripts')
@parent

@endsection