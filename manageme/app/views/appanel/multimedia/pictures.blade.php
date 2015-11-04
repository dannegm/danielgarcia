@extends('appanel/template')

@section('breadcrumb')
    <li><a href="{{route('appanel')}}">Inicio</a></li>
    <li class="active">Imágenes</li>
@stop

@section('styles-oneui')
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/magnific-popup/magnific-popup.min.css')}}">
@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.1.3/mustache.min.js"></script>
    <script src="{{URL::asset('/oneui/js/plugins/magnific-popup/magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/dnn.upload.js')}}"></script>
    <script>
    $(function () {
        App.initHelpers('magnific-popup');

        // Crear
        var pictureAPI = "{{route('appanel.picture.upload')}}";
        var options_pic = {
            url: pictureAPI,
            filename: 'file',
            group: 'General',
            maxSize: 8 * 1024 * 1024,
            maxWidth: 2048,
            start: function () {
            },
            process: function (picture) {
                $('#progress_pic').show();
            },
            error: function (error) {
                $('#error_txt_pic').text(error.message);
                $('#error_pic').fadeIn();
            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(p) {
                    var percentComplete = p.loaded / p.total;
                    var percent = parseFloat(Math.round((percentComplete * 100)));
                    $('#progressbar_pic').css({
                        'width': percent + '%'
                    });
                }, false);
                return xhr;
            },
            success: function (response) {
                $('#progress_pic').hide();
                $('#img_pic').css({
                    'background-image': 'url(' + response.pic + ')'
                });

                var template = $('#tmp-picture').html();
                Mustache.parse(template);
                var rendered = Mustache.render(template, response);
                $('#pictures-container').prepend(rendered);

                $('#modal-addPicture').modal('hide');
            }
        };
        $('#picker_pic').on('click', function (e) {
            e.preventDefault();
            $('#file_pic').trigger('click');
        });
        $(document).on('click', '.add-picture', function (e) {
            e.preventDefault();
            $('#modal-addPicture').modal('show');
            $('#error_picture').hide();
        });

        $('#file_pic').on('change', function (e) {
            e.preventDefault();
            options_pic.files = this.files;
            upload( options_pic );
        });

        // Eliminar
        $(document).on('click', '.trash-picture', function (e) {
            e.preventDefault();
            var uid = $(this).data('uid');
            $('#error_dpicture').hide();
            $('#doDeletePicture').data('uid', uid);
            $('#modal-deletePicture').modal('show');
        });

        $(document).on('click', '#doDeletePicture', function () {
            var uid =  $(this).data('uid');
            $.post("{{route('appanel.picture.destroy')}}", { 'uid': uid }, function (res) {
                if (res.status != 'success') {
                    $('#error_txt_dpicture').text(res.error);
                    $('#error_dpicture').fadeIn();
                } else {
                    $('#modal-deletePicture').modal('hide');
                    $('#p' + uid ).remove();
                }
            })
            .fail( function (res) {
                console.log(res);
            });
        });
    });
    </script>
@stop

@section('content')
    <script id="tmp-picture" type="x-tmpl-mustache">
        <div id="p@{{id}}" class="col-sm-6 col-md-4 col-lg-3 push-20 animated fadeIn">
            <div class="img-container" style="height: 140px; background-color: #444; background-image: url({{URL::asset('/pictures/thumb')}}/@{{url}}); background-size: cover; background-position: center;">
                <div class="img-options">
                    <div class="img-options-content">
                        <a class="btn btn-sm btn-default img-lightbox" href="{{URL::asset('/pictures')}}/@{{url}}">
                            <i class="fa fa-search-plus"></i> Expandir
                        </a>
                        <button class="btn btn-sm btn-default trash-picture" data-uid="@{{id}}">
                            <i class="fa fa-times"></i> Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <div class="content">
    	<div class="btn-group">
    		<button class="btn btn-default add-picture" type="button">Subir imagen</button>
    	</div>
    </div>

    <div class="content">
    	<div class="row items-push js-gallery-advanced" id="pictures-container">

    	@foreach($pictures as $picture)

            <div id="p{{$picture->uid}}" class="col-sm-6 col-md-4 col-lg-3 animated fadeIn">
                <div class="img-container" style="height: 140px; background-color: #444; background-image: url({{URL::asset('/pictures/thumb/' . $picture->url)}}); background-size: cover; background-position: center;">
                    <div class="img-options">
                        <div class="img-options-content">
                            <a class="btn btn-sm btn-default img-lightbox" href="{{URL::asset('/pictures/' . $picture->url)}}">
                                <i class="fa fa-search-plus"></i> Expandir
                            </a>
                            <button class="btn btn-sm btn-default trash-picture" data-uid="{{$picture->uid}}">
                                <i class="fa fa-times"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        <div class="col-xs-12">
            <div class="pagination">{{$pictures->links()}}</div>
        </div>

    	</div>
    </div>
@stop

@section('modals')
    <div class="modal" id="modal-addPicture" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Subir imagen</h3>
                    </div>
                    <div class="block-content block-content-full">

                            <div class="form-group pull-t pull-r-l pull-b">
                                <div id="img_pic" class="img-container" style="height: 150px; background: #444 center no-repeat; background-size: cover;">
                                    <div class="img-options" style="opacity: 1;">
                                        <div class="img-options-content">
                                            <h4 class="h6 font-w400 text-white-op push-15">Selecciona una imagen</h4>
                                            <button type="button" id="picker_pic" class="btn btn-sm btn-default"><i class="si si-magnifier"></i> Buscar imagen</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="progress_pic" class="progress progress-mini animated fadeIn slideInDown" style="display: none;">
                                    <div id="progressbar_pic" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <input type="file" id="file_pic" name="file_pic" style="display: none;" />

                                <div id="error_pic" class="alert alert-danger alert-dismissable" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h3 class="font-w300 push-15">Error</h3>
                                    <p id="error_txt_pic"></p>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-deletePicture" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-danger">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Eliminar imagen</h3>
                    </div>
                    <div class="block-content">
                        <p>¿Estás seguro de querer eliminar esta imagen?</p>
                        <div id="error_dpicture" class="alert alert-danger alert-dismissable" style="display: none;">
                            <h3 class="font-w300 push-15">Error</h3>
                            <p id="error_txt_dpicture"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-sm btn-danger" type="button" id="doDeletePicture">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
@stop