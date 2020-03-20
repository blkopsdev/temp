<?php
function comment_form_submit($postData) {
  $dest = $postData['dest'];
  $form_id = $postData['fid'];
  $comment = $postData['comment'];
  
	global $wpdb;
	$form_db = $wpdb->prefix.$dest."_comments";
	$formData = array(
		'uid' => $form_id,
		'comment' => $comment
	);
	$wpdb->insert( $form_db, $formData );
  $redirect_url = "/m-visa-order-details/?fid=".$form_id."&dest=".ucfirst($dest);

  return;
}
?>