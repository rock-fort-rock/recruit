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
}
document.addEventListener ( "touchstart", detectDeviceType ) ;
document.addEventListener ( "mousemove", detectDeviceType ) ;


//グローバルナビ
document.querySelector('.globalHeader__hamburger').addEventListener( 'click', ( event ) => {
	event.currentTarget.classList.toggle('active');
	document.querySelector('.globalHeader__nav').classList.toggle('active');
	noScroll.toggle();
})


//ナビ可変
window.onscroll = () =>{
	const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	// console.log(scrollTop);
	if(scrollTop > 100){
		if(!document.querySelector('.globalHeader').classList.contains('narrow')){
			document.querySelector('.globalHeader').classList.add('narrow');
		}
	}else{
		if(document.querySelector('.globalHeader').classList.contains('narrow')){
			document.querySelector('.globalHeader').classList.remove('narrow');
		}
	}
}




//HOME
const homeSet = () => {
	const homeHeroSwiper = new Swiper('.homeHero', {
		slidesPerView: 1,
		watchOverflow: true,
		speed: 750,
		pagination: {
	    el: '.swiper-pagination',
	    type: 'bullets',
			clickable: true,
	  },
		autoplay: {
	    delay: 5000,
	    disableOnInteraction: false,
	  },
	});
}
if(document.querySelectorAll('.pageHome').length > 0){
	homeSet();
}



//スムーススクロール
const scroll = new SmoothScroll('a[href*="#"].scroll', {
	// header: '.globalHeader',//.mainにmargin-topが指定してあるので不要
	speed: 800,
	updateURL: false,
	// easing: 'easeOutCubic',
});
