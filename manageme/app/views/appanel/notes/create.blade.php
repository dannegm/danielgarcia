@extends('appanel/template')

@section('styles-oneui')
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/select2/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/oneui/js/plugins/redactor/redactor.css')}}">
@stop

@section('scripts')
    <script src="{{URL::asset('/oneui/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/bootstrap-datetimepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>

	<script src="{{URL::asset('/oneui/js/plugins/redactor/redactor.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fontsize.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fontcolor.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fullscreen.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/dnn.upload.js')}}"></script>
	<script>
	// ONE UI Pickers

    $(function () {
        App.initHelpers(['datepicker', 'datetimepicker', 'select2', 'tags-inputs']);
    });


	// Redactor
	$(document).ready(function(){
		$('#description').redactor({
			buttons: ['bold', 'italic', 'deleted', 'link'],
			convertLinks: true,
			minHeight: 50
		});
		$('#content').redactor({
			plugins: ['fontsize', 'fontcolor'],
			convertVideoLinks: true,
			convertLinks: true,
			toolbarFixedBox: true,
			minHeight: 150,
			imageUpload: '{{route('appanel.picture.upload')}}',
			imageGetJson: '{{URL::asset('/appanel/pictures/all.json')}}',
			clipboardUploadUrl: '{{route('appanel.picture.upload')}}'
		});
	});

	// Upload
	var pictureAPI = "{{route('appanel.picture.upload')}}";
	var options_cover = {
		url: pictureAPI,
		filename: 'file',
		group: 'Cover',
		maxSize: 8 * 1024 * 1024,
		maxWidth: 2048,
		start: function () {
		},
		process: function (picture) {
			$('#progress_cover').show();
		},
		error: function (error) {
			$('#error_txt_cover').text(error.message);
			$('#error_cover').fadeIn();
		},
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener('progress', function(p) {
				var percentComplete = p.loaded / p.total;
				var percent = parseFloat(Math.round((percentComplete * 100)));
				$('#progressbar_cover').css({
					'width': percent + '%'
				});
			}, false);
			return xhr;
		},
		success: function (response) {
			$('#progress_cover').hide();
			$('#pic_cover').val(response.id);
			$('#img_cover').css({
				'background-image': 'url(' + response.pic + ')'
			});
		}
	};

	var youtubeREGEXP = /^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/;
	var prewviewYT = function (youtube_id) {
		var API_KEY = 'AIzaSyBQhzgkqN3Zq06VyXbX0ohSu5mBJOX96O0';
		var youtubeAPI = 'https://www.googleapis.com/youtube/v3/videos?id=[[youtubeID]]&key=[[API_KEY]]&part=snippet,status'.replace('[[youtubeID]]', youtube_id).replace('[[API_KEY]]', API_KEY);
		if (youtubeAPI != '') {
			$.get(youtubeAPI, function (res) {
				if (res.items.length > 0) {
					item = res.items[0];
					$('#yt-cover').attr('src', item.snippet.thumbnails.default.url);
					$('#yt-title').text(item.snippet.title);
					$('#yt-description').text(item.snippet.description.substring(0,255));

					if (item.status.embeddable) {
						$('#yt-status').text('Puede incrustarse').removeClass('label-danger').addClass('label-success');
					} else {
						$('#yt-status').text('No puede incrustarse').removeClass('label-success').addClass('label-danger');
					}
					$('#yt-content').fadeIn();
				} else {
					$('#yt-content').hide();
				}
			});
		} else {
			$('#yt-content').hide();
		}
	};

	$(function () {
		// Cover
		$('#picker_cover').on('click', function (e) {
			e.preventDefault();
			$('#file_cover').trigger('click');
		});
		$('#file_cover').on('change', function (e) {
			e.preventDefault();
			options_cover.files = this.files;
			upload( options_cover );
		});

		// Previsualización de youtube

		var findYT = function () {
			if ($('#youtube_id').val() == '') {
				$('#yt-content').hide();
			} else {
				var youtubeID = $('#youtube_id').val().match(youtubeREGEXP);
				youtubeID = youtubeID[1];
				prewviewYT(youtubeID);
			}
		}

		if ($('#youtube_id').val() != '') {
			findYT();
		}

		$(document).on('keyup', '#youtube_id', findYT);
		$(document).on('blur', '#youtube_id', findYT);

		@if(Auth::user()->permissions()->categories->create)
		// Categories
		$('#category_uid').on('change', function (e) {
			if ( $('#category_uid').val() == 'add' ) {
				$('#modal-addCateory').modal('show');
			}
		});
		$('#doCreateCategory').on('click', function () {
			$.post("{{route('appanel.categories.store')}}", { 'name': $('#c_name').val() }, function (res) {
				console.log(res);
				if (res.status != 'success') {
					$('#error_txt_category').text(res.error);
					$('#error_category').fadeIn();
				} else {
					$('#category_uid').select2("destroy");
					$('#category_uid').prepend('<option value="' + res.category.uid + '">' + res.category.name + '</option>');
					$('#category_uid').select2();
					$('#category_uid').val(res.category.uid).trigger("change"),

					$('#modal-addCateory').modal('hide');
					$('#c_name').val('');
				}
			});
		});
		@endif
	});

	@if($errors->has())
	$(function () {
		$('#modal-errors').modal('show');
	});
	@endif


	</script>
@stop

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.notes.index')}}">Notas</a></li>
	<li class="active">Nueva</li>
