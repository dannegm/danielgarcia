@extends('appanel/template')

@section('styles-oneui')
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/codemirror/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/codemirror/theme/material.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/select2/select2-bootstrap.min.css')}}">
@stop

@section('scripts')
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/lib/codemirror.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/javascript/javascript.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/codemirror/addon/selection/active-line.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/select2/select2.full.min.js')}}"></script>
	<script>
	// ONE UI Pickers

    $(function () {
        App.initHelpers(['select2']);
    });
	var $$ = function (e) { return document.getElementById(e); };

	var html = CodeMirror.fromTextArea($$("html"), {
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

	@if($errors->has())
	$(function () {
		$('#modal-errors').modal('show');
	});
	@endif


	</script>
@stop

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.advertises.index')}}">Anuncios</a></li>
	<li>Editar</li>
	<li class="active">{{$advertise->uid}}</li>
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
							'route' => array('appanel.advertises.update', $advertise->uid),
							'method' => 'PUT',
							'class' => 'form-horizontal push-10-t push-10',
						))}}
							<div class="row">
								<div class="col-xs-12">

									<div class="form-group">
										<div class="col-sm-12">
											<div class="form-material">
												<label for="title">Nombre</label>
												<input class="form-control input-lg" type="text" id="name" name="name" placeholder="Nombre del anuncio" value="{{$advertise->name}}">
											</div>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-6">
											<label for="description">Descriptión</label>
											<textarea class="form-control" id="description" name="description" placeholder="Descripción">{{$advertise->description}}</textarea>
										</div>

										<div class="col-xs-6">
											<label for="category_uid">Espacio</label>
	                                        <select class="js-select2 form-control" id="space" name="space" style="width: 100%;" data-placeholder="Seleciona un espacio...">
	                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
	                                            @foreach($spaces as $c)
													<option value="{{$c->uid}}"{{$advertise->space_uid == $c->uid ? ' selected' : ''}}{{$c->taken() && $advertise->space_uid != $c->uid ? ' disabled' : ''}}>{{$c->description}}</option>
												@endforeach
	                                        </select>
										</div>
									</div>
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
														<textarea id="html" name="html">{{$advertise->html}}</textarea>
				                                    </div>
				                                    <div class="tab-pane remove-padding active" id="content-css">
														<textarea id="css" name="css">{{$advertise->css}}</textarea>
				                                    </div>
				                                    <div class="tab-pane remove-padding active" id="content-js">
														<textarea id="js" name="js">{{$advertise->js}}</textarea>
				                                    </div>
				                                </div>
				                            </div>

										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-default" href="{{route('appanel.advertises.index')}}">Cancelar</a>
											<button class="btn btn-primary" type="submit">Guardar anuncio</button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-danger trahs-note" href="{{route('appanel.advertises.destroy', array('id' => $advertise->uid))}}">Eliminar anuncio</a>
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