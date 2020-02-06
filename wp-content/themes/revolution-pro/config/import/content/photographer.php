<?php
/**
 * Revolution Pro.
 *
 * Photographer content optionally installed after theme activation.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package Revolution Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/revolution/
 */

$revolution_photographyheader_image_url = CHILD_URL . '/config/import/images/photographer.jpg';

$revolution_photographyebook_image_url = CHILD_URL . '/config/import/images/ebook-cover.jpg';

$revolution_grid_image_urls = [
	1  => CHILD_URL . '/config/import/images/latest-1.jpg',
	2  => CHILD_URL . '/config/import/images/latest-2.jpg',
	3  => CHILD_URL . '/config/import/images/latest-3.jpg',
	4  => CHILD_URL . '/config/import/images/latest-4.jpg',
	5  => CHILD_URL . '/config/import/images/latest-5.jpg',
	6  => CHILD_URL . '/config/import/images/latest-6.jpg',
	7  => CHILD_URL . '/config/import/images/latest-7.jpg',
	8  => CHILD_URL . '/config/import/images/latest-8.jpg',
	9  => CHILD_URL . '/config/import/images/latest-9.jpg',
	10 => CHILD_URL . '/config/import/images/latest-10.jpg',
];

$revolution_photographycontent = <<<CONTENT
<!-- wp:image {"id":1935,"align":"full"} -->
<figure class="wp-block-image alignfull"><img src="$revolution_photographyheader_image_url" alt="" class="wp-image-1935"/></figure>
<!-- /wp:image -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":8.5,"containerPaddingBottom":10,"containerMarginTop":-25,"containerMaxWidth":800,"className":"boxshadow wide-featured"} -->
<div style="background-color:#fff;padding-left:0%;padding-right:0%;padding-bottom:10%;padding-top:8.5%;margin-top:-25%;margin-bottom:0%" class="wp-block-atomic-blocks-ab-container boxshadow wide-featured aligncenter ab-block-container"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:800px"><!-- wp:heading {"level":1,"align":"center"} -->
<h1 style="text-align:center">I heart cameras.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p style="text-align:center" class="has-large-font-size">Capturing life’s precious moments one shot at a time.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"align":"center","className":"is-style-default"} -->
<div class="wp-block-button aligncenter is-style-default"><a class="wp-block-button__link" href="#latest-work">View Our Work</a></div>
<!-- /wp:button --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":60} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:60px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:pullquote {"align":"wide"} -->
<figure class="wp-block-pullquote alignwide"><blockquote><p>“Sebastian’s photography skills are truly unmatched.” </p><cite>—Caroline Miller, Mom of four</cite></blockquote></figure>
<!-- /wp:pullquote -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":60} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:60px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull has-2-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2>The Ultimate Guide to Minimalist Design &amp; White Space</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Written by: Sarah Thomas</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Learn the fundamentals of creating amazing digital experiences. Breathe fresh life into your next website project by following our simple, intuitive tutorials. With just a little bit of intentionality, you’ll be delighted with the result—nothing but bliss.</p>
<!-- /wp:paragraph -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link" href="#">Download For Free</a></div>
<!-- /wp:button --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1873} -->
<figure class="wp-block-image"><img src="$revolution_photographyebook_image_url" alt="" class="wp-image-1873"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":20} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:20px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:heading {"align":"center","className":"padding"} -->
<h2 style="text-align:center" id="latest-work" class="padding">Latest Work</h2>
<!-- /wp:heading -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":40} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:40px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:columns {"columns":3,"align":"full","className":"image-grid"} -->
<div class="wp-block-columns alignfull has-3-columns image-grid"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1879} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[1]}" alt="" class="wp-image-1879"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":1891} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[4]}" alt="" class="wp-image-1891"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":1894} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[7]}" alt="" class="wp-image-1894"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1880} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[2]}" alt="" class="wp-image-1880"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":1892} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[5]}" alt="" class="wp-image-1892"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":1895} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[8]}" alt="" class="wp-image-1895"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1881} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[3]}" alt="" class="wp-image-1881"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":1893} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[6]}" alt="" class="wp-image-1893"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":1896} -->
<figure class="wp-block-image"><img src="{$revolution_grid_image_urls[9]}" alt="" class="wp-image-1896"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":10} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:10px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:heading {"align":"center"} -->
<h2 style="text-align:center">Work with us.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p style="text-align:center" class="has-large-font-size">We are a boutique creative agency based in Chicago.</p>
<!-- /wp:paragraph -->

<!-- wp:atomic-blocks/ab-spacer -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:30px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->

<!-- wp:columns {"columns":3,"align":"full"} -->
<div class="wp-block-columns alignfull has-3-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"align":"center"} -->
<h3 style="text-align:center">Design</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center">With an emphasis on typography, white space, and mobile-optimized design, your website will look absolutely breathtaking.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center"><a href="#">Learn more about design</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"align":"center"} -->
<h3 style="text-align:center">Content</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center">Our team will teach you the art of writing audience-focused content that will help you achieve the success you truly deserve.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center"><a href="#">Learn more about content</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"align":"center"} -->
<h3 style="text-align:center">Strategy</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center">We help creative entrepreneurs build their digital business by focusing on three key elements of a successful online platform.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center"><a href="#">Learn more about strategy</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->
CONTENT;

return $revolution_photographycontent;
