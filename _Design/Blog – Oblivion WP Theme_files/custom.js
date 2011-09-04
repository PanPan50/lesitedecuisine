
// Smooth Scroll
$(function(){
 
    $('a[href*=#]').click(function() {
 
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        && location.hostname == this.hostname) {
 
            var $target = $(this.hash);
 
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
 
            if ($target.length) {
 
                var targetOffset = $target.offset().top;
 
                $('html,body').animate({scrollTop: targetOffset},{duration:1200, easing: 'easeInOutExpo'});
 
                return false;
 
            }
 
        }
 
    });
 
});

$(function() {
	$(".gotop").css("display","none");

	$(window).scroll(function() {
		if ($(this).scrollTop() == 0) {
			$(".gotop:visible").fadeOut();
		}
		else {
			$(".gotop:hidden").fadeIn();
		}
	});

});

// Portolio hover state
$(function() {
	$(".hover_choice").css("display","none");
	$(".portfolio_item").hover(function(){
		$(this).find(".hover_choice").stop().animate({opacity: "1"}, 150).show();
		$(this).find("h5").stop().animate({top: "-25px"}, 70);
	},
	function(){
		$(this).find(".hover_choice").stop().animate({opacity: "0"}, 150).show();
		$(this).find("h5").stop().animate({top: "20px"}, 70);
	});
});

// Tabs
$(function() {
		$(".tabs a:first").addClass("selected");
		
		$(".tabs a").click(function () {
			
			if ($(this).hasClass("selected")){ }
			else {
			// switch all tabs off
			$(".selected").removeClass("selected");
			
			// switch this tab on
			$(this).addClass("selected");
			
			// slide all content up
			$(".tab-content").slideUp(50);
			
			// slide this content up
			var content_show = $(this).attr("rel");
			$("#"+content_show).slideDown(100);
			}
		});;
 
});

// Slider
$(function() {

	//Set Default State of each portfolio piece
	$(".paging").show();
	$(".paging a:first").addClass("active");
		
	//Get size of images, how many there are, then determin the size of the image reel.
	var imageWidth = $(".window").width();
	var imageSum = $(".image_reel img").size();
	var imageReelWidth = imageWidth * imageSum;
	
	//Adjust the image reel to its new size
	$(".image_reel").css({'width' : imageReelWidth});
	
	//Paging + Slider Function
	rotate = function(){	
		var triggerID = $active.attr("rel") - 1; //Get number of times to slide
		var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

		$(".paging a").removeClass('active'); //Remove all active class
		$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)
		
		//Slider Animation
		$(".image_reel").animate({ 
			left: -image_reelPosition
		}, 500 );
		
	}; 
	
	//Rotation + Timing Event
	rotateSwitch = function(){		
		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			$active = $('.paging a.active').next();
			if ( $active.length === 0) { //If paging reaches the end...
				$active = $('.paging a:first'); //go back to first
			}
			rotate(); //Trigger the paging and slider function
		}, 7000); //Timer speed in milliseconds (3 seconds)
	};
	
	rotateSwitch(); //Run function on launch
	
	//On Hover
	$(".image_reel a").hover(function() {
		clearInterval(play); //Stop the rotation
	}, function() {
		rotateSwitch(); //Resume rotation
	});	
	
	//On Click
	$(".paging a").click(function() {	
		$active = $(this); //Activate the clicked paging
		//Reset Timer
		clearInterval(play); //Stop the rotation
		rotate(); //Trigger rotation immediately
		rotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});	
	
});

//Accordion
$(function() {
	
	$('.accordionButton').click(function() {

		$('.accordionButton').removeClass('on');
		  
	 	$('.accordionContent').slideUp('normal');
   
		if($(this).next().is(':hidden') == true) {
			
			$(this).addClass('on');
			  
			$(this).next().slideDown('normal');
		 } 
		  
	 });
	
	$('.accordionButton').mouseover(function() {
		$(this).addClass('over');
		
	}).mouseout(function() {
		$(this).removeClass('over');										
	});
	$('.accordionContent').hide();

});

// Images fade animation
$(function(){
	$(".fadeload").hover(function(){
		$(this).stop().animate({opacity: "0.2"}, 350);
	},
	function(){
		$(this).stop().animate({opacity: "1"}, 125);
	});
});

