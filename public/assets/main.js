$(document).ready(function(){
	
	
	if($(".notice").length){
		var mySwiper = new Swiper('.notice .swiper-container', {
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.notice-left',
				prevEl: '.notice-right',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.2,
					spaceBetween: 10,
				},
				// when window width is >= 640px
				768: {
					slidesPerView: 1,
					spaceBetween: 30,
				}
			}

		});
	}	
	
	if($(".news").length){
		var mySwiper = new Swiper('.news .swiper-container', {
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.news-left',
				prevEl: '.news-right',
			},
			
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.2,
					spaceBetween: 10,
				},
				// when window width is >= 640px
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				}
			}

		});
	}	
	
	if($(".service").length){
		var mySwiper = new Swiper('.service .swiper-container', {
			
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.service-left',
				prevEl: '.service-right',
			},
			
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.2,
					spaceBetween: 10,
				},
				// when window width is >= 640px
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				}
			}

		});
	}	
	
	if($(".threeslide").length){
		var mySwiper = new Swiper('.threeslide .swiper-container', {
			
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.three-left',
				prevEl: '.three-right',
			},
			
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.2,
					spaceBetween: 10,
				},
				// when window width is >= 640px
				768: {
					slidesPerView: 3,
					spaceBetween: 40,
				}
			}

		});
	}	
	
	if($(".innovation").length){
		var mySwiper = new Swiper('.innovation .swiper-container', {
			
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.innovation-left',
				prevEl: '.innovation-right',
			},
			
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.2,
					spaceBetween: 10,
				},
				// when window width is >= 640px
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				}
			}

		});
	}
	
	$(".toTop").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	 
});