@extends('appanel/template')

@section('styles-oneui')
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/codemirror/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/codemirror/theme/material.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/oneui/js/plugins/redactor/redactor.css')}}">
	<style>
		#preview {
			display: block;
			width: 100%;
			height: 400px;
			border: 0;
		}
		#content, #css, #js {
			display: block;
			width: 100%;
			height: 400px;
		}
	</style>
@stop

@section('scripts')
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/lib/codemirror.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/javascript/javascript.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/addon/selection/active-line.js')}}"></script>

    <script src="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>

	<script src="{{URL::asset('/oneui/js/plugins/redactor/redactor.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fontsize.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fontcolor.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fullscreen.js')}}"></script>
	<script>
	// ONE UI Pickers

	var $$ = function (e) { return document.getElementById(e); };
    $(function () {
        App.initHelpers(['tags-inputs']);
    });

	@if($errors->has())
	$(function () {
		$('#modal-errors').modal('show');
	});
	@endif

	var html = CodeMirror.fromTextArea($$("content"), {
		lineNumbers: true,
		styleActiveLine: true,
		tabSize: 4,
		indentWithTabs: true,
		theme: 'material'
	});
	var js = CodeMirror.fromTextArea($$("js"), {
		lineNumbers: true,
		styleActiveLine: true,
		theme: 'material',
		tabSize: 4,
		indentWithTabs: true,
		mode: 'javascript'
	});
	var css = CodeMirror.fromTextArea($$("css"), {
		lineNumbers: true,
		styleActiveLine: true,
		theme: 'material',
		tabSize: 4,
		indentWithTabs: true,
		mode: 'css'
	});

	$(document).ready(function(){
		setTimeout(function () {
			$('#content-html, #content-js, #content-css').removeClass('active');
		}, 500);
	});

	$(function () {
		$('#permalink-edit').on('click', function () {
			$('#permalink-preview').hide();
			$('#permalink-form').fadeIn();
		});
		$(document).on('keyup', '#permalink', function () {
			if ($(this).val().match(/#[A-Za-z0-9\-]+#/g)) {
				$('#permalink-form').addClass('has-error');
			} else {
				$('#permalink-form').removeClass('has-error');
			}
		});
	});


	</script>
@stop

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.pages.index')}}">Páginas</a></li>
	<li>Editar</li>
	<li class="active">{{$page->uid}}</li>
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
							'route' => array('appanel.pages.update', $page->uid),
							'method' => 'PUT',
							'class' => 'form-horizontal push-10-t push-10',
						))}}
							<div class="row">
								<div class="col-md-8 col-sm-9 col-sx-12">
									<!-- Título de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<div class="form-material">
												<label for="title">Título</label>
												<input class="form-control input-lg" type="text" id="title" name="title" placeholder="Título de la nota" value="{{$page->title}}">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div id="permalink-preview">
												<span class="label label-info">Ruta</span>
												<span class="text-op">{{URL::asset('/page')}}/<b>{{$page->route}}</b></span>
												<button class="btn btn-default btn-xs" id="permalink-edit" type="button"><i class="fa fa fa-pencil"></i></button>
											</div>

											<div id="permalink-form" style="display: none;">
												<span class="label label-info">Ruta</span>
												<div class="input-group push-10-t">
													<span class="input-group-addon">
														<span class="font-s12">{{URL::asset('/pages')}}/</span>
													</span>
													<input class="form-control input-sm" style="font-weight: bold; font-size: 12px;" type="text" id="route" name="route" placeholder="route" value="{{$page->route}}">
												</div>
												<div class="help-block">La ruta sólo debe tener letras y números sin espacios ni caracteres especiales</div>
											</div>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-12">

				                            <div class="block block-bordered">
				                                <ul class="nav nav-tabs" data-toggle="tabs">
				                                    <li class="active">
				                                        <a href="#content-preview">Preview</a>
				                                    </li>
				                                    <li>
				                                        <a href="#content-html">HTML</a>
				                                    </li>
				                                    <li>
				                                        <a href="#content-css">CSS</a>
				                                    </li>
				                                    <li>
				                                        <a href="#content-js">JS</a>
				                                    </li>
				                                </ul>
				                                <div class="block-content tab-content remove-padding">
				                                    <div class="tab-pane remove-padding active" id="content-preview">

														<iframe id="preview" src="{{route('appanel.pages.preview', array('id' => $page->uid))}}"></iframe>

				                                    </div>
				                                    <div class="tab-pane remove-padding active" id="content-html">
														<textarea id="content" name="content">{{$page->content}}</textarea>
				                                    </div>
				                                    <div class="tab-pane remove-padding active" id="content-css">
														<textarea id="css" name="css">{{$page->css}}</textarea>
				                                    </div>
				                                    <div class="tab-pane remove-padding active" id="content-js">
														<textarea id="js" name="js">{{$page->js}}</textarea>
				                                    </div>
				                                </div>
				                            </div>

										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-3 col-sx-12">
									<div class="form-group">
										<div class="col-xs-12">
											<label for="tags">Descripción</label>
											<textarea class="form-control" id="description" name="description" placeholder="Descripción">{{$page->description}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="tags">Keywords</label>
											<input class="js-tags-input form-control" type="text" id="keywords" name="keywords" value="{{$page->keywords}}">
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-default" href="{{route('appanel.pages.index')}}">Cancelar</a>
											<button class="btn btn-primary" type="submit">Actualizar</button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-danger trahs-page" href="{{route('appanel.pages.destroy', array('id' => $page->uid))}}">Eliminar página</a>
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
@stop