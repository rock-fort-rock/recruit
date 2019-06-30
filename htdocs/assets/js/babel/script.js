import SmoothScroll from '../../lib/smooth-scroll.polyfills.min';
// import Rellax from '../../lib/rellax.min';
import Swiper from '../../lib/swiper.min';
import imagesLoaded from 'imagesloaded';
import noScroll from '../../lib/noScroll';
// import echo from '../../lib/echo.min';//NG..
// import echo from 'echo-js';//NG..


const breakpoint = 780;
const bodyWidth = document.body.clientWidth;
const ua = window.navigator.userAgent.toLowerCase();


//1:タッチデバイス　2:マウスデバイス
let deviceType = 0;
const detectDeviceType = (event) => {
	deviceType = event.changedTouches ? 1 : 2 ;
	// console.log(deviceType);
	document.removeEventListener ( "touchstart", detectDeviceType ) ;
	document.removeEventListener ( "mousemove", detectDeviceType ) ;
	// console.log(deviceType);
}
document.addEventListener ( "touchstart", detectDeviceType ) ;
document.addEventListener ( "mousemove", detectDeviceType ) ;


//グローバルナビ
const $hasSubmenu = document.querySelectorAll('.globalNavi__item--hasChild');
[].forEach.call($hasSubmenu, ( element ) => {
	if(bodyWidth > breakpoint){
		element.querySelector('span').addEventListener( 'mouseenter', ( event ) => {
			event.currentTarget.parentNode.classList.add('-active');
		});
		element.querySelector('span').addEventListener( 'mouseleave', ( event ) => {
			event.currentTarget.parentNode.classList.remove('-active');
		});

		element.querySelector('.globalNavi__childList').addEventListener( 'mouseenter', ( event ) => {
			event.currentTarget.parentNode.classList.add('-active');
		});
		element.querySelector('.globalNavi__childList').addEventListener( 'mouseleave', ( event ) => {
			event.currentTarget.parentNode.classList.remove('-active');
		});
	}else{
		element.querySelector('span').addEventListener( 'click', ( event ) => {
			event.currentTarget.parentNode.classList.toggle('-active');
		});
	}
})


document.querySelector('.globalHeader__hamburger').addEventListener( 'click', ( event ) => {
	// event.currentTarget.classList.toggle('-active');
	document.querySelector('.spNavi').classList.toggle('-active');
	noScroll.toggle();
})
document.querySelector('.spNavi__bg').addEventListener( 'click', ( event ) => {
	document.querySelector('.spNavi').classList.remove('-active');
	noScroll.off();
})
const $sp_hasSubmenu = document.querySelectorAll('.spGlobalNavi__itemInner--hasSubNavi');
[].forEach.call($sp_hasSubmenu, ( element ) => {
		element.addEventListener( 'click', ( event ) => {
			console.log('click');
			event.currentTarget.nextElementSibling.classList.toggle('-active');
		});
})


document.querySelector('.siteLinks__itemInner--search').addEventListener( 'click', ( event ) => {
	document.querySelector('.spFooter').classList.toggle('-active');
})



//ナビ可変
// window.onscroll = () =>{
// 	const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
// 	// console.log(scrollTop);
// 	if(scrollTop > 100){
// 		if(!document.querySelector('.globalHeader').classList.contains('narrow')){
// 			document.querySelector('.globalHeader').classList.add('narrow');
// 		}
// 	}else{
// 		if(document.querySelector('.globalHeader').classList.contains('narrow')){
// 			document.querySelector('.globalHeader').classList.remove('narrow');
// 		}
// 	}
// }




//HOME
// const homeSet = () => {
// 	const homeHeroSwiper = new Swiper('.homeHero', {
// 		slidesPerView: 1,
// 		watchOverflow: true,
// 		speed: 750,
// 		pagination: {
// 	    el: '.swiper-pagination',
// 	    type: 'bullets',
// 			clickable: true,
// 	  },
// 		autoplay: {
// 	    delay: 5000,
// 	    disableOnInteraction: false,
// 	  },
// 	});
// }
// if(document.querySelectorAll('.pageHome').length > 0){
// 	homeSet();
// }

const glossarySet = () => {
	const $word = document.querySelectorAll('.glossaryList__word');
	[].forEach.call($word, ( element ) => {
			element.addEventListener( 'click', ( event ) => {
				console.log('click');
				event.currentTarget.classList.toggle('-active');
				event.currentTarget.nextElementSibling.classList.toggle('-active');
			});
	})
}
if(document.querySelectorAll('.glossaryList').length > 0){
	glossarySet();
}



//スムーススクロール
const scroll = new SmoothScroll('a[href*="#"].scroll', {
	// header: '.globalHeader',//.mainにmargin-topが指定してあるので不要
	speed: 800,
	updateURL: false,
	// easing: 'easeOutCubic',
});
