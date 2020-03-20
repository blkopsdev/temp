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
    $fid = $_GET['fid'];
    $dest = strtolower($_GET['dest']);
    $command = escapeshellcmd('python3 /var/www/visa/' . $dest . '_visa.py ' . $fid);
    $output = shell_exec($command);
    if(strpos($output, 'success') == false){
        echo "Automation has failed.";
    } else {
        echo "Automation has succeeded.";
    }
?>
<?php get_footer(); ?>