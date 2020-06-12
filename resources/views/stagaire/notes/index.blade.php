@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
       <div class=" display-5 badge badge-dark">{{ trans('global.note.title_singular') }}{{ trans('global.list') }}</div> 
      {{--  <div class="text-center">
                <label id="niv" class="text-center text-bold" onchange="showCustomer(this.value)">Niveau:</label>
                <select name="niv" for="niv" class="select select-control">
                    <option value="1">1ére année</option>
                    <option value="2">2éme année</option>
                    <option value="3">3éme année</option>
                    <option value="4">4éme année</option>
                    <option value="5">5éme année</option>
                    <option value="6">6éme année</option>
                </select>
      </div> --}}
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
<script>

</script>
@endsection