@stop

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title"></h3>
					</div>

					<!-- form -->
					<div class="block-content">
						{{Form::open(array(
							'url' => route('appanel.notes.store'),
							'class' => 'form-horizontal push-10-t push-10',
						))}}
							<div class="row">
								<div class="col-md-8 col-sm-9 col-sx-12">
									<!-- Título de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<div class="form-material">
												<label for="title">Título</label>
												<input class="form-control input-lg" type="text" id="title" name="title" placeholder="Título de la nota" value="{{Input::old('title')}}">
											</div>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<label for="description">Descriptión</label>
											<textarea id="description" name="description" placeholder="Descripción">{{Input::old('description')}}</textarea>
										</div>
									</div>

									<!-- Portada de la nota -->
									<div class="form-group" style="border-top: 1px solid #eee; border-bottom: 1px solid #eee; margin: 20px 0; padding-top: 20px">
										<label>Foto de portada</label>


										<div id="img_cover" class="img-container" style="height: 150px; background: #444 center no-repeat; background-size: cover;
											background-image: url('{{Input::old('pic_cover') != '' ? route('appanel.picture.uid', array('uid' => Input::old('pic_cover'))) : route('appanel.picture.uid', array('uid' => '55f632283dfe8'))}}');">
											<div class="img-options" style="opacity: 1;">
												<div class="img-options-content">
													<h3 class="font-w400 text-white push-5">Imagen de portada</h3>
													<h4 class="h6 font-w400 text-white-op push-15">Selecciona una imagen</h4>
													<button type="button" id="picker_cover" class="btn btn-sm btn-default"><i class="si si-magnifier"></i> Buscar imagen</a>
												</div>
											</div>
										</div>

										<div id="progress_cover" class="progress progress-mini animated fadeIn slideInDown" style="display: none;">
											<div id="progressbar_cover" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
										</div>

										<input type="hidden" id="pic_cover" name="pic_cover" value="{{Input::old('pic_cover') != '' ? Input::old('pic_cover') : '55f632283dfe8'}}" />
										<input type="file" id="file_cover" name="file_cover" class="visibility-hidden" />

										<div id="error_cover" class="alert alert-danger alert-dismissable" style="display: none;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h3 class="font-w300 push-15">Error</h3>
											<p id="error_txt_cover"></p>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<div class="form-material">
												<label for="title">Video de youtube destacado</label>
												<br />
												<div class="input-group">
													<input class="form-control" type="text" id="youtube_id" name="youtube_id" placeholder="URL de youtube" value="{{ Input::old('youtube_id') != '' ? 'https://www.youtube.com/watch?v=' . Input::old('youtube_id') : ''}}">
													<span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="yt-loader">
                                                        	<i class='fa fa-search'></i>
                                                        </button>
                                                    </span>
												</div>

												<div class="push-10-t row" style="display: none;" id="yt-content">
													<div class="col-xs-3">
														<img id="yt-cover" class="img-responsive" />
													</div>
													<div class="col-xs-9">
														<h1 class="h4" id="yt-title"></h1>
														<p><span id="yt-description"></span>
															<br /><span class="label" id="yt-status"></span>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<label for="content">Contenido</label>
											<textarea id="content" name="content" placeholder="Once upon a time...">{{Input::old('content')}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-3 col-sx-12">
									<div class="form-group">
										<div class="col-xs-12">
											<label for="category_uid">Categoría</label>
	                                        <select class="js-select2 form-control" id="category_uid" name="category_uid" style="width: 100%;" data-placeholder="Seleciona una...">
	                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
	                                            @foreach($categories as $c)
													<option value="{{$c->uid}}"{{Input::old('category_uid') == $c->uid ? ' selected' : ''}}>{{$c->name}}</option>
												@endforeach

												@if(Auth::user()->permissions()->categories->create)
												<option disabled>───</option>
	                                            <option value="add"><b>Nueva categoría...</b></option>
	                                           	@endif
	                                        </select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="tags">Tags</label>
											<input class="js-tags-input form-control" type="text" id="tags" name="tags" placeholder="Añadir tags..." value="{{Input::old('tags')}}">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="posted_at">Fecha de pulicación</label>


	                                        <div class="js-datetimepicker input-group date" data-show-today-button="true" data-show-clear="true" data-show-close="true" data-side-by-side="true">
	                                            <input class="form-control" type="text" id="posted_at" name="posted_at" placeholder="Seleciona fecha y hora..." value="{{Input::old('posted_at')}}">
	                                            <span class="input-group-addon">
	                                                <span class="fa fa-calendar"></span>
	                                            </span>
	                                        </div>

										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6">
											<label>Opciones</label>

	                                        <div class="col-xs-12">
	                                            <label class="css-input switch switch-sm switch-warning">
	                                                <input id="marker" name="marker" type="checkbox"{{Input::old('marker') == 'on' ? ' checked' : ''}}><span></span> Destacado
	                                            </label>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <label class="css-input switch switch-sm switch-default">
	                                                <input id="draft" name="draft" type="checkbox"{{Input::old('draft') == 'on' ? ' checked' : ''}}><span></span> Borrador
	                                            </label>
	                                        </div>

										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-default" href="{{route('appanel.notes.index')}}">Cancelar</a>
											<button class="btn btn-primary" type="submit">Crear nota</button>
										</div>
									</div>
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
		</div>
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
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
@stop