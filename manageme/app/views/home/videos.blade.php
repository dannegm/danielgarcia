
		<div class="videos">
			<div class="container">
				<div class="row">
					<?php $i = 0; ?>
					@foreach($videos as $note)
						<div class="col-md-3 col-sm-4 col-xs-6 col-lg-5th-1{{$i == 4 ? ' hidden-md' : ''}}{{$i == 4 ? ' hidden-sm' : ''}}{{$i == 3 ? ' hidden-sm' : ''}}{{$i == 2 ? ' hidden-xs' : ''}}{{$i == 3 ? ' hidden-xs' : ''}}{{$i == 4 ? ' hidden-xs' : ''}}">
							<article class="video video-mini">
								<a href="{{route('page.note', array('uid' => $note->permalink))}}">
									<div class="video-cover"
										style="background-image: url('{{URL::asset('/pictures/small/' . $note->cover->url)}}');">

										<div class="play-button">
											<i class="play-button fa fa-play-circle"></i>
										</div>
									</div>

									<div class="video-content">
										<h1>{{$note->title}}</h1>
									</div>
								</a>
							</article>
				        </div>
				        <?php $i++; ?>
				    @endforeach
				</div>
			</div>
		</div>