@extends('templates.master')

@section('content')

@include('partials.archive-filters')

<?php
$header_image_style = "style=background-color:#7492a5";
// set fatured image
if(get_field('blog_image','option')){
    $image_array = get_field('blog_image','option');
    $header_image_style = "style=background-image:url(".$image_array['url'].")";
}
?>

<div id="header-image" {{ $header_image_style }}>
    <div class="container">
        <div class="grid">
            <div class="row-sm-12 col">
                <div class="bottom">
                    <?php if(get_field('blog_image','option')): ?>
                        <h1 class="title color-white"><?php echo get_field('blog_title','option')  ?></h1>
                    <?php endif; ?>
                    <?php if(get_field('blog_subtitle','option')): ?>
                        <h3 class="sub-title color-white"><?php echo get_field('blog_subtitle','option')  ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container main-container">
    @include('partials.breadcrumbs')

    <div class="grid">
        @if (get_field('archive_' . sanitize_title(get_post_type()) . '_show_sidebar_navigation', 'option'))
            @include('partials.sidebar-left')
        @endif

        <?php
            $cols = 'grid-md-12';
            if (is_active_sidebar('right-sidebar') && get_field('archive_' . sanitize_title(get_post_type()) . '_show_sidebar_navigation', 'option')) {
                $cols = 'grid-md-8 grid-lg-6';
            } elseif (is_active_sidebar('right-sidebar') || get_field('archive_' . sanitize_title(get_post_type()) . '_show_sidebar_navigation', 'option')) {
                $cols = 'grid-md-12 grid-lg-9';
            }
        ?>

        <div class="{{ $cols }}">

            @if (!is_single() && is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif


            <div class="grid">
                @while(have_posts())
                    {!! the_post() !!}

                    @if (in_array($template, array('full', 'compressed', 'collapsed')))
                        <div class="grid-xs-12 post">
                            @include('partials.blog.type.post-' . $template)
                        </div>
                    @else
                        @include('partials.blog.type.post-' . $template)
                    @endif
                @endwhile
            </div>

            @if (!is_single() && is_active_sidebar('content-area'))
                <div class="grid sidebar-content-area sidebar-content-area">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            @endif

            <div class="grid">
                <div class="grid-sm-12 text-center">
                    {!!
                        paginate_links(array(
                            'type' => 'list'
                        ))
                    !!}
                </div>
            </div>
        </div>

        @include('partials.sidebar-right')
    </div>
</div>

@stop
