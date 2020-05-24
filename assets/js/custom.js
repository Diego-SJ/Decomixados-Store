/*
	Author: Umair Chaudary @ Pixel Art Inc.
	Author URI: http://www.pixelartinc.com/
*/


$(document).ready(function(e) {

    $ = jQuery;

    const base_url = $('#base_url').val();
    console.log(base_url);


    $("select").selectBox();

    $( ".slider-slides" ).cycle({
        pager:'.slider-btn',
        prev: '.prev',
        next: '.next'
    });

    $('#sort_by').on('change', function(){
        $('#frm_sort_category').submit();
    });

    // ToolTip
    $('.tooltip').tooltipster({
        theme: '.tooltipster-punk'
    });

    // Lightbox
    $("a.zoom").prettyPhoto({
        social_tools: ''
    });

    $("nav ul li").hover(function(){
        $(this).children('ul').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('ul').stop(true, true).fadeOut(500);
    });

    $(".offers figure").hover(function(){
        $(this).children('.overlay').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('.overlay').stop(true, true).fadeOut(500);
    });

    $(".product figure").hover(function(){
        $(this).children('.overlay').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('.overlay').stop(true, true).fadeOut(500);
    });

    $('#carousel').elastislide({
        speed : 2000
    });

    $('footer .back-top a').click(function(e){
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    //ACCORDION
    $( "#accordion" ).accordion();
    $( "#check-accordion" ).accordion();



    $('.product figure .overlay a').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -41px)"},
                {duration:500}
            )
        },
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 0)"},
                {duration:500}
            )
        }
    );

    $('.sorting-bar .sorting-btn a').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -29px)"},
                {duration:500}
            )
        },
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 0)"},
                {duration:500}
            )
        }
    );

    $('.detail .icon a').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -42.3px)"},
                {duration:500}
            )
        },
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 0)"},
                {duration:500}
            )
        }
    );

    $('footer .social-icon a').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -20px)"},
                {duration:500}
            )
        },
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 0)"},
                {duration:500}
            )
        }
    );

    $.extend($.fx.step,{
        backgroundPosition: function(fx) {
            if (fx.pos === 0 && typeof fx.end == 'string') {
                var start = $.css(fx.elem,'backgroundPosition');
                start = toArray(start);
                fx.start = [start[0],start[2]];
                var end = toArray(fx.end);
                fx.end = [end[0],end[2]];
                fx.unit = [end[1],end[3]];
            }
            var nowPosX = [];
            nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
            nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];
            fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];

            function toArray(strg){
                strg = strg.replace(/left|top/g,'0px');
                strg = strg.replace(/right|bottom/g,'100%');
                strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
                var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
                return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
            }
        }
    });


    $(".shopping-cart li a").click(function(e){
        e.preventDefault();
        $(this).parents('ul').stop(true,true).fadeOut(100);
    });


    $('#carousel').carouFredSel({
        responsive: true,
        circular: false,
        auto: false,
        items: {
            visible: 1,
            width: 200,
            height: '56%'
        },
        prev: '.prev',
        next: '.next',
        scroll: {
            fx: 'fade'
        }
    });

    $('#thumbs').carouFredSel({
        responsive: true,
        circular: false,
        infinite: false,
        auto: false,
        prev: '#prev',
        next: '#next',
        items: {
            visible: {
                min: 2,
                max: 6
            }

        }
    });

    $('#thumbs a').click(function() {
        $('#carousel').trigger('slideTo', '#' + this.href.split('#').pop() );
        $('#thumbs a').removeClass('selected');
        $(this).addClass('selected');
        return false;
    });

    $( "#product_tabs" ).tabs();

// Range
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1325,
        values: [ 0, 600 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] );
            $( "#amount2" ).val(  " $" + ui.values[ 1 ] )
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) );
    $( "#amount2" ).val( "$"
         + $( "#slider-range" ).slider( "values", 1 ) );

    $('#frm_login').submit((e) => {
        e.preventDefault();
        let errors = 0;
        let pass = $('#log_password').val();
        let usr = $('#log_user').val();
        
        if(pass.length < 8){
            alert('La contraseña debe tener al menos 8 digítos.');
            e.preventDefault();
            errors++;
        } else if(usr.length < 8){
            alert('Verifica que tu usuario o correo sea valido.');
            e.preventDefault();
            errors++;
        } else {
            errors = 0;
        }

        if(errors == 0){
            const newUser = {
                log_user: $('#log_user').val(),
                log_password: $('#log_password').val(),
            };
            $.post(
                $('#frm_login').attr('action'),
                newUser,
                (response) => {
                    console.log(response)
                    if(response == 'ok'){
                        $('#frm_login').trigger('reset');
                        $(location).attr('href',base_url);
                    } else {
                        $('#resp_log').show();
                        $('#resp_msg_log').text(response);
                    } 
                }
            );
        }
    });

    $('#frm_register').submit((e) => {
		e.preventDefault();
		let errors = 0;
		let pass = $('#reg_password').val();
		let c_pass = $('#conf_pass').val();
		let usr = $('#reg_user').val();
		
		if(pass.length < 8){
			alert('La contraseña debe tener al menos 8 digítos.');
			e.preventDefault();
			errors++;
		} else if(pass != c_pass){
			alert('Las contraseñas no coinciden.');
			e.preventDefault();
			errors++;
		} else if(usr.length < 8){
			alert('El nombre de usuario debe tener al menos 8 digítos.');
			e.preventDefault();
			errors++;
		} else {
			errors = 0;
		}

		if(errors == 0){
			const newUser = {
				reg_name: $('#reg_name').val(),
				reg_lname: $('#reg_lname').val(),
				reg_email: $('#reg_email').val(),
                reg_user: $('#reg_user').val(),
                reg_phone: $('#reg_phone').val(),
				reg_password: $('#reg_password').val(),
			};
			$.post(
				$('#frm_register').attr('action'),
				newUser,
				(response) => {
					console.log(response)
					if(response == 'ok'){
						$('#frm_register').trigger('reset');
						$(location).attr('href',base_url);
					} else {
						$('#resp_reg').show();
						$('#resp_msg').text(response);
					} 
				}
			);
		}
    });
    
    $('.btn-add-to-my-car').on('click', function(){
        let btn = $(this);
        $.ajax({
            url: btn.attr('addCar'),
            type: "POST",
            success: function(resp){
                if(resp >= 0){
                    $('#tic').text(resp+' item(s)');
                    setTimeout(function() {
                        btn.attr('style','background: #229954; border-radius:100%;');
                    },0);
                    setTimeout(function() {
                        btn.removeAttr('style');
                    },400);
                } else {
                    $(location).attr('href',base_url+'login')
                }
                console.log(resp);
            }
        });
    });

    $('.btn-add-to-my-wish').on('click', function(){
        let btn = $(this);
        $.ajax({
            url: btn.attr('addWish'),
            type: "POST",
            success: function(resp){
                console.log(resp);
                if(resp == 'ok'){
                    setTimeout(function() {
                        btn.attr('style','background: #229954; border-radius:100%;');
                    },0);
                    setTimeout(function() {
                        btn.removeAttr('style');
                    },400);
                } else {
                    setTimeout(function() {
                        btn.attr('style','background: #EC1E14; border-radius:100%;');
                    },0);
                    setTimeout(function() {
                        btn.removeAttr('style');
                    },400);
                    $(location).attr('href',base_url+'login')
                }
            }
        });
    });

});