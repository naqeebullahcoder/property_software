@extends('layouts.admin')
@section('content')
    @can('faculty_resource_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.faculty-members.create") }}">
                    Add Faculty Member
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Faculty Members
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.product.fields.name') }}
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Department
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($faculty_resources != null)

                    @foreach($faculty_resources as $key => $faculty_resource)
                        <tr data-entry-id="{{ $faculty_resource->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $faculty_resource->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $faculty_resource->user->email ?? '' }}
                            </td>
                            <td>
                                @if($faculty_resource->faculty_member_type_id!=null)
                                {{App\FacultyMemberTypes::find($faculty_resource->faculty_member_type_id)->name}}
                                @endif
                            </td>
                            <td>
                                {{ $faculty_resource->department->name?? '' }}
                            </td>
                            <td>
                                @can('faculty_resource_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.faculty-members.show',$faculty_resource->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('faculty_resource_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.faculty-members.edit', $faculty_resource->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('faculty_resource_delete')
                                    <form action="{{ route('admin.faculty-members.destroy', $faculty_resource->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $(function () {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.products.massDestroy') }}",
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('product_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
@endsection
@endsection
