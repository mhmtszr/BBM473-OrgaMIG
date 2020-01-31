/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Init Menu


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var menu = $('.menu');
	var burger = $('.hamburger');
	var menuActive = false;

	$(window).on('resize', function()
	{
		setTimeout(function()
		{
			$(window).trigger('resize.px.parallax');
		}, 375);
	});

	initMenu();
	initCode();
	/* 

	2. Init Menu

	*/

	function initMenu()
	{
		if(menu.length)
		{
			if($('.hamburger').length)
			{
				burger.on('click', function()
				{
					if(menuActive)
					{
						closeMenu();
					}
					else
					{
						openMenu();

						$(document).one('click', function cls(e)
						{
							if($(e.target).hasClass('menu_mm'))
							{
								$(document).one('click', cls);
							}
							else
							{
								closeMenu();
							}
						});
					}
				});
			}
		}
	}

	function openMenu()
	{
		menu.addClass('active');
		menuActive = true;
	}

	function closeMenu()
	{
		menu.removeClass('active');
		menuActive = false;
	}

	function initCode()
	{
		$(".coupon_button").click(function(){
			if($.trim($('.coupon_input').val()) == ''){
				alert('Input cannot be left blank');
			}
			else{
				$.ajax({
					type: "POST",
					url: "discount_code.php",
					data: {
						code: $('.coupon_input').val(),
						total: total
					},
					dataType: 'JSON',
					success: function(data) {
						if (data.boolean == "Used"){
							$('#div_total').html(data.total);
							$('#div_code_status').html(data.boolean);
							$("#coupon_button").prop("disabled", true).css("cursor", "not-allowed");
							$("#coupon_input").prop("disabled", true).css("cursor", "not-allowed");
						}

						else {
							alert(data.message);
						}
					}
				});
			}
		});

		$("#order_button").click(function(){
			var total = $('#div_total').text();
			var address = $('#checkout_address').val();
			var paymentType = $('input[name="shipping_radio"]:checked').val();
			
			if (address == ""){
				alert("Address cannot be blank.");
			}

			else{
				$.ajax({
					type: "POST",
					url: "give_order.php",
					data: {
						total: total,
						address: address,
						paymentType: paymentType
					},
					success: function(data){
						alert(data);
						window.location = "index.php";
					}
				});
			}
		});
	}

});