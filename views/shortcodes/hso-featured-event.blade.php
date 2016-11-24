<?php
// retrive featured event
$featured_event = get_field('featured_event','option');
if($featured_event){
    $event = new HSOEventManager\Event();
    $featured_event = $event->get_event($featured_event);
}
?>
@if($featured_event)
<?php
    // featured image of featured event
    $featured_image = "";
    if(has_post_thumbnail($featured_event['id'])){
        $thumb_id = get_post_thumbnail_id($featured_event['id']);
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
        $featured_image = $thumb_url_array[0];
    }

?>
<div id="carousal">
    <h1 class="carousal-title">Hetast just nu</h1>
    <div class="carousal-container" style="background-image: url('{{  $featured_image != "" ? $featured_image : "" }}')">
        <div class="content">
            <div class="top">
                @if(isset($featured_event['transtickets']) && !empty($featured_event['transtickets']))
                    <div class="date-time">
                        @foreach($featured_event['transtickets'] as $transticket)
                            <p>
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <span>{{ date('H.i',strtotime($transticket['eventdate'])) }}</span> TDR <span>{{ date('d M',strtotime($transticket['eventdate'])) }}</span>
                            </p>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="bottom">
                <h1 class="title">{{ $featured_event['title'] }}</h1>
                <p class="description">
                    <?php
                    // get trimmed content
                    if($featured_event['content'] != ""){
                        $event_content = wp_trim_excerpt($featured_event['content']);
                        echo wp_trim_words($event_content,25,' [...]');
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
@endif