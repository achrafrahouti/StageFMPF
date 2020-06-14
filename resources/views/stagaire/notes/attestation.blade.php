<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <style>
        body{
            background-color: white !important;
        }
        ul{
            list-style: none;
        }
    </style>
</head>
<body>
    <center><img src="storage/img/fmpf.png" alt="" width="100" height="100">
        <img src="storage/img/usmba.png" width="100" height="100" class="img-fluid center-image " >

       <strong> <u><br><u> Fiche de Validation <br>de stage de l’étudiant</center></u></u></strong>
       <div class="container-md pl-3">
       <div class="p-lg-5">
            <hr><hr>
 
            <ul>
                <li class="py-2 pl-5"> Nom et Prénom  : {{ $stagaire->etudiant->nom. '  '  }}{{ $stagaire->etudiant->prenom  }}</li>
                <li class="py-2 pl-5"> CNE            : {{ $stagaire->etudiant->cne  }}</li>
                <li class="py-2 pl-5"> Niveau d’étude: {{ $stagaire->etudiant->niveau->liblle  }}</li>
                
            </ul>

            @php
            $s_g_p=\DB::table('stage_groupe_periode')->select('periode_id')->where('stage_id',$stage->id)->where('groupe_id',$stagaire->groupe_id)->first();
            $periode=App\Periode::find($s_g_p->periode_id);
            $pivot=DB::table('notes')->where('stage_id',$stage->id)->where('stagaire_id',$stagaire->id)->first();
             @endphp

            <div class="pl-5">

            
            <ul>
                 <li class="py-2 pl-xl-5"> Service de stage : {{ $stage->service->name }}</li>
                 <li class="py-2 pl-xl-5 ">Période :  {{ $periode->name }}</li> 
                 <li class="py-2 pl-xl-5"> Année universitaire : 2019/2020</li>
         </ul></div>
    </div>


        <div class="container-sm pl-lg-5">
        <table class="table-bordered">
            <tbody>
            <tr>
                <th>
                   <strong>Présence</strong> <br>(à noter que plus que 2 absences
                   invalident le stage)
                </th>
                <td>
                       <div class="badge badge-info">{{ $pivot->presence }}/3</div> 
                </td>
            </tr>
            <tr>
                <th>
                    Motivation
                </th>
                <td>
                 <div class="badge badge-info">{{ $pivot->motivation }}/3 </div>  
                </td>
            </tr>
            <tr>
                <th>
                    Assiduité
                </th>
                <td>
                    <div class="badge badge-info"> {{ $pivot->Assiduite }}/3</div> 
                </td>
            </tr>
            <tr>
                <th>
                    Intégration de l’équipe
                </th>
                <td>
                    <div class="badge badge-info"> {{ $pivot->integration }}/3</div> 
                </td>
            </tr>
            <tr>
                <th>
                    Evaluation des connaissances
                </th>
                <td>
                    <div class="badge badge-info">{{ $pivot->connaissance }}/8 </div> 
                </td>
            </tr>
            <tr>
                <th>
                    Total
                </th>
                <td>
                    <div class="badge badge-info"> {{ $pivot->Note }}/20</div> 
                </td>
            </tr>
        </tbody>
        </table>
        <div class="btn-group" data-toggle="buttons">
           
            @if ($pivot->Note>=10)
             <label class="btn btn-success active"> Valider</label>

            @endif
            @if ($pivot->Note<10)
                <label class="btn btn-danger"> Non Valider</label>

            @endif
            <div class="float-right py-xl-5">{{ 'Signature du:'.$stage->service->encadrant->nom.' '.$stage->service->encadrant->prenom }}</div>
        </div>
    </div>
    </div>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>