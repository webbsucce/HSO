<?php
    // check if attention is enabled
    $attention_on_off = get_field("attention_on_off","option");
    $attention_description = get_field("attention_description","option");
?>

@if ($attention_on_off == "on")

<div class="remodal" id="attention-modal" data-remodal-id="attention-modal" data-remodal-options="hashTracking: false">
    <button data-remodal-action="close" class="btn-close">Stäng</button>
    <p>{!! $attention_description !!}</p>
</div>

@endif 
