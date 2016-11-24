@extends('templates.master')

@section('startboxes')
    <div id="start-boxes">
        <a href="#main-content">
            <span class="btn-bottom">
                <i class="fa fa-angle-down"></i>
            </span>
        </a>
        <div class="grid">
            {{-- # First box # --}}
            <div class="grid-md-4 single-start-box-item">
                <?php
                    $image = wp_get_attachment_image_src(get_field('image_1','option'),'full');
                ?>
                <div class="image" style="background-image: url('{{  $image[0] }}');">
                    <div class="content">
                        <h3 class="subtitle">{{ get_field('subtitle_1','option')  }}</h3>
                        <h1 class="title">{{ get_field('title_1','option')  }}</h1>
                        <a class="link first" href="{{ get_field('link_1','option') ?: "#"  }}">{{ get_field('link_text_1','option') ?: "Läs mer"  }}</a>
                    </div>
                </div>
            </div>

            {{-- # Second box # --}}
            <div class="grid-md-4 single-start-box-item">
                <?php
                $image = wp_get_attachment_image_src(get_field('image_2','option'),'full');
                ?>
                <div class="image" style="background-image: url('{{  $image[0] }}');">
                    <div class="content">
                        <h3 class="subtitle">{{ get_field('subtitle_2','option')  }}</h3>
                        <h1 class="title">{{ get_field('title_2','option')  }}</h1>
                        <a class="link" href="{{ get_field('link_2','option') ?: "#"  }}">{{ get_field('link_text_2','option') ?: "Läs mer"  }}</a>
                    </div>
                </div>
            </div>

            {{-- # Third box # --}}
            <div class="grid-md-4 single-start-box-item">
                <?php
                $image = wp_get_attachment_image_src(get_field('image_3','option'),'full');
                ?>
                <div class="image" style="background-image: url('{{  $image[0] }}');">
                    <div class="content">
                        <h3 class="subtitle">{{ get_field('subtitle_3','option')  }}</h3>
                        <h1 class="title">{{ get_field('title_3','option')  }}</h1>
                        <a class="link" href="{{ get_field('link_3','option') ?: "#"  }}">{{ get_field('link_text_3','option') ?: "Läs mer"  }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scroll-btn')
    {{-- # Scroll Btn # --}}
    @if(get_field('music_files', 'option'))
        <div id="jplayer"></div>
        <div id="jplayer-items">
            @foreach(get_field('music_files', 'option') as $music_item)
                <input type="hidden" name="music_files[]" data-title="{{ $music_item['music_file']['title'] }}" value="{{ $music_item['music_file']['url'] }}">
            @endforeach
        </div>
        <div id="player-container">
            <div class="left-controls">
                <ul>
                    <li><a href="javascript:void(0)" id="previous"><i class="fa fa-backward" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)" class="play jp-play" id="play"><i class="fa fa-play" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)" id="next"><i class="fa fa-forward" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <div class="progress-container">
                <div class="minutes left jp-current-time" id="current-time">0:00</div>
                <div class="progress-slider progress"></div>
                <div class="minutes right jp-duration" id="end-time">0:00</div>
            </div>

            <div class="right-controls">
                <ul>
                    <li><a href="javascript:void(0)" id="volume"><i class="fa fa-volume-up" aria-hidden="true"></i></a></li>
                </ul>
                <div class="title-container">
                    Nu spelas:
                    <p>-</p>
                </div>
            </div>
        </div>
    @endif
@stop

@section('content')
@if (is_active_sidebar('content-area'))
<section class="creamy creamy-border-bottom gutter-xl gutter-vertical sidebar-content-area">
    <div class="container">
        <div class="grid">
            <?php dynamic_sidebar('content-area'); ?>
        </div>
    </div>
</section>
@endif

<div class="container">
    <div class="grid">
        <div class="grid-sm-12">
            {!! do_shortcode('[hso-events]') !!}
        </div>
    </div>
</div>


@stop


@section('whatsup-section')
    <!--<div class="container">
        <div id="whatsup">
            <div class="grid">
                <div class="grid-sm-3">
                    {!-- do_shortcode('[hso_featured_post]') --!}
                </div>
                <div class="grid-sm-6">
                    {!-- do_shortcode('[hso_featured_event]') --!}
                </div>
                <div class="grid-sm-3">
                    {!-- do_shortcode('[hso_socialmedia_feed]') --!}
                </div>
            </div>
        </div>
    </div>-->
@stop
