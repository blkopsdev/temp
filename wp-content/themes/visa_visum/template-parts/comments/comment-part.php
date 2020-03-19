<?php
  // require_once get_stylesheet_directory() . "/template-parts/comments/persistence.php";
  // $comment_post_ID = 1;
  // $db = new Persistence();
  // $comments = $db->get_comments($comment_post_ID);
  // $has_comments = (count($comments) > 0);
  if(!empty($_POST)) {
    $formSubmit = comment_form_submit($_POST);
    //wp_redirect( $redirectURL );
  }

  $visa_id = $_GET['fid'];
  $visa_destination = strtolower($_GET['dest']);


  $main_table = $wpdb->prefix.$visa_destination.'_comments';
  
  $sql = "select * from ".$main_table." where ".$visa_destination."_ID = ".$visa_id." order by created_at";

	$main_results = $wpdb->get_results($sql,ARRAY_A);
	$wpdb->flush();
  
  $formSubmit = '';
  
  $cur_user = wp_get_current_user();
  $cur_uid = $cur_user->ID;

  
?>


<div class="comments_connect">
  
  <?php if(!empty($main_results)){
    for ($i = 0; $i < sizeof($main_results); $i++){
  ?>
    <div class="updated_system">  
      <div class="comment_image">
        <img src="<?php echo get_stylesheet_directory_uri()?>/images/profile_logo.png" class="img-fluid">
      </div>
      <div class="system_details">
        <h3>System <span><?php echo $main_results[$i]['created_at']?></span></h3>
        <h2><?php echo $main_results[$i]['comment'] ?></h2>
      </div>
    </div>
  <?php
    }
  }?>
  
  <div id="respond">
    <form action="" method="post" id="commentform">
      <br>
      <textarea name="comment" id="comment" rows="4" tabindex="4"  required="required" placeholder="Type your comments..."></textarea>
      <input type="hidden" name="dest" value="<?php echo($visa_destination); ?>" id="destination" />
      <input type="hidden" name="fid" value="<?php echo($visa_id); ?>" id="fid" />
      <input type="hidden" name="user_id" value="<?php echo $cur_uid; ?>" id="user_id"/>
      <input name="submit" type="submit" value="Submit comment" />
    </form>
    
  </div>
</div>
  
  