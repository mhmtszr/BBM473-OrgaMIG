/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Init Menu
3. InitQty


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
	initQty();

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

	/* 

	3. Init Qty

	*/

	function initQty()
	{
		if($('.product_quantity').length)
		{
			var qtys = $('.product_quantity');

			qtys.each(function()
			{
				var qty = $(this);
				var sub = qty.find('.qty_sub');
				var add = qty.find('.qty_add');
				var num = qty.find('.product_num');
				var productID ;
				var stock;
				var original;
				var newValue;

				sub.on('click', function()
				{
					original = parseFloat(qty.find('.product_num').text());
					productID = parseFloat(qty.find('.product_id').text());
					stock = parseFloat(qty.find('.product_stock').text());

					if(original > 1)
					{
						newValue = original - 1;
						stock++;
						$.ajax({
							type: "POST",
							url: "update_cart.php",
							data: {
								productID: productID,
								amountOfProduct: newValue,
								stock: stock
							},
							success: function(data){
								location.reload();
							}
						});
					}

					else{
						alert("Quantity cannot be 0.");
					}
					
					num.text(newValue);
				});

				add.on('click', function()
				{
					original = parseFloat(qty.find('.product_num').text());
					productID = parseFloat(qty.find('.product_id').text());
					stock = parseFloat(qty.find('.product_stock').text());
					
					if (0 < stock){
						stock--;
						newValue = original + 1;
						$.ajax({
							type: "POST",
							url: "update_cart.php",
							data: {
								productID: productID,
								amountOfProduct: newValue,
								stock: stock
							},
							success: function(data){
								location.reload(); // then reload the page.(3)
							}
						});
						num.text(newValue);
					}

					else{
						alert("There is no stock.");
					}
				});
			});
		}
	}

});