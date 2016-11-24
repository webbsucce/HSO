<div id="header">
    @include('partials.header.attention')
    @include('partials.header.search-bar')
    <div class="container">
        <div class="logo-container">
            <a href="{{ home_url() }}">
                {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), true, get_field('header_tagline_enable', 'option')) !!}
            </a>
        </div>
        <div class="menu-container">
            <div class="menu-sub">
                {!!
                    wp_nav_menu(array(
                        'walker' => new QuickMenuWalker(),
                        'theme_location' => 'quick-menu-sub',
                        'menu' => 'ul',
                        'menu_class' => 'quick-menu-sub',
                        'menu_id' => 'menu',
                        'container' => false
                    ))
                !!}
                <?php $social_media_items = get_field("hso_options_social_media_field" , "option"); ?>
                @if($social_media_items)
                    <ul class="social-menus">
                        @foreach($social_media_items as $item)
                            <li><a href="{{ $item['link'] }}" alt="{{ $item['title'] }}"><i class="{{ $item['icon'] }}" aria-hidden="true"></i></a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="menu-main">
                {!!
                    wp_nav_menu(array(
                        'walker' => new QuickMenuWalker(),
                        'theme_location' => 'quick-menu',
                        'menu' => 'ul',
                        'menu_class' => 'quick-menu',
                        'menu_id' => 'menu',
                        'container' => false
                    ))
                !!}
                <ul id="quick-menu-buttons">
                    <li><a href="#translate" class="translate-icon-btn" aria-label="translate"><i class="fa fa-globe"></i></a></li>
                    <li><a class="btn-search" href="javascript:void(0)"  data-tooltip="Search"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

{{-- # Fixed header menu after scroll # --}}
<div id="header-fixed">
    <div class="container">
        <div class="menu-container">

            <a href="javascript:void(0)" class="menu-link btn-menu"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Meny</a>
            {!!
                wp_nav_menu(array(
                    'walker' => new QuickMenuWalker(),
                    'theme_location' => 'quick-menu',
                    'menu' => 'ul',
                    'menu_class' => 'quick-menu',
                    'menu_id' => 'menu',
                    'container' => false
                ))
            !!}
            <ul id="quick-menu-buttons">
                <li><a href="#translate" class="translate-icon-btn" aria-label="translate"><i class="fa fa-globe"></i></a></li>
                <li><a class="btn-search btn-menu" href="javascript:void(0)"  data-tooltip="Search"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div id="desktop-menu">
    <button class="btn-close"><i class="fa fa-close"></i> Stäng</button>
    <div class="container">

        <div class="grid">
            <div class="grid-sm-12">
                <div class="logo-container">
                    <img src="{{ get_stylesheet_directory_uri() . "/assets/dist/images/footer_image_1.png" }}" alt="">    
                </div>
            </div>
        </div>

        <!-- Search box for general menu open -->
        <div class="grid">
            <div class="grid-sm-2"></div>
            <div class="grid-sm-8">
                <form class="search" method="get" action="/">
                    <input id="search-keyword" autocomplete="off" class="form-control form-control-lg" type="search" name="s" placeholder="Sök efter konsert eller sida...">
                    <input type="submit" class="btn btn-primary btn-lg" value="Sök">
                </form>
            </div>
        </div>
        

        <!-- Empty mobile menu container to append mobile menu when its generated -->
        <div id="mobile-menu-container"></div>
        <div class="mobile-menu">
            {!!
                wp_nav_menu(
                    array (
                        'theme_location'  => 'mobile-menu',
                        'depth' => 3,
                    )
                )
            !!}
        </div>
        <div class="desktop-menu">
            {!!
                wp_nav_menu(
                    array (
                        'theme_location'  => 'full-menu',
                        'walker' => new FullMenuWalker(),
                        'depth' => 3,
                        'container' => 'div',
                        'container_class' => 'footer-menu',
                        'menu' => 'div',
                        'menu_class' => 'grid'
                    )
                )
            !!}
        </div>
        <div class="social-media-icons-container">
            <?php $social_media_items = get_field("hso_options_social_media_field" , "option"); ?>
            @if($social_media_items)            
                <label>Följ oss på social media</label>
                <ul class="social-menus">
                    @foreach($social_media_items as $item)
                        <li><a href="{{ $item['link'] }}" alt="{{ $item['title'] }}"><i class="{{ $item['icon'] }}" aria-hidden="true"></i></a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@include('partials.header.translate')