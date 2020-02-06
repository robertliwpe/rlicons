<?php
/**
 * Authority Pro homepage.
 *
 * Homepage content optionally installed after theme activation.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package Authority
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/authority/
 */

$authority_homepage_images = [
	'hero'                  => CHILD_URL . '/config/import/images/home-hero.jpg',
	'down-arrow'            => CHILD_URL . '/config/import/images/down-arrow.png',
	'ebook-cover'           => CHILD_URL . '/config/import/images/ebook-cover.jpg',
	'ebook-cover-marketing' => CHILD_URL . '/config/import/images/ebook-cover-marketing.jpg',
	'icons'                 => CHILD_URL . '/config/import/images/icons.jpg',
];

$authority_homepage_logos = [
	CHILD_URL . '/config/import/images/logo-1.png',
	CHILD_URL . '/config/import/images/logo-2.png',
	CHILD_URL . '/config/import/images/logo-3.png',
	CHILD_URL . '/config/import/images/logo-4.png',
	CHILD_URL . '/config/import/images/logo-5.png',
];

return <<<CONTENT
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide has-2-columns"><!-- wp:column {"className":"authority-text-align"} -->
<div class="wp-block-column authority-text-align"><!-- wp:heading {"level":1,"className":"bold-heading-text"} -->
<h1 class="bold-heading-text">Hey, I’m Kelly. I’ll teach you how to grow your audience and build an online business. </h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"block-content-indent"} -->
<p class="block-content-indent">Get instant free access to my weekly newsletter where I share my best tips about online marketing, personal branding, and entrepreneurship.</p>
<!-- /wp:paragraph -->

<!-- wp:atomic-blocks/newsletter {"buttonBackgroundColor":"theme-primary","buttonShape":"ab-button-shape-square","buttonText":"Subscribe Me!","emailInputLabel":"Enter Email Address...","mailingList":"1a951fe674","className":"inline-submit block-content-indent"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1518,"align":"center","className":"vertical-caption image-border stylized-background"} -->
<div class="wp-block-image vertical-caption image-border stylized-background"><figure class="aligncenter"><img src="{$authority_homepage_images['hero']}" alt="" class="wp-image-1518"/><figcaption><a href="#">Kelly Taylor, Entrepreneur</a></figcaption></figure></div>
<!-- /wp:image -->

</div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:atomic-blocks/ab-spacer -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:30px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:paragraph {"align":"center","customTextColor":"#707070","fontSize":"small","className":"logos-section-header"} -->
<p style="color:#707070;text-align:center" class="has-text-color has-small-font-size logos-section-header">As featured in:</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"columns":5,"align":"wide","className":"brand-logos"} -->
<div class="wp-block-columns alignwide has-5-columns brand-logos"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1522,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="{$authority_homepage_logos[0]}" alt="StudioPress" class="wp-image-1522"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1524,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="$authority_homepage_logos[1]" alt="Velocitize" class="wp-image-1524"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1525,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="$authority_homepage_logos[2]" alt="WP Engine" class="wp-image-1525"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1528,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="$authority_homepage_logos[3]" alt="Torque" class="wp-image-1528"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1527,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="$authority_homepage_logos[4]" alt="Authority Pro Theme" class="wp-image-1527"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:atomic-blocks/ab-spacer -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:30px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:image {"id":1520,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="{$authority_homepage_images['down-arrow']}" alt="" class="wp-image-1520"/></figure></div>
<!-- /wp:image -->

<!-- wp:atomic-blocks/ab-spacer -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:30px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:heading {"align":"center"} -->
<h2 style="text-align:center">Start Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center"> All the resources, training, and support you need to run<br>your dream online business!</p>
<!-- /wp:paragraph -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":70} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:70px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:media-text {"mediaId":1179,"mediaType":"image","mediaWidth":38,"isStackedOnMobile":true} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:38% auto"><figure class="wp-block-media-text__media"><img src="{$authority_homepage_images['ebook-cover']}" alt="" class="wp-image-1179"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"authority-subtitle"} -->
<p class="authority-subtitle">Increase your influence.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"entry-title"} -->
<h2 class="entry-title"><a href="#">The FREE  Audience Building Master Class</a> </h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"block-content-indent"} -->
<p class="block-content-indent">This is an example of a paragraph, you could edit this to put information about yourself so or your business.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"align":"none","className":"block-content-indent"} -->
<div class="wp-block-button block-content-indent"><a class="wp-block-button__link" href="#">Learn More</a></div>
<!-- /wp:button -->

