<?php
/**
* Template Name: M visa order detail
*
* @package WordPress
* @subpackage visa_visum
* @since Visa 1.0
*/
get_header(); ?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

 <div class="dashboard_top">
    <div class="left_logo">
           <a href="#"><img src="/wp-content/uploads/2020/01/travel_image.png" alt="Travel Image"></a>
        </div><!-- end of left_logo-->
        <div class="top_bar">
            <div class="searchbar"><i class="fa fa-search" aria-hidden="true"></i><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."></div>
            <div class="right_bar">
                <a href="#" class="notification"><img src="" alt=""></a>
                <a href="#" class="logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>logout</a>
            </div>
        </div><!-- end of top_bar-->
    </div><!-- end of dashboard_top-->

<div class="dashboard">
  
    <div class="left_dash">
    <h5>Navigation</h5>
        <div class="dashboard_menu">
             <a href="#" class="active"><span><i class="fa fa-shopping-cart"></i> </span>Orders</a>
            <a href="#"><span><i class="fa fa-th-large" aria-hidden="true"></i> </span> Statistics</a>
        </div>
    </div>
    <div class="right_dash">
       
        <div class="dash_menu">
            <div class="menu_title">
                <h3>ID 01 | Rusland | Jurdemail@gmail.com </h3>
            </div>
            <div class="menu-list">
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Single Transcation</a></li>
                </ul>
            </div><!-- end of menu_list-->
        </div><!-- end of dash_menu-->
        
        <div class="order_lists">
            <ul class="list-unstyled order_options">
                <li><a href="#">Canceled</a></li>
                <li><a href="#">Received</a></li>
                <li><a href="#">Submitted</a></li>
                <li><a href="#">Processed</a></li>
                <li><a href="#">Send to Client</a></li>
                <li><a href="#">Completed</a></li>
                <li class="green"><a href="#">Closed</a></li>
                <li class="red"><a href="#">Delete order</a></li>
                <li class="purple"><a href="#">Edit visa</a></li>
            </ul><!-- end of order_options-->
        </div><!-- end of order_lists-->

        <div class="visa_comments">
        <div class="visa_details">
            <h3>Visa details</h3>
            <div class="visa_details_list">
                <div class="visa_detailing">
                    <h4>Size</h4>
                    <h5>477 (bytes)</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Height</h4>
                    <h5>57482</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Received Time</h4>
                    <h5>04 June 2018, 14:25:58</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Lock Time</h4>
                    <h5>Block: 453672</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Included in Blocks</h4>
                    <h5>453672 ( 04 June 2018, 14:25:58 + 2 Minutes )</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Confirmations</h4>
                    <h5>18 Completed</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Total Inputs</h4>
                    <h5>6 704 250 BTC</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Total Outputs</h4>
                    <h5>6 694 950 BTC</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>TX Fees</h4>
                    <h5>0.24578124579546201 BTC</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Estimated BTC Transacted</h4>
                    <h5>6 694 950 BTC</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Visualize</h4>
                    <h5>View Tree Chart</h5>
                </div><!-- end of visa_detailing-->
                <div class="visa_detailing">
                    <h4>Visualize</h4>
                    <h5>Show Scripts & Currency</h5>
                </div><!-- end of visa_detailing-->
            </div><!-- end of visa_details_list-->
        </div><!-- end of visa_details-->

        <div class="comments">
            <h3>Comments</h3>
            <div class="comments_connect">
                <div class="updated_system">
                <div class="comment_image">
                    <img src="<?php echo get_stylesheet_directory_uri()?>/images/profile_logo.png" class="img-fluid">
                </div><!-- end of comment_image-->
                <div class="system_details">
                    <h3>System <span>30-12-2019</span></h3>
                    <h2>Order was updated</h2>
                </div><!-- end of system_details-->
                </div>
            </div><!-- end of comments_connect-->
        </div><!-- end of comments-->
</div><!-- end of visa_comments-->
    </div><!-- end of right_dash-->
</div><!-- end of dashboard-->


<?php get_footer(); ?>