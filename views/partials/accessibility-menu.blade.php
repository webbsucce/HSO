<ul class="nav nav-help nav-accessibility nav-horizontal hidden-print rs_skip rs_preserve">
	@if(get_field("show_hide_readspeaker") !== false || get_field("show_hide_readspeaker") === NULL)
	    @if (function_exists('ReadSpeakerHelper_playButton'))
	    <li>
	        {!! ReadSpeakerHelper_playButton() !!}
	    </li>
	    @endif
    @endif

    @if(get_field("show_hide_print") !== false || get_field("show_hide_print") === NULL)
    <li>
        <a href="#" onclick="window.print();return false;" class=""><i class="pricon pricon-print"></i> Skriv ut</a>
    </li>
    @endif
</ul>

@if (function_exists('ReadSpeakerHelper_player'))
    {!! ReadSpeakerHelper_player() !!}
@endif