</div></div>
<!-- /wp:media-text -->

<!-- wp:atomic-blocks/ab-spacer -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:30px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:pullquote {"align":"wide"} -->
<figure class="wp-block-pullquote alignwide"><blockquote><p>Kelly’s course helped me to grow my email list from 500 to over 10,000 subscribers—all within 3 months!</p><cite>Jane, Food blogger </cite></blockquote></figure>
<!-- /wp:pullquote -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":22} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:22px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:media-text {"mediaPosition":"right","mediaId":1178,"mediaType":"image","mediaWidth":38,"isStackedOnMobile":true} -->
<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile" style="grid-template-columns:auto 38%"><figure class="wp-block-media-text__media"><img src="{$authority_homepage_images['ebook-cover-marketing']}" alt="" class="wp-image-1178"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"authority-subtitle"} -->
<p class="authority-subtitle">Get 25% off Today only!</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"entry-title"} -->
<h2 class="entry-title"><a href="#">Learn How to Get More Out of Your Email Marketing</a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Content…","className":"block-content-indent"} -->
<p class="block-content-indent">This is an example of a paragraph, you could edit this to put information about yourself so or your business.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"align":"none","className":"block-content-indent"} -->
<div class="wp-block-button block-content-indent"><a class="wp-block-button__link" href="#">Learn More</a></div>
<!-- /wp:button --></div></div>
<!-- /wp:media-text -->

<!-- wp:pullquote {"align":"wide"} -->
<figure class="wp-block-pullquote alignwide"><blockquote><p> I started using Kelly’s email marketing technique and it helped me to make $5,000 more a month without any extra work!</p><cite> Rob, copywriter </cite></blockquote></figure>
<!-- /wp:pullquote -->

<!-- wp:media-text {"mediaId":562,"mediaType":"image","mediaWidth":38,"isStackedOnMobile":true} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:38% auto"><figure class="wp-block-media-text__media"><img src="{$authority_homepage_images['icons']}" alt="" class="wp-image-562"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"authority-subtitle"} -->
<p class="authority-subtitle">Free resources. Free membership. Instant access!</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"entry-title"} -->
<h2 class="entry-title"><a href="#">Join the Community</a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"block-content-indent"} -->
<p class="block-content-indent">This is an example of a paragraph, you could edit this to put information about yourself so or your business.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"align":"none","className":"block-content-indent"} -->
<div class="wp-block-button block-content-indent"><a class="wp-block-button__link" href="#">Join Now</a></div>
<!-- /wp:button --></div></div>
<!-- /wp:media-text -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingRight":8,"containerPaddingLeft":8,"containerWidth":"full","containerMaxWidth":1200} -->
<div style="padding-left:8%;padding-right:8%" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:1200px"><!-- wp:atomic-blocks/ab-spacer {"spacerHeight":170,"spacerDivider":true,"spacerDividerColor":"#eeeeee"} -->
<div style="color:#eeeeee" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-spacer-divider ab-divider-size-1"><hr style="height:170px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:heading -->
<h2>The Blog</h2>
<!-- /wp:heading --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingRight":8,"containerPaddingLeft":8,"containerWidth":"full","containerMaxWidth":1140} -->
<div style="padding-left:8%;padding-right:8%" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:1140px"><!-- wp:button {"align":"right","className":"is-style-outline"} -->
<div class="wp-block-button alignright is-style-outline"><a class="wp-block-button__link" href="#">Read More Blog Posts</a></div>
<!-- /wp:button -->

<!-- wp:paragraph -->
<p>Build your authority by reading the premier publishing resource for online marketers and creative entrepreneurs.<br></p>
<!-- /wp:paragraph -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":70} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:70px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:atomic-blocks/ab-post-grid {"postsToShow":3,"columns":3,"excerptLength":24,"imageSize":"blog-featured-image"} /--></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->
CONTENT;
