<?php
    $field_title = get_field('title', $module->ID);
    $field_subtitle = get_field('subtitle', $module->ID);
    $field_gradient = get_field('gradient', $module->ID);
    $field_text_color = get_field('text_color', $module->ID);
    $field_image = get_field('image', $module->ID);
?>
<?php
    $header_image_style = "style=background-color:#7492a5";
    // set fatured image
    if($field_image){
        $header_image_style = "style=background-image:url(".$field_image['url'].")";
    }

    // get title color
    $color = "#000";
    if($field_text_color){
        $color = $field_text_color;
    }

    // get subtitle
    $subtitle = "";
    if($field_subtitle){
        $subtitle = $field_subtitle;
    }

    // get gradient
    $gradient = false;
    if($field_gradient){
        $gradient = ($field_gradient == "on" ? true : false);
    }
?>

<div id="header-image" <?php echo $header_image_style ?> class="<?php echo $gradient ? 'shadow' : '' ?>">
    <div class="container">        
        <div class="grid-sm-12 col">
            <div class="bottom">
                <h1 class="title" style="color: <?php echo $color  ?> !important"><?php echo $field_title ?></h1>
                <?php if($subtitle): ?>
                    <h3 class="sub-title" style="color: <?php echo $color  ?> !important"><?php echo $subtitle ?></h3>
                <?php endif; ?>
            </div>
        </div>        
    </div>
</div>