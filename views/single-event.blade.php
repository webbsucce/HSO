@extends('templates.master')

@section('content')

<div class="single-event">
    <?php
        $header_image_style = "style=background-color:#7492a5";
        // set fatured image
        if(has_post_thumbnail()){
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            if($image){
                $header_image_style = "style=background-image:url(".$image[0].")";
            }

        }

        // get title color
        $color = "#000";
        if(get_field('hso_single_event_settings_text_color')){
            $color = get_field('hso_single_event_settings_text_color');
        }

        // get subtitle
        $subtitle = "";
        if(get_field('hso_single_event_settings_subtitle')){
            $subtitle = get_field('hso_single_event_settings_subtitle');
        }

        // get gradient
        $gradient = false;
        if(get_field('hso_single_event_settings_gradient')){
            $gradient = (get_field('hso_single_event_settings_gradient') == "on" ? true : false);
        }
    ?>

    <div id="header-image" {{ $header_image_style }} class="{{ $gradient ? 'shadow' : '' }}">
        <div class="container">
            <div class="grid">
                <div class="grid-sm-12 col">
                    <div class="bottom">
                        <h1 class="title" style="color: {{ $color  }} !important">{{ get_the_title() }}</h1>
                        @if($subtitle)
                            <h3 class="sub-title" style="color: {{ $color  }} !important">{{ $subtitle }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($event_data['transtickets']))
    <div id="header-line">
        <div class="container">
            <div class="grid">
                <div class="grid-sm-12">
                    <ul>
                    <?php $dates = array(); ?>
                    @foreach($event_data['transtickets'] as $transticket)
                        <?php $dates[] = date('d/m',strtotime($transticket['eventdate'])); ?>
                    @endforeach
                    @if($dates)
                        <li>
                            <strong>Konsertdatum: </strong><span>{{ implode(', ',$dates) }}</span>
                        </li>
                    @endif

                    <?php
                        // retrive first item tags
                        $transticket_first = $event_data['transtickets'][0];
                        $tags_string = "";
                        if($transticket_first){
                            if(isset($transticket_first['tags']) && !empty($transticket_first['tags'])){
                                $tags = $transticket_first['tags'];

                                $tags_string = array();
                                foreach ($tags as $tag){
                                    if(isset($tag['name']) && !empty($tag['name']))
                                        $tags_string[] = $tag['name'];
                                }

                                if($tags_string){
                                    $tags_string = implode(", ",$tags_string);
                                }
                            }
                        }
                    ?>
                    @if($tags_string)
                    <li><strong>Ingår i: </strong>  {{ $tags_string }}</li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="container main-container">
        @include('partials.breadcrumbs')

        <div class="grid">
            <div class="grid-md-12 grid-lg-9">
                <div class="grid">
                    <div class="grid-sm-12">
                        @include('partials.accessibility-menu')

                        {!! the_post() !!}
                        @include('partials.blog.type.post-single')
                    </div>
                </div>
            </div>
            <aside class="grid-lg-3 grid-md-12 sidebar-right-sidebar">
                <div class="box" id="transticket-box">
                    <h4 class="box-title">{{ the_title() }}</h4>
                    <div class="box-content">
                        @if(isset($event_data['transtickets']))

                            <?php
                                // retrive first transtickets
                                $first_transticket = $event_data['transtickets'][0];
                            ?>

                            @if($first_transticket)
                                <?php
                                    // retrive field values
                                    $seated_max_price = "N/A";
                                    if(isset($first_transticket['prices']) && !empty($first_transticket['prices'])){
                                        $seated_max_price = $first_transticket['prices'][0]['seatedmaxprice'];

                                        // format number as currency
                                        $seated_max_price = money_format('%.2n', $seated_max_price)." kr*";
                                    }

                                    $venuename = "N/A";
                                    if(isset($first_transticket['venuename']) && !empty($first_transticket['venuename'])){
                                        $venuename = $first_transticket['venuename'];
                                    }


                                    $speltid = get_field("speltid");
                                    if($speltid == ""){
                                        $speltid = "N/A";
                                    }

                                    $upptakt = get_field("upptakt");
                                    if($upptakt == ""){
                                        $upptakt = "N/A";
                                    }

                                ?>
                                <ul id="first-transticket-detail">
                                    <li><strong>Biljettpris: </strong>{{ $seated_max_price  }}</li>
                                    <li><strong>Biljettstatus: </strong>N/A</li>
                                    <li><strong>Speltid: </strong>{{ $speltid }}</li>
                                    <li><strong>Scen: </strong>{{ $venuename }}</li>
                                    <li><strong>Upptakt: </strong>{{ $upptakt }}</li>
                                </ul>
                                <p class="notes">{{ get_field("info_text_biljett") }}</p>
                            @endif

                            <h2>Konsertdatum</h2>
                            <ul class="consert-list">
                                @foreach($event_data['transtickets'] as $transticket)
									<li>
										<span>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
											<span>Ons {{ date('d/m',strtotime($transticket['eventdate'])) }}</span> <span>{{ date('H.i',strtotime($transticket['eventdate'])) }}</span>
										</span>
										<a target="_blank" href="http://helsingborgskonserthus.ebiljett.nu/Home/tickets/{{ $transticket['id'] }}/False">KÖP</a>
										<div class="clear"></div>
									</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

@stop
