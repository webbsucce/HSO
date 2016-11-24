var HSOChild = {};

jQuery(document).ready(function($){

	/*
	 * Event isotope
	*/
	var $grid = $('#event-section #items').isotope({
		// options
		itemSelector: '.item',
		layoutMode: 'fitRows',
		isFitWidth: true
	});


	$("#event-section #items .item").on("mouseenter",function(){
		var item = $(this);
		item.stop().transition({
	  		y:'-=4'
		});
	});
	$("#event-section #items .item").on("mouseleave",function(){
		var item = $(this);
		item.stop().transition({
	  		y:'+=4'
		});
	});

	

	var do_filter = function(){
		var $filters = $("#event-section #filters");
		var filters = [];
		$filters.find("li").each(function(idx, li) {
			var $li = $(li);
			if($li.hasClass("active")){

				// get filter name
				var filterValue = "."+$li.find("a").attr('data-filter');
				filters.push(filterValue);
			}
		});

		filters = filters.join(", ");

		if(filters != "")
			$grid.isotope({ filter: filters })
		else
			$grid.isotope({ filter: "*" })
	};

	// isotope change layout
	$("#event-section .view-selector .layout").on("click",function(){
		var view = $(this).data("layout");

		if(view == "grid-layout"){
			$("#items.grid-layout").css("display","block");
			$("#items.list").css("display","none");
		}else{
			$("#items.grid-layout").css("display","none");
			$("#items.list").css("display","block");
		}

		// Change active item 
		$(this).closest("li").closest("ul").find(".active").removeClass("active");
		$(this).closest("li").addClass("active");

		// regenerate isoteop
		$grid.isotope('destroy');
		$grid = $('#event-section #items').isotope({
			// options
			itemSelector: '.item',
			layoutMode: 'fitRows'
		});
		do_filter();
	})

	// filter items on button click
	$('#event-section #filters a').on( 'click', function() {

		// add active class
		//$(this).closest("li").closest("ul").find(".active").removeClass("active");
		$(this).closest("li").toggleClass("active");
		do_filter();

		if($("#filters").find(".active").length > 0){
			$("#filters").find(".reset-button-container").removeClass("hidden-display").addClass("visible-block");
		}else{
			$("#filters").find(".reset-button-container").removeClass("visible-block").addClass("hidden-display");
		}

	});

	// filter reset button click

	$("#filters .reset-button-container button").on("click",function(){
		$.each($("#filters").find(".active"),function(i,v){
			$(this).removeClass("active");
		});

		// filter again
		do_filter();

		$("#filters .reset-button-container").addClass("hidden-display");
	});



	// Mobile filters
	$('#event-section #filters .date-filter-container button').on( 'click', function() {
		$(this).closest(".date-filter-container").toggleClass("active");
		if($(this).closest(".date-filter-container").hasClass("active")){
			$(this).html("Stäng datum filter");
		}else{
			$(this).html("Välj datum");
		}
	});
	$('#event-section #filters .tag-filter-container button').on( 'click', function() {
		$(this).closest(".tag-filter-container").toggleClass("active");
		if($(this).closest(".date-filter-container").hasClass("active")){
			$(this).html("Stäng genre filter");
		}else{
			$(this).html("Välj genre");
		}
	}); 




	// Handle desktop menu actions
	$("#desktop-menu .btn-close").on("click",function(){
		$("#desktop-menu").fadeOut('slow');
	});

	// Open menu
	$(".quick-menu .btn-menu,#header-fixed .btn-menu").on("click",function(){
		$("#desktop-menu").hide().fadeIn('slow');
		$("#desktop-menu #search-keyword").focus();
	});

	var slicknav = $("#desktop-menu .mobile-menu .menu").slicknav({
		duplicate: false,
		label: "",
		appendTo: '#mobile-menu-container'
	});
	slicknav.slicknav('open');

	/**
	 * Handle header search button click
	 */
	$("#header #quick-menu-buttons .btn-search").on("click",function(){
		$("#header #search-bar-container").slideToggle('fast');
	});

	/**
	 * Handle header translate button click
	 */
	$("#header #quick-menu-buttons .btn-translate").on("click",function(){
	});

	/**
	 * Fixed header on scroll show
	*/

	$(window).load(function(){
		var header_height = $("#header").outerHeight();
		$(window).on("scroll", function() {
			var fromTop = $(this).scrollTop();
			$("#header-fixed").toggleClass("show", (fromTop > header_height));

			if((fromTop >= header_height)){

				// show scroll menu
				$("#header-fixed").addClass('animated slideInDown');

				// hide top menu
				$("#header").addClass('hidden');
			}else{
				$("#header-fixed").removeClass('animated slideInDown');
				// show top menu
				$("#header").removeClass('hidden');
			}
		});
	});
	

	/**
	 * Audio player script
	 */
	var audio = $('#audio')[0]; // id for audio element
	var btn_play = $('#btn-play'); // play button
	var btn_mute = $('#btn-mute'); // mute button

	$(btn_play).on("click",function(){
		// start audio
		if (audio.paused) {
			audio.play();
			// remove play, add pause
			$(btn_play).find("i").attr("class","");
			$(btn_play).find("i").addClass("fa").addClass("fa-pause");
		} else { // pause audio
			audio.pause();
			// remove pause, add play
			$(btn_play).find("i").attr("class","");
			$(btn_play).find("i").addClass("fa").addClass("fa-play");
		}
	});

	$(btn_mute).on("click",function(){

		audio.muted = !audio.muted;

		if (audio.muted) {
			$(btn_mute).find("i").attr("class","");
			$(btn_mute).find("i").addClass("fa").addClass("fa-volume-off");
		} else {
			$(btn_mute).find("i").attr("class","");
			$(btn_mute).find("i").addClass("fa").addClass("fa-volume-up");
		}
	});

	// masonary grid
	$('.masonary-grid').masonry({
	  // options
	  itemSelector: '.modularity-mod-text',
	});

	// attention cookie set
	$("[data-remodal-id=attention-modal]").find("button").on("click",function(){
		setCookie("hso-attention","true","");
	});
	$(document).ready(function(){
		var hso_attention = readCookie("hso-attention");
		if(hso_attention == "true"){}else{	 		
			if($('[data-remodal-id=attention-modal]').length > 0){				
				var modal = $('[data-remodal-id=attention-modal]').remodal();
				modal.open();
			} 
		}
	});
	function setCookie(name,value,days) {
		var expires;
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			expires = "; expires="+date.toGMTString();
		}
		else {
			expires = "";
		}
		document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}


	//Player setup
	// Local copy of jQuery selectors, for performance.
	var my_jPlayer = $("#jplayer"),
		myPlayerData,
		fixFlash_mp4, // Flag: The m4a and m4v Flash player gives some old currentTime values when changed.
		fixFlash_mp4_id, // Timeout ID used with fixFlash_mp4
		ignore_timeupdate; // Flag used with fixFlash_mp4;

	// Create the progress slider control
	$(".progress-container .progress-slider").slider({
		animate: "fast",
		max: 100,
		range: "min",
		step: 0.1,
		value : 0,
		slide: function(event, ui) {
			var sp = $("#jplayer").data().jPlayer.status.seekPercent;
			if(sp > 0) {

				// Apply a fix to mp4 formats when the Flash is used.
				if(fixFlash_mp4) {
					ignore_timeupdate = true;
					clearTimeout(fixFlash_mp4_id);
					fixFlash_mp4_id = setTimeout(function() {
						ignore_timeupdate = false;
					},1000);
				}

				// Move the play-head to the value and factor in the seek percent.
				$("#jplayer").jPlayer("playHead", ui.value * (100 / sp));
			} else {
				// Create a timeout to reset this slider to zero.
				setTimeout(function() {
					$(".progress-container .progress-slider").slider("value", 0);
				}, 0);
			}
		}
	});

	/* Playlist */
	var cssSelector = {
		jPlayer: "#jplayer",
		cssSelectorAncestor: "#player-container",
		progress: $("#jplayer .progress-container .progress"),
	};

	var playlist = [];

	$("#jplayer-items").find('input[name^="music_files"]').each(function(){
		var url = $(this).val();
        var title = $(this).data("title");

		playlist.push({
		    title:title,
			mp3: url
		});
	});

	var options = {
		swfPath: "../dist/jplayer",
		supplied: "oga, mp3",
		wmode: "window",
		muted: false,
        loop:true,
        playlistOptions: {
            loopOnPrevious: true
        },
		timeFormat:{
			showHour  : false
		},
		ready: function (event) {

			setTitle();

			// Determine if Flash is being used and the mp4 media type is supplied. BTW, Supplying both mp3 and mp4 is pointless.
			fixFlash_mp4 = event.jPlayer.flash.used && /m4a|m4v/.test(event.jPlayer.options.supplied);
		},
		timeupdate: function(event) {

			if(!ignore_timeupdate)
				$(".progress-container .progress-slider").slider("value", event.jPlayer.status.currentPercentAbsolute);



			/*var currentTime = Math.floor(event.jPlayer.status.currentTime);
			 $("#player-container .progress-container #current-time").html(currentTime);*/
		},
		play: function(event) {
			// change play icon
			$("#player-container .left-controls #play i").removeClass("fa-play").addClass("fa-pause");
			setTitle();
		},
		pause: function(event) {
			$("#player-container .left-controls #play i").removeClass("fa-pause").addClass("fa-play");
		},
		ended: function(event) {
			//my_playState.text(opt_text_selected);
		},
		loadeddata: function(event){ // calls after setting the song duration
			var currentTime = Math.floor(event.jPlayer.status.currentTime);
			var songDuration = event.jPlayer.status.duration;
		},
		volumechange:function(event){
			if(event.jPlayer.options.muted){
				$("#player-container .right-controls #volume i").removeClass("fa-volume-up").addClass("fa-volume-off");
			}else{
				$("#player-container .right-controls #volume i").removeClass("fa-volume-off").addClass("fa-volume-up");
			}
		}
	};

	var setTitle = function(){
		// set title
		$('#player-container .title-container p').empty();
		if(myPlaylist.playlist[myPlaylist.current]){
			$('#player-container .title-container p').append(myPlaylist.playlist[myPlaylist.current].title);
		}else{
			$('#player-container .title-container p').append("-");
		}

	};

	var myPlaylist = new jPlayerPlaylist(cssSelector,playlist ,options);

	// select first song
	myPlaylist.select(0); // Selects the 1st item

	//$("#inspector").jPlayerInspector({jPlayer:$("#jplayer")});

	$("#player-container .left-controls #play").on("click",function(event){
		if (my_jPlayer.data().jPlayer.status.paused == false) {
			// Its playing right now
			myPlaylist.pause();
		}else{
			myPlaylist.play();
		}
	});

	$("#player-container .right-controls #volume").on("click",function(){
		if($("#jplayer").jPlayer("option","muted")){
			my_jPlayer.jPlayer("unmute");
		}else{
			my_jPlayer.jPlayer("mute");
		}
	});

	$("#player-container .left-controls #next").on("click",function(){
		myPlaylist.next();
	});

	$("#player-container .left-controls #previous").on("click",function(){
		myPlaylist.previous();
	});
});

HSOChild = HSOChild || {};
HSOChild.ExampleNamespace = HSOChild.Liquid || {};

HSOChild.ExampleNamespace.ExampleClass = (function ($) {

	var classVariable = false;

    /**
     * Constructor
     * Should be named as the class itself
     */
	function ExampleClass() {

    }

    /**
     * Method
     */
    ExampleClass.prototype.exampleMethod = function () {

    }

	return new ExampleClass();

})(jQuery);
