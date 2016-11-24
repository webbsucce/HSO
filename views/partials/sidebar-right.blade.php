@if ($hasRightSidebar)
<aside class="grid-lg-3 grid-md-12 sidebar-right-sidebar">
    <?php $navigation_field = get_field('nav_sub_enable', 'option'); ?>
    @if ($navigation_field)
        <?php $count = substr_count($navigation['sidebarMenu'],'<li'); ?>
        @if($count > 1)
            {!! $navigation['sidebarMenu'] !!}
        @endif
    @endif

    @if (is_active_sidebar('right-sidebar') || (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters)))
    <div class="grid">
        @if (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters))
            @include('partials.blog.taxonomy-filters')
        @endif

        <?php dynamic_sidebar('right-sidebar'); ?>
    </div>
    @endif
</aside>
@endif