<?php
  
  if(!empty($_POST)) {
    $formSubmit = comment_form_submit($_POST);
  }

  $visa_id = $_GET['fid'];
  $visa_destination = strtolower($_GET['dest']);


  $main_table = $wpdb->prefix.$visa_destination.'_comments';
  
  $sql = "select * from ".$main_table." where uid = ".$visa_id." order by created_at";

	$main_results = $wpdb->get_results($sql,ARRAY_A);
	$wpdb->flush();
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
      <input name="submit" type="submit" value="Submit comment" />
    </form>
    
  </div>
</div>
  
  