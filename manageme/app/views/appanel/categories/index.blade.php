@extends('appanel/template')

@section('breadcrumb')
    <li><a href="{{route('appanel')}}">Inicio</a></li>
    <li class="active">Categorías</li>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.1.3/mustache.min.js"></script>
    <script>
    $(function () {
        @if(Auth::user()->permissions()->categories->create)
            // Crear
            $(document).on('click', '.add-category', function (e) {
                e.preventDefault();
                $('#modal-addCateory').modal('show');
                $('#error_category').hide();
            });

            $(document).on('click', '#doCreateCategory', function () {
                $.post("{{route('appanel.categories.store')}}", { 'name': $('#c_name').val() }, function (res) {
                    if (res.status != 'success') {
                        $('#error_txt_category').text(res.error);
                        $('#error_category').fadeIn();
                    } else {
                        var template = $('#tmp-category').html();
                        Mustache.parse(template);
                        var rendered = Mustache.render(template, res.category);
                        $('#modal-addCateory').modal('hide');
                        $('#categories-container').prepend(rendered);
                    }
                });
            });
        @endif

        @if(Auth::user()->permissions()->categories->create)
            // Editar
            $(document).on('click', '.edit-category', function (e) {
                e.preventDefault();
                var uid = $(this).data('uid');
                var name = $(this).data('name');

                $('#error_ucategory').hide();

                $('#c_n_name').val(name);
                $('#doUpdateCategory').data('uid', uid);
                $('#modal-editCateory').modal('show');
                $('.block[data-uid="' + uid + '"]').removeClass('animated tada');
            });

            $(document).on('click', '#doUpdateCategory', function () {
                var uid =  $(this).data('uid');
                var name = $('#c_n_name').val();

                $.post("{{route('appanel.categories.update')}}", { 'uid': uid, 'name': name }, function (res) {
                    if (res.status != 'success') {
                        $('#error_txt_ucategory').text(res.error);
                        $('#error_ucategory').fadeIn();
                    } else {
                        $('#modal-editCateory').modal('hide');
                        $('.block-title[data-uid="' + uid + '"]').text(name);
                        $('[data-uid="' + uid + '"]').data('name', name);

                        $('.block[data-uid="' + uid + '"]').addClass('animated tada');
                    }
                });
            });
        @endif

        @if(Auth::user()->permissions()->categories->delete)
            // Eliminar
            $(document).on('click', '.trash-category', function (e) {
                e.preventDefault();
                var uid = $(this).data('uid');
                var name = $(this).data('name');
                $('#error_dcategory').hide();
                $('#d_name').text(name);
                $('#doDeleteCategory').data('uid', uid);
                $('#modal-deleteCateory').modal('show');
            });

            $(document).on('click', '#doDeleteCategory', function () {
                var uid =  $(this).data('uid');
                var name = $('#c_n_name').val();

                $.post("{{route('appanel.categories.destroy')}}", { 'uid': uid }, function (res) {
                    if (res.status != 'success') {
                        $('#error_txt_dcategory').text(res.error);
                        $('#error_dcategory').fadeIn();
                    } else {
                        $('#modal-deleteCateory').modal('hide');
                        $('#c' + uid ).remove();
                    }
                });
            });
        @endif
    });
    </script>
@stop

@section('content')
    <script id="tmp-category" type="x-tmpl-mustache">
        <div id="c@{{uid}}" class="col-sm-6 col-lg-3">
            <div class="block block-bordered animated tada" data-uid="@{{uid}}">
                <div class="block-header">
                    <ul class="block-options">
                        @if(Auth::user()->permissions()->categories->edit)
                        <li><button type="button" class="edit-category" data-uid="@{{uid}}" data-name="@{{name}}"><i class="si si-pencil"></i></button></li>
                        @endif
                        @if(Auth::user()->permissions()->categories->delete)
                        <li><button type="button" class="trash-category" data-uid="@{{uid}}" data-name="@{{name}}"><i class="si si-trash text-danger"></i></button></li>
                        @endif
                    </ul>
                    <h3 class="block-title" data-uid="@{{uid}}">@{{name}}</h3>
                </div>
            </div>
        </div>
    </script>

    <div class="content">
    	<div class="btn-group">
    		@if(Auth::user()->permissions()->categories->create)
    		<button class="btn btn-default add-category" type="button">Nueva categoría</button>
    		@endif
    	</div>
    </div>

    <div class="content">
    	<div class="row" id="categories-container">

    	@foreach($categories as $category)
    		<div id="c{{$category->uid}}" class="col-sm-6 col-lg-3">
    			<div class="block block-bordered" data-uid="{{$category->uid}}">
                    <div class="block-header">
                        <ul class="block-options">
                            @if(Auth::user()->permissions()->categories->edit)
                            <li><button type="button" class="edit-category" data-uid="{{$category->uid}}" data-name="{{$category->name}}"><i class="si si-pencil"></i></button></li>
                            @endif
                            @if(Auth::user()->permissions()->categories->delete)
                            <li><button type="button" class="trash-category" data-uid="{{$category->uid}}" data-name="{{$category->name}}"><i class="si si-trash text-danger"></i></button></li>
                            @endif
                        </ul>
                        <h3 class="block-title" data-uid="{{$category->uid}}">{{$category->name}}</h3>
                    </div>
                </div>
            </div>
        @endforeach

    	</div>
    </div>
@stop

@section('modals')
    @if(Auth::user()->permissions()->categories->create)
        <div class="modal" id="modal-addCateory" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Nueva categoría</h3>
                        </div>
                        <div class="block-content">

                            <form class="form-horizontal push-10-t push-10">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <label for="title">Nombre de la categoría</label>
                                            <input class="form-control input-lg" type="text" id="c_name" name="c_name" placeholder="Escribe el nombre...">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="error_category" class="alert alert-danger alert-dismissable" style="display: none;">
                                <h3 class="font-w300 push-15">Error</h3>
                                <p id="error_txt_category"></p>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-sm btn-primary" type="button" id="doCreateCategory">Crear categoría</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(Auth::user()->permissions()->categories->edit)
        <div class="modal" id="modal-editCateory" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Editar categoría</h3>
                        </div>
                        <div class="block-content">

                            <form class="form-horizontal push-10-t push-10">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <label for="title">Nuevo nombre de la categoría</label>
                                            <input class="form-control input-lg" type="text" id="c_n_name" name="c_n_name" placeholder="Escribe el nombre...">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="error_ucategory" class="alert alert-danger alert-dismissable" style="display: none;">
                                <h3 class="font-w300 push-15">Error</h3>
                                <p id="error_txt_ucategory"></p>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-sm btn-primary" type="button" id="doUpdateCategory">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(Auth::user()->permissions()->categories->delete)
        <div class="modal" id="modal-deleteCateory" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-danger">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Eliminar categoría</h3>
                        </div>
                        <div class="block-content">
                            <p>¿Estás seguro de querer eliminar la categoría <b id="d_name"></b>?</p>
                            <div id="error_dcategory" class="alert alert-danger alert-dismissable" style="display: none;">
                                <h3 class="font-w300 push-15">Error</h3>
                                <p id="error_txt_dcategory"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-sm btn-danger" type="button" id="doDeleteCategory">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop