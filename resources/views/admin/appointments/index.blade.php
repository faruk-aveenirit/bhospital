@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4>All Registrations</h4>
            @can('appointment_create')
                <a class="btn btn-success btn-lg px-5" href="{{ route('admin.appointments.create') }}">
                    Add
                </a>
            @endcan
        </div>
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Appointment">
            <thead>
                <tr>
                    <th width="2">

                    </th>
                    <th width="3">
                        {{ trans('cruds.appointment.fields.id') }}
                    </th>
                    <th width="15">
                        {{ trans('cruds.appointment.fields.name') }}
                    </th>
                    <th width="15">
                        {{ trans('cruds.appointment.fields.email') }}
                    </th>
                    <th width="15">
                        {{ trans('cruds.appointment.fields.doctor') }}
                    </th>
                    <th width="10">
                        {{ trans('cruds.appointment.fields.passport_number') }}
                    </th>
                    <th width="12">
                        {{ trans('cruds.appointment.fields.phone') }}
                    </th>
                    <th width="10">
                        {{ trans('cruds.appointment.fields.date') }}
                    </th>
                    <th width="5">
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td width="2">
                    </td>
                    <td width="3">

                    </td>
                    <td width="15">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td width="15">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td width="15">
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Appointment::DOCTOR_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="10">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td width="10">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td width="10">
                    </td>
                    <td width="5">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('appointment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.appointments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.appointments.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id', sorting:false, ordering:false,sortable:false, searchable:false },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'doctor', name: 'doctor' },
        { data: 'passport_number', name: 'passport_number' },
        { data: 'phone', name: 'phone' },
        { data: 'created_at', name: 'created_at' },
        { data: 'actions', }
    ],
    orderCellsTop: true,
    order: [[ 7, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Appointment').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection
