<?php
/**
 * Visual Composer Divider
 *
 * @package Total WordPress Theme
 * @subpackage VC Templates
 * @version 4.9
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Helps speed up rendering in backend of VC
if ( is_admin() && ! wp_doing_ajax() ) {
	return;
}

// Get and extract shortcode attributes
extract( vcex_vc_map_get_attributes( 'vcex_divider_dots', $atts, $this ) );

// Sanitize vars
$count = $count ? $count : '3';

// Wrap classes
$wrap_classes   = array( 'vcex-module', 'vcex-divider-dots', 'clr' );
$wrap_classes[] = vcex_get_css_animation( $css_animation );
$wrap_classes[] = vcex_get_extra_class( $el_class );

if ( $align ) {
	$wrap_classes[] = 'text' . $align;
}
if ( $visibility ) {
	$wrap_classes[] = $visibility;
}
$wrap_classes = implode( ' ', $wrap_classes );
$wrap_classes = vcex_parse_shortcode_classes( $wrap_classes, 'vcex_divider_dots', $atts );

// Define output var
$output = '';

// Wrap style
$wrap_style = vcex_inline_style( array(
	'padding' => $margin,
) );

// Span style
$span_style = vcex_inline_style( array(
	'height'     => $size,
	'width'      => $size,
	'background' => $color,
) );

// Return output
$output .= '<div class="' . esc_attr( $wrap_classes ) . '"' . $wrap_style . '>';

	for ( $k = 0; $k < $count; $k++ ) {

		$output .= '<span' . $span_style . '></span>';

	}

$output .= '</div>';

// @codingStandardsIgnoreLine
echo $output;
