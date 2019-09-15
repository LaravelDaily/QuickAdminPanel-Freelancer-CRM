@extends('layouts.admin')
@section('content')
@can('note_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.notes.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.note.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.note.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Note">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.note.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.note.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.note.fields.note_text') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notes as $key => $note)
                        <tr data-entry-id="{{ $note->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $note->id ?? '' }}
                            </td>
                            <td>
                                {{ $note->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $note->note_text ?? '' }}
                            </td>
                            <td>
                                @can('note_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.notes.show', $note->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('note_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.notes.edit', $note->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('note_delete')
                                    <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('note_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.notes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Note:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection