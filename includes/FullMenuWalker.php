<?php
class FullMenuWalker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if (array_search('menu-item-has-children', $item->classes)) {
            $first_item_class = $item->menu_order == 1 ? "<li class='grid-lg-1'></li>" : "";
            $output .= sprintf("\n$first_item_class<li class='grid-lg-2 grid-md-4 grid-sm-6 grid-xs-12 %s'><div class='desktop-menu-section'><h2 href='javascript:;' class=\"title\" >%s</h2>\n", ( array_search('current-menu-item', $item->classes) || array_search('current-page-parent', $item->classes) ) ? 'active' : '', $item->title
            );
        } else {
            $output .= sprintf("\n<li %s><a href='%s'>%s</a>\n", ( array_search('current-menu-item', $item->classes) ) ? '' : '', $item->url, $item->title
            );
        }
    }

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }
}