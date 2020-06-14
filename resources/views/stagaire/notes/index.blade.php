@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
       <div class="text-center text-danger">{{ trans('global.note.title_singular') }}{{ trans('global.list') }}</div> 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.note.fields.stage') }}
                        </th>
                        <th>
                            {{ trans('global.note.fields.note') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->profile->stages as $stage)
                        <tr data-entry-id="{{$stage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stage->name ?? '' }}
                            </td>
                            <td>
                            @if ($stage->pivot->verify)
                            {{ $stage->pivot->note }}

                            @endif
                            </td>
                            <td>
                                @if ($stage->pivot->verify && $stage->pivot->note>=10)
                                                                    <em class="btn btn-light"><a href="{{ route('stagaire.attestation.print',$stage->id) }}">Download Atestation </a></em>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection