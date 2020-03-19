<?php
/**
 * Template Name: Python Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>
<?php
    $command = escapeshellcmd('python3 /var/www/visa/russia_visa.py 6 en');
    $output = shell_exec($command);
    print_r($output)
?>
<?php get_footer(); ?>
