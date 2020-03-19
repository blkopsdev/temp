<?php
$visa_id = $_GET['fid'];
$visa_destination = $_GET['dest'];

if ($visa_destination == 'Russia') {
	$main_table = $wpdb->prefix.'russia_visa_form_new';
  
  $sql = "select pdfpath from ".$main_table." where ID = ".$visa_id;

	$main_results = $wpdb->get_results($sql,ARRAY_A);
	$wpdb->flush();
  
  if(!empty($main_results[0]['pdfpath'])){ 
    $doc_path = $main_results[0]['pdfpath'];
    $doc_url = str_replace('/var/www/html', '', $doc_path);
    $doc_name = basename($doc_path) .PHP_EOL;
    $created_date = date ("d F Y", filemtime($doc_path));
?>
	    <h3>Documents</h3>
	    <div class="document_details_list">
        <table class="display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Date created</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong><?php echo $doc_name; ?></strong></td>
              <td><?php echo $created_date; ?></td>
              <td><strong><a href="<?php echo $doc_url; ?>" target="_blank">View</a></strong></td>
            </tr>
          </tbody>
        </table>
        
	    </div>
  <?php 
  }
} 
?>