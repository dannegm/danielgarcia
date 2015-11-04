@extends('appanel/template')

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.user.index')}}">Usuarios</a></li>
	<li>Editar</li>
	<li class="active">{{$user->name}}</li>
@stop

@section('scripts')
	<script src="{{URL::asset('/oneui/js/dnn.upload.js')}}"></script>
	<script>
	// Upload
	var pictureAPI = "{{route('appanel.picture.upload')}}";

	var options_avatar = {
	    url: pictureAPI,
	    filename: 'file',
	    group: 'UserProfile',
	    maxSize: 8 * 1024 * 1024,
	    maxWidth: 720,
	    start: function () {
	    },
	    process: function () {
	        $('#droppeable_avatar .options').hide();
	    },
	    error: function (error) {
	        console.log(error.message);
	    },
	    xhr: function () {
	        var xhr = new window.XMLHttpRequest();
	        xhr.upload.addEventListener('progress', function(p) {
	            var percentComplete = p.loaded / p.total;
	            var percent = parseFloat(Math.round((percentComplete * 100)));
	        }, false);
	        return xhr;
	    },
	    success: function (response) {
	        $('#pic_avatar').val(response.id);
	        $('#img_avatar').attr('src', response.sqm);
	        console.log(response);
	    }
	};

	$(function () {
	    // Logo
	    var input_avatar = $('#file_avatar');
	    input_avatar.on('change', function (e) {
	        e.preventDefault();
	        options_avatar.files = this.files;
	        upload( options_avatar );
	    });
	});

	@if($errors->has())
	$(function () {
		$('#modal-errors').modal('show');
	});
	@endif

	</script>
@stop

@section('content')
	<div class="content">
		{{Form::model($user, array('route' => array('appanel.user.update', $user->uid), 'method' => 'PUT'))}}
		<div class="row">
			<div class="col-md-6 col-sm-8 col-xs-12">
			<!-- Formulario -->
				<div class="block">
					<div class="block-header bg-gray-lighter">
						<h3 class="block-title">Datos de usuario</h3>
					</div>
					<div class="block-content">
						<div class="form-group">
							<div class="form-material">
								<label>Nombre</label>
								<input class="form-control input-lg" type="text" name="name" placeholder="Nombre" value="{{$user->name}}">
							</div>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="username" placeholder="Nombre de usuario" value="{{$user->username}}">
						</div>

						<div class="form-group" style="border-top: 1px solid #eee; border-bottom: 1px solid #eee; margin: 20px 0; padding: 20px 0;">
							<label>Foto de perfil</label>
							<div class="media">
								<div class="media-left media-top">
									<img id="img_avatar" src="{{URL::asset('/pictures/sqm/' . $user->picture->url)}}" class="img-rounded">
								</div>
								<div class="media-body">
									<input type="hidden" id="pic_avatar" name="pic_avatar" value="{{$user->avatar}}" />
									<input type="file" id="file_avatar" name="file_avatar" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="text" name="email" placeholder="email" value="{{$user->email}}">

						</div>
						<div class="form-group">
							<label>Nueva Contraseña</label>
							<input class="form-control" type="password" name="password" placeholder="contraseña" value="">
						</div>


						@if(Auth::user()->uid != $user->uid)
						<div class="form-group" style="border-top: 1px solid #eee; margin-top: 20px; padding-top: 20px;">
							@if(Auth::user()->permissions()->users->edit)
							<button class="btn btn-primary" type="submit">Guardar</button>
							<a href="{{route('appanel.user.index')}}" class="btn btn-default" role="button">Cancelar</a>
							@else
							<a href="{{route('appanel.user.index')}}" class="btn btn-default" role="button">Regresar</a>
							@endif

							@if(Auth::user()->permissions()->users->delete)
							<a href="{{route('appanel.user.destroy', array('uid' => $user->uid))}}" class="btn btn-danger" role="button">Eliminar</a>
							@endif
						</div>
						@else
						<div class="form-group" style="border-top: 1px solid #eee; margin-top: 20px; padding-top: 20px;">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<a href="{{route('appanel.user.index')}}" class="btn btn-default" role="button">Cancelar</a>
						</div>
						@endif
					</div>
				</div>
			</div>

			<?php $permissions = $user->permissions(); ?>
			<div class="col-md-6 col-sm-4 col-xs-12"{{ Auth::user()->permissions()->users->edit ? '' : ' style="display: none;"'}}>
				<h2 class="content-heading">Permisos</h2>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="block">
							<div class="block-header  bg-gray-lighter">
	                            <ul class="block-options">
	                                <li>
	                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
	                                </li>
	                            </ul>
								<h3 class="block-title">Usuarios</h3>
							</div>
							<div class="block-content">
								<table class="table table-borderless remove-margin">
									<tr>
										<td>Crear</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_user_create"{{ $permissions->users->create ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
									<tr>
										<td>Editar</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_user_edit"{{ $permissions->users->edit ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
									<tr>
										<td>Eliminar</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_user_delete"{{ $permissions->users->delete ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-xs-12">
						<div class="block">
							<div class="block-header bg-gray-lighter">
	                            <ul class="block-options">
	                                <li>
	                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
	                                </li>
	                            </ul>
								<h3 class="block-title">Notas</h3>
							</div>
							<div class="block-content">
								<table class="table table-borderless remove-margin">
									<tr>
										<td>Crear</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_note_create"{{ $permissions->notes->create ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
									<tr>
										<td>Editar</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_note_edit"{{ $permissions->notes->edit ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
									<tr>
										<td>Eliminar</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_note_delete"{{ $permissions->notes->delete ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-xs-12">
						<div class="block">
							<div class="block-header bg-gray-lighter">
	                            <ul class="block-options">
	                                <li>
	                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
	                                </li>
	                            </ul>
								<h3 class="block-title">Categorías</h3>
							</div>
							<div class="block-content">
								<table class="table table-borderless remove-margin">
									<tr>
										<td>Crear</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_category_create"{{ $permissions->categories->create ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
									<tr>
										<td>Editar</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_category_edit"{{ $permissions->categories->edit ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
									<tr>
										<td>Eliminar</td>
										<td class="text-right">
											<label class="css-input switch switch-sm switch-primary">
												<input type="checkbox" name="permission_category_delete"{{ $permissions->categories->delete ? ' checked' : '' }}{{ Auth::user()->permissions()->users->edit ? '' : ' disabled'}}><span></span>
											</label>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{Form::close()}}
	</div>
@stop

@section('modals')

	@if($errors->has())
		<?php $dis = '' ?>
		@foreach ($errors->all() as $error)
			<?php $dis .= "<li>{$error}</li>" ?>
		@endforeach

		<div class="modal" id="modal-errors" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="block block-themed remove-margin-b">
		                <div class="block-header bg-danger">
		                    <ul class="block-options">
		                        <li>
		                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
		                        </li>
		                    </ul>
		                    <h3 class="block-title">Verfica lo siguiente</h3>
		                </div>
		                <div class="block-content">
		                	<ul>
								{{$dis}}
							</ul>
						</div>
		            </div>
		            <div class="modal-footer">
		                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Aceptar</button>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@stop







