<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); // WPCS: XSS ok. ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/amp.css'; ?>
	<?php /*include get_bloginfo('stylesheet_directory').'/style.css';//子テーマCSS 読み込みNG*/ ?>
	@-webkit-keyframes fadeIn{0%{opacity:0}to{opacity:1}}@keyframes fadeIn{0%{opacity:0}to{opacity:1}}@-webkit-keyframes fadeOut{0%{opacity:1}to{opacity:0}}@keyframes fadeOut{0%{opacity:1}to{opacity:0}}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}a{color:#6eb3dd}.globalHeader__logo{width:75px}@media (min-width:781px){.globalHeader__logo{width:212px}}.globalHeader__title{background-color:#6eb3dd}.siteLinks__itemInner{color:#6eb3dd}.spNavi__logo{width:90px}.spGlobalNavi__itemInner{color:#6eb3dd}.spGlobalNavi__itemInner--hasSubNavi{position:relative}.spGlobalNavi__itemInner--hasSubNavi:after{border-top-color:#6eb3dd}.globalNavi{background-color:#6eb3dd;color:#fff}.globalNavi__childItem a span,.globalNavi__item--hasChild.-active>span{color:#6eb3dd}.globalNavi__item--hasChild.-active>span:after{border-top-color:#6eb3dd}.container__sideSectionTitle{background-color:#6eb3dd}.article__title,.pageTitle,.qaList__question{color:#6eb3dd}.button:not(.button--entry):not(.button--green):not(.button--pink){background-color:#6eb3dd;border-bottom-color:#2c83ba}.qaData__itemHeadline .qIcon,.qaData__itemValue em{color:#6eb3dd}.searchForm__inner{background-color:#deeef7}.searchForm__form input{border-color:#6eb3dd}.searchForm__form button{background-color:#6eb3dd}.postQuestion{border-color:#6eb3dd}.glossaryNavi__item a:after{background-color:#6eb3dd}.glossaryList__catTitle{color:#6eb3dd}.glossaryList__word:before{border-left-color:#6eb3dd}.glossaryDetail__title{color:#6eb3dd}.formTitle{background-color:#6eb3dd}.formStatus__step--current{background-color:#2c83ba}.formContainer__title,.formStatus__step--current:not(:last-child):after{border-left-color:#2c83ba}.formContainer__agreement,.formTable th{background-color:#eaf4fa}.thanksPage__button{background-color:#2c83ba}
	</style>
	<!-- AMP Analytics -->
	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
	<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>
	<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
	<script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
</head>

<body class="amp-mode <?php echo esc_attr( $this->get( 'body_class' ) ); ?>">
	<!-- Google Tag Manager -->
	<?php /*
	<amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-MZ3ZZPM&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>
	*/ ?>

	<header class="globalHeader">
		<div class="globalHeader__header globalHeader__header--amp">
      <div class="globalHeader__logo">
        <a href="/">
          <amp-img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="76" height="38" class="globalHeader__logoImg">
        </a>
      </div>
    </div>
	</header>
	<div class="container container--amp">
