<?php
// check if notification is enabled
$notification_on_off = get_field("notification_on_off","option");
$notification_description = get_field("notification_description","option");
?>

@if ($notification_on_off == "on")

    @if(get_field("show_hide_notificationbar") !== false || get_field("show_hide_notificationbar") === NULL)
    <div id="notification">
        <div class="container"><div class="grid grid-table-md grid-va-middle">
                <div class="grid-fit-content"><i class="pricon pricon-info-o"></i></div>
                <div class="grid-auto"><p>{!! $notification_description !!}</p></div>
            </div>
        </div>
    </div>
    @endif

@endif