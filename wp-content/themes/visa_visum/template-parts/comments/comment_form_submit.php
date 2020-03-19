<?php
function comment_form_submit($postData) {
  $dest = $postData['dest'];
  $form_id = $postData['fid'];
  $comment = $postData['comment'];
  $user_id = $postData['user_id'];
  
	global $wpdb;
	$form_db = $wpdb->prefix.$dest."_comments";
	$formData = array(
		$dest.'_id' => $form_id,
		'comment' => $comment,
		'user_id' => $user_id
	);
	$wpdb->insert( $form_db, $formData );
  $redirect_url = "/m-visa-order-details/?fid=".$form_id."&dest=".ucfirst($dest);

  return;
}
?>