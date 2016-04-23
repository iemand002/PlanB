@extends('layout.blank')
@section('pagetitle')
    {{trans('upload.file_manager')}}
    @endsection
@section('content')
    <div class="container-fluid">

        {{-- Top Bar --}}
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3 class="pull-left">{{trans('upload.uploads')}} </h3>
                <div class="pull-left">
                    <ul class="breadcrumb">
                        @foreach ($breadcrumbs as $path => $disp)
                            <?php $link = route('upload.picker') . "?folder=" . $path;
                            if (isset($_GET['CKEditor']))
                                $link .= "&CKEditor=my-editor&CKEditorFuncNum=0";
                            if (isset($_GET['id']))
                                $link .= "&id=" . $_GET['id'];
                            if (isset($_GET['count']))
                                $link .= "&count=" . $_GET['count'];
                            if (isset($_GET['add']))
                                $link .= "&add=true";
                            ?>
                            <li><a href="{{$link}}">{{ $disp }}</a></li>
                        @endforeach
                        <li class="active">{{ $folderName }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-right">
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

                @include('errors.list')
                @include('partials.success')

                <table id="uploads-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{trans('form.name')}}</th>
                        <th>{{trans('form.type')}}</th>
                        <th>{{trans('form.date')}}</th>
                        <th>{{trans('form.Size')}}</th>
                        <th data-sortable="false">{{trans('upload.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{-- The Subfolders --}}
                    @foreach ($subfolders as $path => $name)
                        <tr>
                            <td>
                                <?php $link = route('upload.picker') . "?folder=" . $path;
                                if (isset($_GET['CKEditor']))
                                    $link .= "&CKEditor=my-editor&CKEditorFuncNum=0";
                                if (isset($_GET['id']))
                                    $link .= "&id=" . $_GET['id'];
                                if (isset($_GET['count']))
                                    $link .= "&count=" . $_GET['count'];
                                if (isset($_GET['add']))
                                    $link .= "&add=true";
                                ?>
                                <a href="{{$link}}">
                                    <i class="fa fa-folder fa-lg fa-fw"></i>
                                    {{ $name }}
                                </a>
                            </td>
                            <td>{{trans('form.folder')}}</td>
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
                                <a href="javascript:useFile('{{ $file['name'] }}')">
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

    @include('admin.upload._modals')

@stop

@section('javascript')
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
            $("#uploads-table").DataTable();
        });

        function useFile(file) {
            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i');
                var match = window.location.search.match(reParam);
                return ( match && match.length > 1 ) ? match[1] : null;
            }

            if (window.opener || getUrlParam('CKEditor')) {

                var folder = (getUrlParam('folder') != null) ? getUrlParam('folder') + (getUrlParam('folder')==='/'?'':'/') : '/';
                if (getUrlParam('CKEditor')) {
                    // use CKEditor 3.0 + integration method
                    if (window.opener) {
                        // Popup
                        window.opener.CKEDITOR.tools.callFunction(getUrlParam('CKEditorFuncNum'), '/img'+folder+file);
                    } else {
                        // Modal (in iframe)
                        parent.CKEDITOR.tools.callFunction(getUrlParam('CKEditorFuncNum'), '/img'+folder+file);
                        parent.CKEDITOR.tools.callFunction(getUrlParam('CKEditorCleanUpFuncNum'));
                    }
                } else {
                    window.opener.document.getElementById(getUrlParam('id')).value = folder + file;
                    window.opener.document.getElementById(getUrlParam('id')).onchange();
                    if (getUrlParam('add')) {
                        window.opener.add_dummy(parseInt(getUrlParam('count')) + 1);
                    }
                }

                if (window.opener) {
                    window.close();
                }
            } else {
                $.prompt(lg.fck_select_integration);
            }

            window.close();
        }
    </script>
@stop