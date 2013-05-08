
(function (window) {
	
	var cookie = {};
	
	cookie._isValidKey = function (key){
		return (new RegExp("^[^\\x00-\\x20\\x7f\\(\\)<>@,;:\\\\\\\"\\[\\]\\?=\\{\\}\\/\\u0080-\\uffff]+\x24")).test(key);
	};
	
	cookie.getRaw = function (key) {
		if (cookie._isValidKey(key)) {
			var reg = new RegExp("(^| )" + key + "=([^;]*)(;|\x24)"),
				result = reg.exec(document.cookie);
				
			if (result) {
				return result[2] || null;
			}
		}
	
		return null;
	};
	
	cookie.get = function (key) {
		var value = cookie.getRaw(key);
		if ('string' == typeof value) {
			value = decodeURIComponent(value);
			return value;
		}
		return null;
	};
		
	cookie.setRaw = function (key, value, options) {
		if (!cookie._isValidKey(key)) {
			return;
		}
		
		options = options || {};
		
		var expires = options.expires;
		if ('number' == typeof options.expires) {
			expires = new Date();
			expires.setTime(expires.getTime() + options.expires);
		}
		
		document.cookie =
			key + "=" + value
			+ (options.path ? "; path=" + options.path : "")
			+ (expires ? "; expires=" + expires.toGMTString() : "")
			+ (options.domain ? "; domain=" + options.domain : "")
			+ (options.secure ? "; secure" : ''); 
	
	};	
	cookie.remove = function (key, options) {
		options = options || {};
		options.expires = new Date(0);
		cookie.setRaw(key, '', options);
	};
	
	cookie.set = function (key, value, options) {
		cookie.setRaw(key, encodeURIComponent(value), options);
	};
	
	window.cookie = cookie;
	
})(this);

(function ($, cookie) {
	
	var items = $('.entry li'),
		
		cart = $('.cart'),
		btnCart = cart.find('p'),
		amountCart = cart.find('em'),
		cartBox = cart.children('.box'),
		cartList = cart.find('ul'),
		btnClear = cart.find('.empty'),
		
		btnCollect = $('.ctrl .collect'),
		btnBook = $('.ctrl .book'),
		
		zz = {};
	
	zz = {
		
		cart: {
			
			numbers: [],
			
			collect: function (number, price) {
				var number = +number,
					price = +price || 0;
				if (!this.hasNumber(number) && this.numbers.length <= 5) {
					this.numbers.push({"number": number, "price": price});
					this.render();
					this.save();
					amountCart.text(this.numbers.length);
				}
			},
			
			hasNumber: function (number) {
				var i = false;
				if (this.numbers.length) {
					$.each(this.numbers, function (k, v) {
						if(v.number == number) {
							i = true;
							return false;
						}
					});
				}
				return i;
			},
			
			clear: function () {
				if (cartList.find('li').length) {
					cartList.empty();
					amountCart.text('0');
					$('<div style="font-size:14px;padding:10px 20px;">您还没有挑选号码</div>').insertAfter(cartList);
					this.numbers = [];
					this.save();
				}
			},
			
			save: function () {
				var numbers = this.numbers;
				cookie.set('_cart', JSON.stringify(numbers));
			},
			
			render: function () {
				var _cart = this.numbers,
					list = '';
				
				if (_cart.length) {
					$.each(_cart, function (k, v) {
						list += '<li><a href="#">'+ v.number +'<span>¥'+ v.price +'</span></a></li>';
					});
					cartList.empty().append(list).next('div').remove();
					amountCart.text(_cart.length);
				} else {
					this.clear();
				}
			},
			
			init: function () {
				var _cart = cookie.get('_cart');
				
				if (_cart && typeof $.parseJSON(_cart) === 'object') {
					this.numbers = $.parseJSON(_cart);
					this.render();
				}
			}
					
		},
		
		book: {
			
			valid: function () {
			
			},
			
			submit: function () {
				if (this.valid) {
					var data = $("form").serialize();
					$.ajax({
		                url: _url,
		                type: _type,
		                data: _form.serialize() + '&ajaxsubmit=gcajax',
		                dataType: 'json',
		                success: function (data) {
		                    callback && callback(data);
		                }
            		});	
				}
			}
			
		},
		
		attachE: function () {
			var that = this;
			
			items.bind('mouseover', function () {
					$(this).addClass('hover');
				})
				.bind('mouseout', function () {
					$(this).removeClass('hover');
				});
				
			cart.bind('mouseover', function () {
					cartBox.show();
					btnCart.addClass('active');
				})
				.bind('mouseout', function () {
					cartBox.hide();
					btnCart.removeClass('active');
				});
				
			btnClear.click(function () {
				that.cart.clear();
				return false;
			});
			
			btnCollect.click(function () {
				var $this = $(this),
					number = $this.parents('li').find('.number a').text(),
					price = $this.parents('li').find('.price').text().slice(1);
				that.cart.collect(number, price);
				return false;
			});
			
		},
		
		init: function () {
			this.cart.init();
			this.attachE();
		}
	};
	
	zz.init();
	
})(jQuery, cookie);