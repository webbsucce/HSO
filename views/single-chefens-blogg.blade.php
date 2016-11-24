@extends('templates.master')

@section('content')

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
        <div class="grid-md-12 grid-lg-9">
            @if (is_single() && is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            <div class="grid">
                <div class="grid-sm-12">
                        {!! the_post() !!}

                        @include('partials.blog.type.post-single')
                </div>
            </div>

            @if (is_single() && comments_open())
                <div class="grid">
                    <div class="grid-sm-12">
                        @include('partials.blog.comments-form')
                    </div>
                </div>
                <div class="grid">
                    <div class="grid-sm-12">
                        @include('partials.blog.comments')
                    </div>
                </div>
            @endif
        </div>

        @include('partials.sidebar-right')
    </div>
</div>

@stop