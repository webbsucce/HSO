<!-- Event section -->
<div id="event-section">
	<div class="grid">
		<div class="grid-sm-12">
			<h1 class="title">Sök Biljetter</h1>
		</div>
	</div>
	<div class="grid">
		<div class="grid-sm-12">
			<div class="view-selector">
				<ul>
					<li class="active"><a class="layout" href="javascript:;" data-layout="grid-layout"><i class="fa fa-th" aria-hidden="true"></i> Rutnät </a></li>
					<li><a class="layout" href="javascript:;" data-layout="list"><i class="fa fa-bars" aria-hidden="true"></i> Lista</a></li>
					<li><span class="detail"><span class="line"></span>Telefon biljettkassa: 042-10 42 80</span></li>
				</ul>
				<div class="search-container">
					<form>
						<input type="text" name="s" placeholder="Sök evenemang..." />
						<button type="submit">SÖK</button>
						<i class="fa fa-search"></i>
						<input type="hidden" name="post_type" value="event" />
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div id="filters">
		<div class="reset-button-container hidden-display">
			<button class="btn-reset"><i class="fa fa-times"></i>Rensa filter</button>
		</div>
		<div class="date-filter-container">
			<button class="date-filter btn-filter">Välj datum</button>
			<ul>
				<li><a href="javascript:void(0)" data-filter="jan">Januari</a></li>
				<li><a href="javascript:void(0)" data-filter="feb">Februari</a></li>
				<li><a href="javascript:void(0)" data-filter="mar">Mars</a></li>
				<li><a href="javascript:void(0)" data-filter="apr">April</a></li>
				<li><a href="javascript:void(0)" data-filter="may">Maj</a></li>
				<li><a href="javascript:void(0)" data-filter="jun">Juni</a></li>
				<li><a href="javascript:void(0)" data-filter="jul">Juli</a></li>
				<li><a href="javascript:void(0)" data-filter="aug">Augusti</a></li>
				<li><a href="javascript:void(0)" data-filter="sep">September</a></li>
				<li><a href="javascript:void(0)" data-filter="oct">Oktober</a></li>
				<li><a href="javascript:void(0)" data-filter="nov">November</a></li>
				<li><a href="javascript:void(0)" data-filter="dec">December</a></li>
			</ul>
		</div>
		<div class="tag-filter-container">
			<button class="tag-filter btn-filter">Välj genre</button>
			
			<?php
				$tag = new \HSOEventManager\Tag();
				$tags = $tag->get_tags();
			?>
			@if(!empty($tags))
				<ul>
					@foreach($tags as $tag)
						<li><a href="javascript:void(0)" data-filter="{{ $tag['slug'] }}">{{ $tag['title'] }}</a></li>
					@endforeach
				</ul>
			@endif
		</div>
		
		<p class="note">
			<span class="star">(*)</span> Standardval, fyll i de val du vill söka på
		</p>
	</div>

	<?php
		$event = new \HSOEventManager\Event();
		$events = $event->get_events();
	?>

	@if($events)
	<div class="grid">
		<div class="grid-sm-12">
			<div id="items" class="grid-layout">
				@foreach ($events as $event)
					{{-- # Set featured image # --}}					
					<?php 
						$featured = "";
						$profilebild = get_field('profilbild',$event['id']);

						if($profilebild){
							$featured = $profilebild['url'];
						}else if(has_post_thumbnail( $event['id'] )){
							$featured = wp_get_attachment_image_src( get_post_thumbnail_id( $event['id'] ),'medium');
							if($featured)
								$featured = $featured[0];
						}
					?>

					<?php
						// retrive all moths tags for an item
						$date_tags = array();
						$date_tags_string = "";
                        $tags_class = array();
                        $tags_string = "";
                        $tags_for_item = array();
						if(isset($event['transtickets'])){
							foreach ($event['transtickets'] as $transticket) {
								$date_tags[] = strtolower(date('M',strtotime($transticket['eventdate'])));

                                // retrive tags
                                if(isset($transticket['tags']) && !empty($transticket['tags'])){
                                    $tags = $transticket['tags'];
                                    foreach ($tags as $tag){
                                        if($tag){
                                            $tags_class[] = $tag['slug'];
                                            $tags_for_item[] = $tag;
                                        }
                                    }
                                }
							}

							// remove duplicate months
							$date_tags = array_unique($date_tags);
							$date_tags_string = implode(" ",$date_tags);

                            $tags_string = implode(" ",$tags_class);

                            // get first two tag items
                            $tags_for_item = array_slice($tags_for_item, 0, 2);
						}

					?>

					<div class="item {{ $date_tags_string ." ".$tags_string }}">
						<div class="item-content" style="{{ $featured != "" ? 'background-image:url('.$featured.')' : "" }}">
							<div class="top">
								@if(isset($event['transtickets']))
									<div class="date-time">
										<label for="">Speltider:</label>
										@foreach($event['transtickets'] as $transticket)
											<p>
												<i class="fa fa-clock-o" aria-hidden="true"></i>
												<span>{{ date('H.i',strtotime($transticket['eventdate'])) }}</span> TDR <span>{{ date('d M',strtotime($transticket['eventdate'])) }}</span>
											</p>
										@endforeach
									</div>
								@endif
                                @if(!empty($tags_for_item))
								<div class="event-tags">
                                    @foreach($tags_for_item as $tag)
                                        <span class="event-tag" style="background-color:#{{ $tag['colorcode'] }}">{{ $tag['title'] }}</span>
                                    @endforeach
                                </div>
                                @endif
							</div>							
						</div>
						<div class="bottom">
							<h1 class="event-title">{{ $event['title'] }}</h1>
							<ul class="buttons">
								<li class="first"><a class="btn btn-first" href="{{ $event['buy_event_ticket_link'] != "" ? $event['buy_event_ticket_link'] : '#'  }}" target="_blank">Köp</a></li>
								<li class="second"><a class="btn" href="{{ $event['link'] }}">Läs mer</a></li>
							</ul>
						</div>
					</div>
				@endforeach
			</div> <!-- Grid itmes -->

			<div id="items" class="list" style="display: none">
				@foreach ($events as $event)

                    <?php
						// retrive all moths tags for an item
						$date_tags = array();
						$date_tags_string = "";
                        $tags_class = array();
                        $tags_string = "";
                        $tags_for_item = array();
						if(isset($event['transtickets'])){
							foreach ($event['transtickets'] as $transticket) {
								$date_tags[] = strtolower(date('M',strtotime($transticket['eventdate'])));

                                // retrive tags
                                if(isset($transticket['tags']) && !empty($transticket['tags'])){
                                    $tags = $transticket['tags'];
                                    foreach ($tags as $tag){
                                        if($tag){
                                            $tags_class[] = $tag['slug'];
                                            $tags_for_item[] = $tag;
                                        }
                                    }
                                }
							}

							// remove duplicate months
							$date_tags = array_unique($date_tags);
							$date_tags_string = implode(" ",$date_tags);

                            $tags_string = implode(" ",$tags_class);

                            // get first two tag items
                            $tags_for_item = array_slice($tags_for_item, 0, 2);
						}

					?>
				<div class="item {{ $date_tags_string . " " . $tags_string }}">
					<div class="item-content">
						@if($event['featured'])
						<img src="{{ $event['featured'][0] }}">
						@endif
						<div class="item-meta">
							<h1 class="event-title">{{ $event['title'] }}</h1>
							
							@if(!empty($tags_for_item))
							<div class="event-tags">
                                @foreach($tags_for_item as $tag)
                                    <span class="event-tag" style="background-color:#{{ $tag['colorcode'] }}">{{ $tag['title'] }}</span>
                                @endforeach
                            </div>
                            @endif

							@if(isset($event['transtickets']))
								<div class="date-time">
									<label for="">Speltider:</label>
									@foreach($event['transtickets'] as $transticket)
										<p>
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span>{{ date('H.i',strtotime($transticket['eventdate'])) }}</span> TDR <span>{{ date('d M',strtotime($transticket['eventdate'])) }}</span>
										</p>
									@endforeach
								</div>
							@endif
						</div>
						<ul class="buttons">
							<li class="first"><a href="#">Köp</a></li>
							<li class="second"><a href="{{ $event['link'] }}">Läs mer</a></li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
				@endforeach
			</div> <!-- List itmes -->

		</div>
	</div>
	@else
		<h3>No events found</h3>
	@endif

	<div id="view-more">
		<a href="#">Visa fler</a>
	</div>
</div>
