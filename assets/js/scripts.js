$( document ).ready(function() {

	var browserWindow = $(window);
	var browserH = browserWindow.height();
	var browserW = browserWindow.width();

	var secIntro = $("#hp-intro");
	var introWrapper = $("#intro-image-wrapper");

	var secServices = $("#hp-services");
	var servicesWrapper = $("#services-wrapper");

	var secAbout = $("#hp-about");
	var aboutWrapper = $("#about-image-wrapper");
	var aboutContentWrapper = $("#about-wrapper");

	var secPortfolio = $("#hp-portfolio");
	var hpSlider = $("#hp-slider");
	var hpSliderPagination = $("#slider-pagination");
	var hpSliderContent = $(".slide-info");

	var secContact = $("#hp-contact");
	var contactWrapper = $("#contact-wrapper");

	var secIntroH, introWrapperH, secServicesH, servicesWrapperH, secAboutH, aboutWrapperH, aboutContentWrapperH, hpSliderH, hpSliderPaginationH, hpSliderContentH, secContactH, contactWrapperH;

	function updateElements() {

		/* Intro */
		secIntroH = secIntro.outerHeight();
		introWrapperH = introWrapper.outerHeight(true);
		introDelta = secIntroH - introWrapperH;
		if (introDelta > 160) {
			secIntro.css("padding-top", introDelta/2 + "px");
		} else {
			secIntro.css("padding", "8em 0");
		}

		/* Services */
		secServicesH = secServices.outerHeight();
		servicesWrapperH = servicesWrapper.outerHeight(true);
		servicesDelta = secServicesH - servicesWrapperH;
		if (servicesDelta > 160) {
			secServices.css("padding-top", servicesDelta/2 + "px");
		} else {
			secServices.css("padding", "8em 0");
		}
		/* About */
		secAboutH = secAbout.outerHeight();
		aboutWrapperH = aboutWrapper.outerHeight();
		aboutDelta = secAboutH - aboutWrapperH;
		if (aboutDelta > 160) {
			secAbout.css("padding-top", aboutDelta/2 + "px");
		} else {
			secAbout.css("padding", "8em 0");
		}
		aboutContentWrapperH = aboutContentWrapper.outerHeight();
		aboutWrapDelta = aboutWrapperH - aboutContentWrapperH;
		aboutContentWrapper.css("padding-top", aboutWrapDelta/2 + "px");

		/* Portfolio */
		hpSliderH = hpSlider.outerHeight();
		hpSliderPaginationH = hpSliderPagination.outerHeight();
		hpSliderContentH = hpSliderContent.outerHeight();
		deltaPagination = (hpSliderH - hpSliderPaginationH) / 2 + "px";
		deltaSliderContent = (hpSliderH - hpSliderContentH) / 2 +"px";
		hpSliderPagination.css("margin-top", deltaPagination);
		hpSliderContent.css("margin-top", deltaSliderContent);

		/* Contact */
		secContactH = secContact.outerHeight();
		contactWrapperH = contactWrapper.outerHeight(true);
		contactDelta = secContactH - contactWrapperH;
		if (contactDelta > 160) {
			secContact.css("padding-top", contactDelta/2 + "px");
		} else {
			secContact.css("padding", "8em 0");
		}
	}

	// ON RESIZE
	browserWindow.on("resize", function() {
		updateElements();
	}).trigger("resize");

	// ON SCROLL
	$(window).on('scroll', function() {
	    var yScroll = window.pageYOffset;
	    var scrollTrigger = 75;	// set to whatever you want it to be

	    var posIntro = secIntro.offset().top;
	    var posServices = secServices.offset().top;
	    var posPortfolio = secPortfolio.offset().top;
	    var posAbout = secAbout.offset().top;
	    var posContact = secContact.offset().top;

	    var navA = $("nav a");
	    var navServices = $("#navServices");
	    var navPortfolio = $("#navPortfolio");
	    var navAbout = $("#navAbout");
	    var navContact = $("#navContact");

	    console.log("Intro offset : " + posIntro);
	    console.log("Services offset : " + posServices);
	    console.log("Portfolio offset : " + posPortfolio);
	    console.log("About offset : " + posAbout);
	    console.log("Contact offset : " + posContact);

		if ( yScroll >= posIntro && yScroll < posServices) {
			navA.removeClass("navSelected");
		} else if ( yScroll >= posServices && yScroll < posPortfolio) {
			navA.removeClass("navSelected");
			navServices.addClass("navSelected");
		} else if ( yScroll >= posPortfolio && yScroll < posAbout) {
			navA.removeClass("navSelected");
			navPortfolio.addClass("navSelected");
		} else if ( yScroll >= posAbout && yScroll < posContact) {
			navA.removeClass("navSelected");
			navAbout.addClass("navSelected");
		} else if ( yScroll >= posContact) {
			navA.removeClass("navSelected");
			navContact.addClass("navSelected");
		}

	    console.log("yScroll = " + yScroll);

	    if(yScroll > scrollTrigger) {
			//mainMenu.removeClass("main-menu");
			//mainMenu.addClass("scroll-menu");
			//logoMobile.css("opacity", 100);
	    } else {
			//mainMenu.addClass("main-menu");
			//mainMenu.removeClass("scroll-menu");
			//logoMobile.css("opacity", 0);
	    }

	    //headerHome.css("background-position", "center " + yScroll*.7 + "px");
	    //headerCS.css("background-position", "center " + yScroll*.8 + "px");
	});	

	//Scroll links
    $(".scroll").click( function(event) {

        //get the full url - like mysitecom/index.htm#home
        var full_url = this.href;
        console.log("Full URL: " + full_url);

        //split the url by # and get the anchor target name - home in mysitecom/index.htm#home
        var parts = full_url.split("#");
        var trgt = "#" + parts[1];

       console.log("Taget anchor: " + trgt);

        //get the top offset of the target anchor
        var trgt_offset = $(trgt).offset();
        var trgt_top = trgt_offset.top;
        console.log("trgt_top " + trgt_top);

        //goto that anchor by setting the body scroll top to anchor top
        $('html, body').animate({
			scrollTop:trgt_top},
			750,
			"swing"
		);
		return false;
    });

    // Mobile Menu button

	$("#contact").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var returnmessage = $(form).find(".returnmessage");

		console.log(form);

		var name = $(form).find('input[name="name"]').val().trim();
		var email = $(form).find('input[name="email"]').val().trim();
		var message = $(form).find('textarea[name="message"]').val().trim();
		$(returnmessage).empty(); // To empty previous error/success message.
		$(returnmessage).removeClass('error');
		$(returnmessage).removeClass('success');
		// Checking for blank fields.
		if (name == '' || email == '' || message == '') {
			$(returnmessage).append('Please Fill Required Fields');
			$(returnmessage).addClass('error');
		} else {
		// Returns successful data submission message when the entered information is stored in database.
			$.post("contact-form.php",
				$(form).serializeArray(),
				function(data) {
					$(returnmessage).append(data[1]); // Append returned message to message paragraph.
					if (data[0] == "success") {
						$(returnmessage).addClass('success');
						$(form)[0].reset(); // To reset form fields on success.
					} else {
						$(returnmessage).addClass('error');
					}
				}
			);
		}
	});

	$("#cv-form").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var returnmessage = $(form).find(".returnmessage");

		var name = $(form).find('input[name="name"]').val().trim();
		var email = $(form).find('input[name="email"]').val().trim();
		var position = $(form).find('input[name="position"]').val().trim();

		$(returnmessage).empty(); // To empty previous error/success message.
		$(returnmessage).removeClass('error');
		$(returnmessage).removeClass('success');
		// Checking for blank fields.
		if (name == '' || email == '' || position == '') {
			$(returnmessage).append('Please Fill Required Fields');
			$(returnmessage).addClass('error');
		} else {
			// Returns successful data submission message when the entered information is stored in database.
			$.post("contact-form.php",
				$(form).serializeArray(),
				function(data) {
					$(returnmessage).append(data[1]); // Append returned message to message paragraph.
					if (data[0] == "success") {
						$(returnmessage).addClass('success');
						$(form)[0].reset(); // To reset form fields on success.
					} else {
						$(returnmessage).addClass('error');
					}
				}
			);
		}
	});

});