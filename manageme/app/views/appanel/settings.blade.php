@extends('appanel/template')

@section('scripts')
<script>
$(function () {
	// Page Title
	$(document).on('click', '.putPageTitle', function (e) {
		e.preventDefault();
		App.blocks('#block_pageTitle', 'state_loading');
		$.post(
			'{{route("appanel.settings.page.title")}}',
			{ 'title': $('#page_title').val() },
			function (res) {
				setTimeout(function () {
					App.blocks('#block_pageTitle', 'state_normal');
				}, 500);
			}
		);
	});
	// Page Status
	$(document).on('click', '.putPageStatus', function (e) {
		e.preventDefault();
		App.blocks('#block_pageStatus', 'state_loading');
		$.post(
			'{{route("appanel.settings.page.status")}}',
			{ 'status': $('#page_status').val() },
			function (res) {
				setTimeout(function () {
					App.blocks('#block_pageStatus', 'state_normal');
				}, 500);
			}
		);
	});

	// Social Data
	$(document).on('click', '.putSocialData', function (e) {
		e.preventDefault();
		App.blocks('#block_socialData', 'state_loading');
		$.post(
			'{{route("appanel.settings.social.data")}}',
			{
				'facebook': $('#social_facebook').val(),
				'twitter': $('#social_twitter').val(),
				'instagram': $('#social_instagram').val(),
				'youtube': $('#social_youtube').val(),
				'github': $('#social_github').val(),
				'linkedin': $('#social_linkedin').val(),
			},
			function (res) {
				setTimeout(function () {
					App.blocks('#block_socialData', 'state_normal');
				}, 500);
			}
		);
	});

	// Contact Data
	$(document).on('click', '.putContactData', function (e) {
		e.preventDefault();
		App.blocks('#block_contactData', 'state_loading');
		$.post(
			'{{route("appanel.settings.contact.data")}}',
			{
				'email': $('#contact_email').val(),
			},
			function (res) {
				setTimeout(function () {
					App.blocks('#block_contactData', 'state_normal');
				}, 500);
			}
		);
	});

	// Contact Data
	$(document).on('click', '.putThirdData', function (e) {
		e.preventDefault();
		App.blocks('#block_thirdData', 'state_loading');
		$.post(
			'{{route("appanel.settings.third.data")}}',
			{
				'google_analytics': $('#google_analytics').val(),
			},
			function (res) {
				setTimeout(function () {
					App.blocks('#block_thirdData', 'state_normal');
				}, 500);
			}
		);
	});

	// Pages Content
	$(document).on('click', '.putPagesContent', function (e) {
		e.preventDefault();
		App.blocks('#block_pagesContent', 'state_loading');

		var pages_content = {
			'soon': {
				'title': $('#page_title_soon').val(),
				'header': $('#page_header_soon').val(),
				'content': $('#page_content_soon').val()
			},
			'maintenance': {
				'title': $('#page_title_maintenance').val(),
				'header': $('#page_header_maintenance').val(),
				'content': $('#page_content_maintenance').val()
			},
			'e404': {
				'title': $('#page_title_e404').val(),
				'content': $('#page_content_e404').val()
			},
			'e500': {
				'title': $('#page_title_e500').val(),
				'content': $('#page_content_e500').val()
			}
		};
		$.post(
			'{{route("appanel.settings.pages.content")}}',
			{ 'contents': JSON.stringify(pages_content) },
			function (res) {
				setTimeout(function () {
					App.blocks('#block_pagesContent', 'state_normal');
				}, 500);
			}
		);
	});

});
</script>
@stop

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li class="active">Configuración</li>
@stop

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div id="block_pageTitle" class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title">Nombre de la página</h3>
					</div>

					<!-- form -->
					<div class="block-content">
						<form class="form-horizontal push-10-t push-10">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="page_title" placeholder="Mi página" value="{{$settings['page']['title']}}" />
                                                <label for="page_title">Escribe el nombre de tu sitio.</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-primary putPageTitle" type="button">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div id="block_pageStatus" class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title">Estado de la página</h3>
					</div>

					<!-- form -->
					<div class="block-content">
						<form class="form-horizontal push-10-t push-10">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <select class="form-control" id="page_status" name="page_status" size="1">
                                                    <option value="public" {{$settings['page']['status']=='public'?' selected':''}}>En línea</option>
                                                    <option value="soon" {{$settings['page']['status']=='soon'?' selected':''}}>Cooming soon</option>
                                                    <option value="maintenance" {{$settings['page']['status']=='maintenance'?' selected':''}}>En mantenimiento</option>
                                                </select>
                                                <label for="page_status">Elije el estado actual de la página</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-primary putPageStatus" type="button">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<div id="block_socialData" class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title">Redes sociales</h3>
					</div>

					<!-- form -->
					<div class="block-content">
						<form class="form-horizontal push-10-t push-10">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="url" id="social_facebook" placeholder="http://www.facebook.com/" value="{{$settings['social']['facebook']}}" />
                                                <label for="social_facebook">Facebook</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="url" id="social_twitter" placeholder="http://twitter.com/" value="{{$settings['social']['twitter']}}" />
                                                <label for="social_twitter">Twitter</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="url" id="social_instagram" placeholder="http://instagram.com/" value="{{$settings['social']['instagram']}}" />
                                                <label for="social_instagram">Instagram</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="url" id="social_youtube" placeholder="http://www.youtube.com/" value="{{$settings['social']['youtube']}}" />
                                                <label for="social_youtube">Youtube</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="url" id="social_github" placeholder="http://github.com/" value="{{$settings['social']['github']}}" />
                                                <label for="social_github">Github</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="url" id="social_linkedin" placeholder="http://linkedin.com/in/" value="{{$settings['social']['linkedin']}}" />
                                                <label for="social_linkedin">LinkedIn</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-primary putSocialData" type="button">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-sm-12">
                <h2 class="content-heading">Otros ajustes</h2>
				<div id="block_contactData" class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title">Contacto</h3>
					</div>

					<!-- form -->
					<div class="block-content">
						<form class="form-horizontal push-10-t push-10">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="contact_email" placeholder="contacto@email.co" value="{{$settings['contact']['email']}}" />
                                                <label for="contact_email">E-mail de contacto.</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-primary putContactData" type="button">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

                <h2 class="content-heading">Ajustes de terceros</h2>
				<div id="block_thirdData" class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title">Terceros</h3>
					</div>

					<!-- form -->
					<div class="block-content">
						<form class="form-horizontal push-10-t push-10">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="google_analytics" placeholder="contacto@email.co" value="{{$settings['third']['google']['analytics']}}" />
                                                <label for="google_analytics">ID Google Analytics.</label>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-primary putThirdData" type="button">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
                <h2 class="content-heading">Contenido de páginas básicas</h2>
                <div id="block_pagesContent" class="block block-bordered">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="#page-soon">Comming Soon</a>
                        </li>
                        <li>
                            <a href="#page-maintenance">Mantenimiento</a>
                        </li>
                        <li>
                            <a href="#page-e404">404</a>
                        </li>
                        <li>
                            <a href="#page-e500">500</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="page-soon">
							<form class="form-horizontal push-10-t push-10">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-material">
													<label for="title">Título</label>
													<input class="form-control" type="text" id="page_title_soon" name="page_title_soon" value="{{$settings['pages']['soon']->title}}">
												</div>
											</div>
										</div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-bio">Cabecera</label>
                                                <textarea class="form-control" id="page_header_soon" name="page_header_soon" rows="2">{{$settings['pages']['soon']->header}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-bio">Contenido</label>
                                                <textarea class="form-control" id="page_content_soon" name="page_content_soon" rows="2">{{$settings['pages']['soon']->content}}</textarea>
                                            </div>
                                        </div>
									</div>
								</div>
							</form>
                        </div>
                        <div class="tab-pane" id="page-maintenance">
							<form class="form-horizontal push-10-t push-10">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-material">
													<label for="title">Título</label>
													<input class="form-control" type="text" id="page_title_maintenance" name="page_title_maintenance" value="{{$settings['pages']['maintenance']->title}}">
												</div>
											</div>
										</div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-bio">Cabecera</label>
                                                <textarea class="form-control" id="page_header_maintenance" name="page_header_maintenance" rows="2">{{$settings['pages']['maintenance']->header}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-bio">Contenido</label>
                                                <textarea class="form-control" id="page_content_maintenance" name="page_content_maintenance" rows="2">{{$settings['pages']['maintenance']->content}}</textarea>
                                            </div>
                                        </div>
									</div>
								</div>
							</form>
                        </div>
                        <div class="tab-pane" id="page-e404">
							<form class="form-horizontal push-10-t push-10">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-material">
													<label for="title">Título</label>
													<input class="form-control" type="text" id="page_title_e404" name="page_title_e404" value="{{$settings['pages']['e404']->title}}">
												</div>
											</div>
										</div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-bio">Contenido</label>
                                                <textarea class="form-control" id="page_content_e404" name="page_content_e404" rows="2">{{$settings['pages']['e404']->content}}</textarea>
                                            </div>
                                        </div>
									</div>
								</div>
							</form>
                        </div>
                        <div class="tab-pane" id="page-e500">
							<form class="form-horizontal push-10-t push-10">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-material">
													<label for="title">Título</label>
													<input class="form-control" type="text" id="page_title_e500" name="page_title_e500" value="{{$settings['pages']['e500']->title}}">
												</div>
											</div>
										</div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-bio">Contenido</label>
                                                <textarea class="form-control" id="page_content_e500" name="page_content_e500" rows="2">{{$settings['pages']['e500']->content}}</textarea>
                                            </div>
                                        </div>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    <div class="block-content bg-gray-lighter">
						<form class="form-horizontal">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-primary putPagesContent" type="button">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop

@section('modals')
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
                    <h3 class="block-title">Ha ocurrido un error</h3>
                </div>
                <div class="block-content">
				</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@stop