// fade message
$(function(){
	$(".fademessage").animate({opacity: "1"}, 1000).animate({opacity: "0"}, 350).slideUp(150);
});


$(function(){
	$(".social_links a").css({opacity: "0.3"});
	$(".social_links a").hover(function(){
		$(this).animate({opacity: "1"},{queue:false, duration:250});
	},
	function(){
		$(this).animate({opacity: "0.3"},{queue:false, duration:250});
	});
});

$(function(){
	$(".folio_infos").css({opacity: "0"});
	$(".portfolio_item").hover(function(){
		$(this).find(".folio_infos").animate({opacity: "1"},{queue:false, duration:250});
	},
	function(){
		$(this).find(".folio_infos").animate({opacity: "0"},{queue:false, duration:250});
	});
});



$(function(){
	$(".flickr_stream img").hover(function(){
		$(".flickr_stream img").animate({opacity: "0.3"},{queue:false, duration:250});
		$(this).animate({opacity: "1"},{queue:false, duration:250});
	},
	function(){
		$(".flickr_stream img").animate({opacity: "1"},{queue:false, duration:250});
	});
});

// Remove line on First and Last li
$(function() {	
		$("#sidebar ul").find("li:first").css("border-top", "none");
		$("#sidebar ul").find("li:last").css("border-bottom", "none");
});

// DROPDOWN MENU
$(function(){						   
	$("#top_menu ul ul").css({display: "none"});
	$("#top_menu ul ul ul").css({display: "none"});
	$('#top_menu ul>li').hover(function(){
		$(this).find('ul').delay(300).slideDown(170);
	}, 
	function () {
		$(this).find('ul').delay(300).stop(true, true).slideUp(100);
	});
});



$(function(){
		   
	if((document.all)&&(navigator.appVersion.indexOf("MSIE 7.")!=-1)){
	
		$(".filter_list ul li a").click(function(){
		filteris = $(this).attr("title");
		
		$(".filter_list ul li a").removeClass("current");
		$(this).addClass("current");
		
		
		if(filteris == "all") {
			$(".portfolio_item").show();
		}
		else {
			  $(".portfolio_item").hide();
			  $('#portfolio .'+filteris).show();
		}
		
	});
		
	} else {
		
	$(".filter_list ul li a").click(function(){
		filteris = $(this).attr("title");
		
		$(".filter_list ul li a").removeClass("current");
		$(this).addClass("current");
		
		
		if(filteris == "all") {
			$(".portfolio_item").animate({ opacity: '0' }, {
			queue:false,
			duration: 300,
			complete: function() {
			  $(".portfolio_item").animate({ opacity: '1' },{queue:false, duration:450}).show();
			}
		});
		}
		else {
		$(".portfolio_item").animate({ opacity: '0' }, {
			queue:false,
			duration: 300,
			complete: function() {
			  $(".portfolio_item").css("display","none");
			  $('#portfolio .'+filteris).animate({ opacity: '1' },{queue:false, duration:450}).show();
			}
		});
		}
		
	});
	
	}
});


$(function(){
	$('.hidden').css("display", "none");
	$(".toggler h4").hover(function() {
		$(this).css("cursor","pointer");
	});
	$(".toggler h4").click(function() {
		$(this).parent().children('.hidden').slideToggle(200);
	});
});

// Captcha system
$(function(){
$("#errorcaptcha").css({opacity: "0"});
$("#check").keyup(function () {
		var rep = $(this).val();
		var n1 = document.getElementById('num1').innerHTML;
		var n2 = document.getElementById('num2').innerHTML;
		var n3 = parseInt(n1) + parseInt(n2);
      		if( n3 == rep ){
			$("#submitter").prepend('<input type="submit" name="contact_submit" id="contact_submit" value="Send Now" />').animate({opacity: "1"},{duration:350});
			$("#errorcaptcha").text(" ").animate({opacity: "0"},{duration:150});
		}
		else {
			$("#errorcaptcha").text("Not good!").animate({opacity: "1"},{duration:350});
			$("#submitter").prepend('').animate({opacity: "0"},{duration:150}).empty();
		}
    });
});


// PrettyPhoto Setting
$(function() {	
	$("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'dark_rounded'}); 
});
// Forms Validator
$(function() {
	$("#contact-form").validate();
	$("#commentform-reply").validate();
});