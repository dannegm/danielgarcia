@extends('appanel/template')

@section('styles-oneui')
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/codemirror/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/codemirror/theme/material.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/oneui/js/plugins/redactor/redactor.css')}}">
@stop

@section('scripts')
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/lib/codemirror.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/javascript/javascript.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/addon/selection/active-line.js')}}"></script>

    <script src="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
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
			$('#content-js, #content-css').removeClass('active');
		}, 500);
	});


	</script>
@stop

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.pages.index')}}">Páginas</a></li>
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
							'url' => route('appanel.pages.store'),
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

				                            <div class="block block-bordered">
				                                <ul class="nav nav-tabs" data-toggle="tabs">
				                                    <li class="active">
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
				                                    <div class="tab-pane remove-padding active" id="content-html">
														<textarea id="content" name="content">{{Input::old('content')}}</textarea>
				                                    </div>
				                                    <div class="tab-pane remove-padding" id="content-css">
														<textarea id="css" name="css">{{Input::old('css')}}</textarea>
				                                    </div>
				                                    <div class="tab-pane remove-padding" id="content-js">
														<textarea id="js" name="js">{{Input::old('js')}}</textarea>
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
											<textarea class="form-control" id="description" name="description" placeholder="Descripción">{{Input::old('description')}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="tags">Keywords</label>
											<input class="js-tags-input form-control" type="text" id="keywords" name="keywords" value="{{Input::old('keywords')}}">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-default" href="{{route('appanel.pages.index')}}">Cancelar</a>
											<button class="btn btn-primary" type="submit">Crear página</button>
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