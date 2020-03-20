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


<div id="content-wrap" class="container clr">
    <div id="primary" class="content-area clr">
        <main id="content" class="clr site-content" role="main">
            <?php
            if(isset($_GET['fid']) && isset($_GET['dest'])) {
                $fid = $_GET['fid'];
                $dest = strtolower($_GET['dest']);
                $command = escapeshellcmd('python3 /var/www/visa/' . $dest . '_visa.py ' . $fid);
                $output = shell_exec($command);
                if(strpos($output, 'success') == false){
                ?>
                <div class="container">
                    <h2><?php echo "Automation has failed."; ?></h2>
                    <a href="/m-visa-order-details/?fid=<?php echo $fid; ?>&dest=<?php echo $_GET['dest']; ?>">Back</a>
                    <?php
                    } else {
                    ?>
                    <h2><?php echo "Automation has succeeded."; ?></h2>
                    <a href="/m-visa-order-details/?fid=<?php echo $fid; ?>&dest=<?php echo $_GET['dest']; ?>">Back</a>
                    <?php
                    }
                    ?>
                </div>
            <?php } else {?>
                <article class="entry clr">
                    <div class="error404-content clr">
                        <h1><?php esc_html_e( 'Sorry, this page could not be found.', 'total' ); ?></h1>
                        <p><?php esc_html_e( 'The page you are looking for doesn\'t exist, no longer exists or has been moved.', 'total' ); ?></p>
                    </div><!-- .error404-content -->
                </article><!-- .entry -->
            <?php } ?>
        </main><!-- #content -->
    </div><!-- #primary -->
</div><!-- .container -->
<?php 
 get_footer(); ?>