@extends('layout.main')
@section('pagetitle')
    {{trans('upload.file_manager')}}
@endsection
@section('content')
    <div class="container-fluid">

        {{-- Top Bar --}}
        <div class="row page-title-row">
            <div class="col-xs-6">
                <h3 class="pull-left">{{trans('upload.uploads')}}  </h3>
                <div class="pull-left">
                    <div class="breadcrumbs" aria-label="breadcrumbs">

                        @foreach ($breadcrumbs as $path => $disp)
                            <ol>
                                <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a>
                                    @endforeach
                                    <ol>
                                        <li class="is-current">{{ $folderName }}</li>
                                    </ol>
                                    @foreach($breadcrumbs as $path)
                                </li>
                            </ol>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-6 text-right">
                <button type="button" class="btn btn-success btn-md"
                        data-toggle="modal" data-target="#modal-folder-create">
                    <i class="fa fa-plus-circle"></i> {{trans('upload.new_folder')}}
                </button>
                <button type="button" class="btn btn-primary btn-md"
                        data-toggle="modal" data-target="#modal-file-upload">
                    <i class="fa fa-upload"></i> {{trans('upload.upload')}}
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <div class="table-responsive">
                    <table id="uploads-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>{{trans('upload.name')}}</th>
                            <th>{{trans('upload.type')}}</th>
                            <th>{{trans('upload.date')}}</th>
                            <th>{{trans('upload.Size')}}</th>
                            <th data-sortable="false">{{trans('upload.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{-- The Subfolders --}}
                        @foreach ($subfolders as $path => $name)
                            <tr>
                                <td>
                                    <a href="/admin/upload?folder={{ $path }}">
                                        <i class="fa fa-folder fa-lg fa-fw"></i>
                                        {{ $name }}
                                    </a>
                                </td>
                                <td>{{trans('upload.folder')}}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-danger"
                                            onclick="delete_folder('{{ $name }}')">
                                        <i class="fa fa-times-circle fa-lg"></i>
                                        {{trans('common.delete')}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        {{-- The Files --}}
                        @foreach ($files as $file)
                            <tr>
                                <td>
                                    <a href="{{ $file['webPath'] }}">
                                        @if (is_image($file['mimeType']))
                                            <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                        @else
                                            <i class="fa fa-file-o fa-lg fa-fw"></i>
                                        @endif
                                        {{ $file['name'] }}
                                    </a>
                                </td>
                                <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                                <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
                                <td>{{ human_filesize($file['size']) }}</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-danger"
                                            onclick="delete_file('{{ $file['name'] }}')">
                                        <i class="fa fa-times-circle fa-lg"></i>
                                        {{trans('common.delete')}}
                                    </button>
                                    @if (is_image($file['mimeType']))
                                        <button type="button" class="btn btn-xs btn-success"
                                                onclick="preview_image('{{ $file['webPath'] }}')">
                                            <i class="fa fa-eye fa-lg"></i>
                                            {{trans('upload.preview')}}
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @include('admin.upload._modals')

@stop

@section('js')
    <script>

        // Confirm file delete
        function delete_file(name) {
            $("#delete-file-name1").html(name);
            $("#delete-file-name2").val(name);
            $("#modal-file-delete").modal("show");
        }

        // Confirm folder delete
        function delete_folder(name) {
            $("#delete-folder-name1").html(name);
            $("#delete-folder-name2").val(name);
            $("#modal-folder-delete").modal("show");
        }

        // Preview image
        function preview_image(path) {
            $("#preview-image").attr("src", path);
            $("#modal-image-view").modal("show");
        }

        // Startup code
        $(function () {
            $("#uploads-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });

    </script>
@stop