<?php
function commmon_new($data) {
  global $wpdb;
  $common_db = $wpdb->prefix."common";
  $wpdb->insert( $common_db, $intended_data);
}
?>