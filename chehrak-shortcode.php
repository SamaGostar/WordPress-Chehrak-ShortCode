<?php
/*
Plugin Name: Chehrak Shortcode
Plugin URI: http://chehrak.com
Description: Adds a [Chehrak] shortcode that you can use in Posts or Pages to embed a Chehrak via entering an email address. Use email="email@domain.com" and size="64" plus other HTML attributes applied to the output IMG tag.
Author: Masoud Amini
Version: 1.1
Author URI: http://www.haftir.ir
*/

function Chehrak_shortcode_register( $atts ) {
	extract( shortcode_atts( array(
		'size' => '64',
		'email' => '',
		'rating' => 'X',
		'default' => '',
		'alt' => '',
		'title' => '',
		'align' => '', 
		'style' => '', 
		'class' => '', 
		'id' => '', 
		'border' => '', 
		), $atts ) );
	if ( !$email )
		return '';
	
	// Supported Chehrak parameters
	$rating  = $rating ? '&r=' . $rating : '';
	$default = $default ? '&d=' . urlencode( $default ) : '';
	
	// Supported HTML attributes for the IMG tag
	$alt    = $alt ?    ' alt="'    . esc_attr( $alt    ) . '"' : '';
	$title  = $title ?  ' title="'  . esc_attr( $title  ) . '"' : '';
	$align  = $align ?  ' align="'  . esc_attr( $align  ) . '"' : '';
	$style  = $style ?  ' style="'  . esc_attr( $style  ) . '"' : '';
	$class  = $class ?  ' class="'  . esc_attr( $class  ) . '"' : '';
	$id     = $id ?     ' id="'     . esc_attr( $id     ) . '"' : '';
	$border = $border ? ' border="' . esc_attr( $border ) . '"' : '';
	
	// Send back the completed tag
	return '<img src="http://www.rokh.chehrak.com/' . md5( trim( strtolower( $email ) ) ) . '?size=' . $size . '" width="' . $size . '" height="' . $size . '"' . $alt . $title . $align . $style . $class . $id . $border . ' />';
}
add_shortcode( 'Chehrak', 'Chehrak_shortcode_register' );
