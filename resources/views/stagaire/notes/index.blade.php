@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
       <div class="text-center text-danger">{{ trans('global.note.title_singular') }}{{ trans('global.list') }}</div> 
       <div class="d-inline">
                <label id="niv">Niveau:</label>
                <select name="niv" for="niv">
                    <option value="1">1ére année</option>
                    <option value="1">2éme année</option>
                    <option value="1">3éme année</option>
                    <option value="1">4éme année</option>
                    <option value="1">5éme année</option>
                    <option value="1">6éme année</option>
                </select>
      </div>
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
                                {{ $stage->pivot->note }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection