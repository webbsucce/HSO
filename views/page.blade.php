@extends('templates.master')

@section('content')

@include('partials.page-notification')
<div class="container main-container">

    @include('partials.breadcrumbs')
    
    <div class="grid {{ (wp_get_post_parent_id(get_the_id()) != 0) ? 'no-margin-top' : '' }}">
        @include('partials.sidebar-left')

        <div class="{{ $contentGridSize }} grid-print-12" id="readspeaker-read">

            @if (is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            @while(have_posts())
                {!! the_post() !!}
                
                @include('partials.article')
            @endwhile

            @if (is_active_sidebar('content-area'))
                <div class="grid sidebar-content-area sidebar-content-area-bottom">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            @endif

            @include('partials.page-footer')
        </div>


        @include('partials.sidebar-right')
    </div>
</div>

@stop