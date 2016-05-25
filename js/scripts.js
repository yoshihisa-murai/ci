/*
	scripts.js
	
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	
	Copyright: (c) 2013 Alexander "Alx" Agnarson, http://alxmedia.se
	alx-tabs,alx-posts,alx-video widgets include
*/
/* load
/* ------------------------------------ */
jQuery(window).load(function() {
	

	
	
/*  loading
/* ------------------------------------ */		
jQuery('#loading').fadeOut(500);

});


jQuery(document).ready(function($) {

/*  responcived image trimming
/* ------------------------------------ */
$(".img-liquid").imgLiquid();

/*  parallax
/* ------------------------------------ */
 $('.parallax').scrolly({bgParallax: true});

/*  drawer menu
/* ------------------------------------ */
    $('#menu').mmenu({
        //extensions	: [ 'effect-slide-menu', 'pageshadow' ],
        searchfield : false, counters : true, 
    });	
	
/*  iframe-content
/* ------------------------------------ */
    $(".entry-inner iframe").wrap("<div class=\"iframe-content\" />");
	
	
/*  Scroll to top
/* ------------------------------------ */
 var showFlag = false;
    var topBtn = $('#page-top');    
    topBtn.css('bottom', '-100px');
    var showFlag = false;
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            if (showFlag == false) {
                showFlag = true;
                topBtn.stop().animate({'bottom' : '20px'}, 200); 
            }
        } else {
            if (showFlag) {
                showFlag = false;
                topBtn.stop().animate({'bottom' : '-100px'}, 200); 
            }
        }
    });
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });


/*  fix header
/* ------------------------------------ */	
	jQuery(window).scroll(function () {


		var ScrTop = jQuery(document).scrollTop();
				if (ScrTop > 80) {
			jQuery('header').css({'background-color':'rgba(0,0,0,1.0)'});
			jQuery('.nav>li>a').css({'padding':'10px 0 27px 0'});
			jQuery('#logo-small').css({'height':'58px'});
			jQuery('.toggle-search').css({'top':'13px'});
						}
		if (ScrTop < 80) {
			jQuery('header').css({'background-color':'rgba(0,0,0,0.80)'});
			jQuery('.nav>li>a').css({'padding':'30px 0'});
			jQuery('#logo-small').css({'height':'80px'});
			jQuery('.toggle-search').css({'top':'25px'});
		}			
	   });	 
	
	
/* addClass
/* ------------------------------------ */
		jQuery(".item img").addClass("transform01");
		jQuery(".post-item-category a,.post-item-tags a").addClass("hvr-bounce-to-right");
		jQuery(".tagcloud a").addClass("hvr-icon-wobble-vertical");
 		jQuery(".post-row,.feature_meta h2").addClass("wow fadeInDown");
 		jQuery(".feature_description").addClass("fadeInUp wow");
 

		
		
/*  Toggle header search
/* ------------------------------------ */
	$('.toggle-search').click(function(){
		$('.toggle-search').toggleClass('active');
		$('.search-expand').fadeToggle(250);
            setTimeout(function(){
                $('.search-expand input').focus();
            }, 300);
	});
	

	
	
/*  Tabs widget
/* ------------------------------------ */	
	(function() {
		var $tabsNav       = $('.alx-tabs-nav'),
			$tabsNavLis    = $tabsNav.children('li'),
			$tabsContainer = $('.alx-tabs-container');

		$tabsNav.each(function() {
			var $this = $(this);
			$this.next().children('.alx-tab').stop(true,true).hide()
			.siblings( $this.find('a').attr('href') ).show();
			$this.children('li').first().addClass('active').stop(true,true).show();
		});

		$tabsNavLis.on('click', function(e) {
			var $this = $(this);

			$this.siblings().removeClass('active').end()
			.addClass('active');
			
			$this.parent().next().children('.alx-tab').stop(true,true).hide()
			.siblings( $this.find('a').attr('href') ).fadeIn();
			e.preventDefault();
		}).children( window.location.hash ? 'a[href=' + window.location.hash + ']' : 'a:first' ).trigger('click');

	})();
	
/*  Comments / pingbacks tabs
/* ------------------------------------ */	
    $(".comment-tabs li").click(function() {
        $(".comment-tabs li").removeClass('active');
        $(this).addClass("active");
        $(".comment-tab").hide();
        var selected_tab = $(this).find("a").attr("href");
        $(selected_tab).fadeIn();
        return false;
    });

/*  Table odd row class
/* ------------------------------------ */
	$('table tr:odd').addClass('alt');

/*  Sidebar collapse
/* ------------------------------------ */
	$('body').addClass('s1-collapse');
	$('body').addClass('s2-collapse');
	
	$('.s1 .sidebar-toggle').click(function(){
		$('body').toggleClass('s1-collapse').toggleClass('s1-expand');
		if ($('body').is('.s2-expand')) { 
			$('body').toggleClass('s2-expand').toggleClass('s2-collapse');
		}
	});
	$('.s2 .sidebar-toggle').click(function(){
		$('body').toggleClass('s2-collapse').toggleClass('s2-expand');
		if ($('body').is('.s1-expand')) { 
			$('body').toggleClass('s1-expand').toggleClass('s1-collapse');
		}
	});

/*  Dropdown menu animation
/* ------------------------------------ */
	$('.nav ul.sub-menu').css('opacity', '0');
	$('.nav > li').hover( 
	
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"1.0","margin-top":"-3px"})
		}, 
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"0"})
		}
	);
		$('.nav ul > li').hover( 
	
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"0.95","top":"0px"})
		}, 
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"0","top":"0px"})
		}
	);
	

	
		$('#nav-footer .nav > li').hover( 
	
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"1.0","bottom":"40px"})
		}, 
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"0","bottom":"36px"})
		}
	);
		$('#nav-footer .nav ul > li').hover( 
	
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"1","bottom":"0px"})
		}, 
		function() {
			$(this).children('ul.sub-menu').css({"opacity":"0","bottom":"36px"})
		}
	);



/*  owl slider  -Advanced Slider Widget-
/* ------------------------------------ */		
	 var owl = jQuery(".owl");
      owl.owlCarousel({        
        itemsCustom : [
          [0, 2],
          [480, 3],
          [1000, 4]
        ],
		autoPlay : 10000,
	 autoHeight : true,

      });
	  
	 var owl2 = jQuery(".owl2");
      owl2.owlCarousel({        
        itemsCustom : [
          [0, 2],
          [480, 3],
        ],
		autoPlay : 10000,
	 autoHeight : true,

      });
/* ------------------------------------ */		  
	  
    });
	

  
  