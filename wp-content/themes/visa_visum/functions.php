<?php
add_action( 'wp_enqueue_scripts', 'parentStyleEnqueue' );
function parentStyleEnqueue() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    /*wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ),
        wp_get_theme()->get('Version')
    );*/
}

add_action( 'admin_enqueue_scripts', 'admin_wp_enqueue_style_script' );
function admin_wp_enqueue_style_script() {
    wp_enqueue_style( 'admin-style-css', get_stylesheet_directory_uri() . '/admin/admin_css.css', array(), '1.0.0' );
    wp_enqueue_script('admin-script', get_stylesheet_directory_uri() . '/admin/admin_js.js', array('jquery'), '1.0.0', true);
}


add_action("wp_ajax_destination_table_edit", "destination_table_edit");
add_action("wp_ajax_nopriv_destination_table_edit", "none_login_user");

function destination_table_edit() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "destination_table_edit_nonce")) {
      exit("No naughty business please");
   }
   global $wpdb;
   $destination_table = $wpdb->prefix."user_destination";
   $postID = $_POST['post_id'];
   $selectQuery = $wpdb->get_results("SELECT * FROM $destination_table WHERE id = $postID");
   $result = json_encode($selectQuery);
   echo $result;
   die();
}

add_action("wp_ajax_destination_table_delete", "destination_table_delete");
add_action("wp_ajax_nopriv_destination_table_delete", "none_login_user");

function destination_table_delete() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "destination_table_delete_nonce")) {
      exit("No naughty business please");
   }
   global $wpdb;
   $destination_table = $wpdb->prefix."user_destination";
   $postID = $_POST['post_id'];
   $selectQuery = $wpdb->delete( $destination_table, array( 'id' =>  $_POST['post_id'] ) );
   $result = json_encode($selectQuery);
   echo $result;
   die();
}

function none_login_user() {
    echo "You must log in to vote";
    die();
 }

function my_enqueue() {
  wp_enqueue_style( 'mDashboard-style', get_stylesheet_directory_uri() . '/css/mDashboard.css' );
	//wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/my-ajax-script.js', array('jquery') );
  wp_enqueue_script('sticky-sidebar', get_stylesheet_directory_uri() . '/js/jquery.sticky-sidebar.js', array('jquery'),null,true);
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/custom-js.js', array('jquery'));
  wp_enqueue_script('matlasforms-js', get_stylesheet_directory_uri() . '/js/matlasforms.js', array('jquery'));
	wp_localize_script( 'custom-js', 'myAjax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script('sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', array(), '3', true);
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );


function my_get_purpose() {
	$result = array();
	$result['success'] = false;

	if(isset($_REQUEST['destination_id']) && !empty($_REQUEST['destination_id'])){
		$destination_id = $_REQUEST['destination_id'];

		global $wpdb;
		$user_travel_purpose = $wpdb->prefix."travel_purpose";
		$user_destination = $wpdb->prefix."user_destination";

		$qry = "SELECT tp.id,tp.purpose FROM $user_travel_purpose tp inner join $user_destination ud on tp.id = ud.purpose_id where ud.nationality_id = $destination_id";

		$purposeQuery = $wpdb->get_results( $qry );

		if(!empty($purposeQuery)){
			$result['success'] = true;
			$result['data'] = $purposeQuery;
		}
	}
	echo json_encode($result);
    die();
}
add_action("wp_ajax_my_get_purpose", "my_get_purpose");
add_action("wp_ajax_nopriv_my_get_purpose", "my_get_purpose");

function my_get_destinations() {
	$result = array();
	$result['success'] = false;

	if(isset($_REQUEST['destination_id']) && !empty($_REQUEST['destination_id'])){
		$destination_id = $_REQUEST['destination_id'];

		global $wpdb;
		$user_travel_purpose = $wpdb->prefix."travel_purpose";
		$user_destination = $wpdb->prefix."user_destination";

		$qry = "SELECT tp.id,tp.purpose FROM $user_travel_purpose tp inner join $user_destination ud on tp.id = ud.purpose_id where ud.nationality_id = $destination_id";

		$purposeQuery = $wpdb->get_results( $qry );

		if(!empty($purposeQuery)){
			$result['success'] = true;
			$result['data'] = $purposeQuery;
		}
	}
	echo json_encode($result);
    die();
}
add_action("wp_ajax_get_destinations", "my_get_destinations");
add_action("wp_ajax_nopriv_get_destinations", "my_get_destinations");

function get_destination_post() {
	$result = array();
	$result['success'] = false;
	if(isset($_REQUEST['destination_id']) && !empty($_REQUEST['destination_id'])&& isset($_REQUEST['purpose_id']) && !empty($_REQUEST['purpose_id'])){
		$destination_id = $_REQUEST['destination_id'];
		$purpose_id = $_REQUEST['purpose_id'];

		global $wpdb;
		$user_travel_purpose = $wpdb->prefix."travel_purpose";
		$user_destination = $wpdb->prefix."user_destination";

		$qry = "SELECT ud.destination_id FROM $user_travel_purpose tp inner join $user_destination ud on tp.id = ud.purpose_id WHERE ud.nationality_id = $destination_id AND tp.id = $purpose_id";

		$destPostQuery = $wpdb->get_results( $qry , ARRAY_A);

		if(isset($destPostQuery[0]['destination_id']) && !empty($destPostQuery[0]['destination_id'])){
			$post_id = $destPostQuery[0]['destination_id'];
			$perma = get_permalink($post_id);
			$result['success'] = true;
			$result['url'] = $perma;
		}
	}
	echo json_encode($result);
    die();
}
add_action("wp_ajax_get_destination_post", "get_destination_post");
add_action("wp_ajax_nopriv_get_destination_post", "get_destination_post");

add_action("wp_ajax_travel_purpose_table_edit", "travel_purpose_table_edit");
add_action("wp_ajax_nopriv_travel_purpose_table_edit", "none_login_user");

function travel_purpose_table_edit() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "travel_purpose_table_edit_nonce")) {
      exit("No naughty business please");
   }
   global $wpdb;
   $travel_purpose_table = $wpdb->prefix."travel_purpose";
   $postID = $_POST['post_id'];
   $selectQuery = $wpdb->get_results("SELECT * FROM $travel_purpose_table WHERE id = $postID");
   $result = json_encode($selectQuery);
   echo $result;
   die();
}

add_action("wp_ajax_travel_purpose_table_delete", "travel_purpose_table_delete");
add_action("wp_ajax_nopriv_travel_purpose_table_delete", "none_login_user");

function travel_purpose_table_delete() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "travel_purpose_table_delete_nonce")) {
      exit("No naughty business please");
   }
   global $wpdb;
   $travel_purpose_table = $wpdb->prefix."travel_purpose";
   $postID = $_POST['post_id'];
   $selectQuery = $wpdb->delete( $travel_purpose_table, array( 'id' =>  $_POST['post_id'] ) );
   $result = json_encode($selectQuery);
   echo $result;
   die();
}

add_action("wp_ajax_user_nationality_table_edit", "user_nationality_table_edit");
add_action("wp_ajax_nopriv_user_nationality_table_edit", "none_login_user");

function user_nationality_table_edit() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "user_nationality_table_edit_nonce")) {
      exit("No naughty business please");
   }
   global $wpdb;
   $user_nationality_table = $wpdb->prefix."user_nationality";
   $postID = $_POST['post_id'];
   $selectQuery = $wpdb->get_results("SELECT * FROM $user_nationality_table WHERE id = $postID");
   $result = json_encode($selectQuery);
   echo $result;
   die();
}

add_action("wp_ajax_user_nationality_table_delete", "user_nationality_table_delete");
add_action("wp_ajax_nopriv_user_nationality_table_delete", "none_login_user");

function user_nationality_table_delete() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "user_nationality_table_delete_nonce")) {
      exit("No naughty business please");
   }
   global $wpdb;
   $user_nationality_table = $wpdb->prefix."user_nationality";
   $postID = $_POST['post_id'];
   $selectQuery = $wpdb->delete( $user_nationality_table, array( 'id' =>  $_POST['post_id'] ) );
   $result = json_encode($selectQuery);
   echo $result;
   die();
}

function get_list_countries() {
   global $wpdb;
   $countries_table = $wpdb->prefix."countries";
   $countries = $wpdb->get_results("SELECT * FROM $countries_table");
   return $countries;
}

require_once get_stylesheet_directory() . "/inc/travelDB.php"; // create table
require_once get_stylesheet_directory() . "/inc/nationalitylist.php"; // admin add/update/delete for nationality list
require_once get_stylesheet_directory() . "/inc/purpose_list.php"; // admin add/update/delete for purpose_list
require_once get_stylesheet_directory() . "/inc/desination_menu_list.php"; // admin add/update/delete for desination_menu_list
require_once get_stylesheet_directory() . "/inc/post_type/destination.php"; // destination post type
require_once get_stylesheet_directory() . "/matlasvc/matlasvc.php"; // Custom Visual composer elements
require_once get_stylesheet_directory() . "/inc/visa_form/visa_form_global_table.php"; // China Form SQL



//Enqueue  Admin side scripts
add_action( 'admin_enqueue_scripts', 'admin_visa_entries_styles_enqueue' );
function admin_visa_entries_styles_enqueue() {
  wp_enqueue_script('visa-datatable-script', get_stylesheet_directory_uri() . '/admin/assets/js/dataTables.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_style( 'visa_datatable_style', get_stylesheet_directory_uri() . '/admin/assets/css/dataTables.min.css', array(), '1.0.0' );
}


add_action('admin_menu', 'visa_entries_admin_menu');
function visa_entries_admin_menu() {
  $page_title = 'Visa Entries';
  $menu_title = 'visa Entries';
  $capability = 'edit_posts';
  $menu_slug = 'visa-entries-menu';
  $function = 'visa_entries_menu';
  $icon_url = '';
  $position = 30;

  add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

function visa_entries_menu() {
  global $wpdb;
  ?>
  <div class="wrap">
  <?php
  if (isset($_GET['id']) && isset($_GET['destination'])) {
    $visa_id = $_GET['id'];
    $visa_destination = $_GET['destination'];

    if ($visa_destination == 'Russia') {

      $main_table = $wpdb->prefix.'russia_visa_form_new';
      $traveral_table = $wpdb->prefix."russia_visa_traverler_data_new";
      $intended_table= $wpdb->prefix."russia_intended_data";
      $place_table= $wpdb->prefix."russia_place_visit_data";

      $sql = "select * from ".$main_table." where ID = ".$visa_id;

      $traveral_sql = "select * from ".$traveral_table." where russia_form_id = ".$visa_id;

      $intended_sql = "select * from ".$intended_table." where russia_id = ".$visa_id;

      $place_sql = "select * from ".$place_table." where russia_id = ".$visa_id;

      $main_results = $wpdb->get_results($sql,ARRAY_A);
      $wpdb->flush();

      $traveral_results = $wpdb->get_results($traveral_sql,ARRAY_A);
      $wpdb->flush();

      $intended_results = $wpdb->get_results($intended_sql,ARRAY_A);
      $wpdb->flush();

      $place_results = $wpdb->get_results($place_sql,ARRAY_A);
      $wpdb->flush();
      ?>
      <div class="visa-entries-class">
        <?php if(!empty($main_results)){ ?>
        <div class="general-data">
          <h3 style="text-align: center;">General Information</h3>
          <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
            <?php
            for ($mr = 0; $mr < sizeof($main_results); $mr++){
              foreach ($main_results[$mr] as $key => $value){
                if($value != ''){
                ?>
                  <tr>
                    <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                    </th>
                    <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                    </td>
                  </tr>
              <?php
                }
              }
            } ?>
          </table>
        </div>
      <?php }
      if(!empty($traveral_results)){ ?>
        <div class="traveral-data">
          <h3 style="text-align: center;">Traveral Information</h3>
            <?php
            for ($tr = 0; $tr < sizeof($traveral_results); $tr++){
              ?>
              <h4 style="text-align: center;">Traveral - <?php echo $tr+1; ?></h4>
              <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
              <?php
              foreach ($traveral_results[$tr] as $key => $value){
                if($value != ''){
                ?>
                  <tr>
                    <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                    </th>
                    <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                    </td>
                  </tr>
              <?php
                }
              } ?>
              </table>
              <?php
            } ?>
        </div>
      <?php }
      if(!empty($intended_results)){ ?>
        <div class="Intended-data">
          <h3 style="text-align: center;">Intended Information</h3>
            <?php
            for ($ir = 0; $ir < sizeof($intended_results); $ir++){
            ?>
            <h4 style="text-align: center;">Intended - <?php echo $ir+1; ?></h4>
            <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
            <?php
              foreach ($intended_results[$ir] as $key => $value){
                if($value != ''){
                ?>
                  <tr>
                    <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                    </th>
                    <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                    </td>
                  </tr>
              <?php
                }
              }?>
          </table>
              <?php
            }
            ?>
        </div>
      <?php }
      if(!empty($place_results)){ ?>
        <div class="Place-data">
          <h3 style="text-align: center;">Place to visit Information</h3>
            <?php
            for ($pv = 0; $pv < sizeof($place_results); $pv++){
            ?>
            <h4 style="text-align: center;">Place - <?php echo $pv+1; ?></h4>
            <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
            <?php
              foreach ($place_results[$pv] as $key => $value){
                if($value != ''){
                ?>
                  <tr>
                    <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                    </th>
                    <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                    </td>
                  </tr>
              <?php
                }
              }?>
          </table>
              <?php
            }
            ?>
        </div>
      <?php } ?>
      </div>
      <?php
    }
    if ($visa_destination == 'Thailand') {

      $main_table = $wpdb->prefix.'thailand_visa_form_new';
      $traveral_table = $wpdb->prefix."thailand_visa_traverler_data_new";

      $sql = "select * from ".$main_table." where ID = ".$visa_id;

      $traveral_sql = "select * from ".$traveral_table." where thailand_form_id = ".$visa_id;

      $main_results = $wpdb->get_results($sql,ARRAY_A);
      $wpdb->flush();

      $traveral_results = $wpdb->get_results($traveral_sql,ARRAY_A);
      $wpdb->flush();
      ?>
      <div class="visa-entries-class">
        <?php if(!empty($main_results)){ ?>
          <div class="general-data">
            <h3 style="text-align: center;">General Information</h3>
            <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
              <?php
              for ($mr = 0; $mr < sizeof($main_results); $mr++){
                foreach ($main_results[$mr] as $key => $value){
                  if($value != ''){
                    ?>
                    <tr>
                      <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                    </th>
                    <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                    </td>
                  </tr>
                  <?php
                  }
                }
              } ?>
            </table>
          </div>
        <?php }
        if(!empty($traveral_results)){ ?>
          <div class="traveral-data">
            <h3 style="text-align: center;">Traveral Information</h3>
            <?php
            for ($tr = 0; $tr < sizeof($traveral_results); $tr++){
            ?>
              <h4 style="text-align: center;">Traveral - <?php echo $tr+1; ?></h4>
              <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
                <?php
                foreach ($traveral_results[$tr] as $key => $value){
                  if($value != ''){
                    ?>
                    <tr>
                      <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                      </th>
                      <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                      </td>
                    </tr>
                  <?php
                  }
                } ?>
              </table>
            <?php
            } ?>
          </div>
        <?php
        } ?>
      </div>
    <?php
    }

    if ($visa_destination == 'Indonesia') {

      $main_table = $wpdb->prefix.'indonesia_visa_form_new';
      $traveral_table = $wpdb->prefix."indonesia_visa_traverler_data_new";

      $sql = "select * from ".$main_table." where ID = ".$visa_id;

      $traveral_sql = "select * from ".$traveral_table." where indonesia_form_id = ".$visa_id;

      $main_results = $wpdb->get_results($sql,ARRAY_A);
      $wpdb->flush();

      $traveral_results = $wpdb->get_results($traveral_sql,ARRAY_A);
      $wpdb->flush();
      ?>
      <div class="visa-entries-class">
        <?php if(!empty($main_results)){ ?>
          <div class="general-data">
            <h3 style="text-align: center;">General Information</h3>
            <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
              <?php
              for ($mr = 0; $mr < sizeof($main_results); $mr++){
                foreach ($main_results[$mr] as $key => $value){
                  if($value != ''){
                    ?>
                    <tr>
                      <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                    </th>
                    <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                    </td>
                  </tr>
                  <?php
                  }
                }
              } ?>
            </table>
          </div>
        <?php }
        if(!empty($traveral_results)){ ?>
          <div class="traveral-data">
            <h3 style="text-align: center;">Traveral Information</h3>
            <?php
            for ($tr = 0; $tr < sizeof($traveral_results); $tr++){
            ?>
              <h4 style="text-align: center;">Traveral - <?php echo $tr+1; ?></h4>
              <table align="center" style="border: 1px solid black;border-collapse:collapse; width: 50%;">
                <?php
                foreach ($traveral_results[$tr] as $key => $value){
                  if($value != ''){
                    ?>
                    <tr>
                      <th style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $key; ?>
                      </th>
                      <td style="border: 1px solid black;border-collapse:collapse;padding: 5px;text-align: left;"><?php echo $value; ?>
                      </td>
                    </tr>
                  <?php
                  }
                } ?>
              </table>
            <?php
            } ?>
          </div>
        <?php
        } ?>
      </div>
    <?php
    }
  }
  else{
    // records for russia
    $russia_table = $wpdb->prefix.'russia_visa_form_new';
    $russia_sql = "select * from ".$russia_table;
    $russia_results = $wpdb->get_results($russia_sql);

    // records for thailand
    $thailand_table = $wpdb->prefix.'thailand_visa_form_new';
    $thailand_sql = "select * from ".$thailand_table;
    $thailand_results = $wpdb->get_results($thailand_sql);

    // records for indonesia
    $indonesia_table = $wpdb->prefix.'indonesia_visa_form_new';
    $indonesia_sql = "select * from ".$indonesia_table;
    $indonesia_results = $wpdb->get_results($indonesia_sql);

    if($russia_results != 0 || $thailand_results != 0 || $indonesia_results != 0){ ?>
      <div class="visa-entries-class">
        <table id="visa_table" class="stripe cell-border insurance-record-table">
          <thead style="text-align: left;">
            <tr>
              <th>Email</th>
              <th>Destination</th>
              <th>Nationality</th>
              <th>Purpose</th>
              <th>Duration</th>
              <th>Arrival Date</th>
              <th>Telephone</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($russia_results != 0) {
              foreach($russia_results as $russia_result){?>
                <tr>
                  <td><?php echo $russia_result->email_address; ?></td>
                  <td><?php echo $russia_result->destination_country; ?></td>
                  <td><?php echo $russia_result->nationality; ?></td>
                  <td><?php echo $russia_result->purpose; ?></td>
                  <td><?php echo $russia_result->duration; ?></td>
                  <td><?php echo $russia_result->arrival_date; ?></td>
                  <td><?php echo $russia_result->telephone; ?></td>
                  <td><a id="details" data-id="<?php echo $russia_result->ID; ?>"data-destination = "<?php echo $russia_result->destination_country; ?>" href="<?php echo add_query_arg( array('id' => $russia_result->ID ,'destination' => $russia_result->destination_country,), $_SERVER['REQUEST_URI']);?>">View Details</a></td>
                </tr>
              <?php }
            } ?>
            <?php
            if ($thailand_results != 0) {
              foreach($thailand_results as $thailand_result){?>
                <tr>
                  <td><?php echo $thailand_result->email_address; ?></td>
                  <td><?php echo $thailand_result->destination_country; ?></td>
                  <td><?php echo $thailand_result->nationality; ?></td>
                  <td><?php echo $thailand_result->purpose; ?></td>
                  <td><?php echo $thailand_result->duration; ?></td>
                  <td><?php echo $thailand_result->arrival_date; ?></td>
                  <td><?php echo $thailand_result->telephone; ?></td>
                  <td><a id="details" data-id="<?php echo $thailand_result->ID; ?>"data-destination = "<?php echo $thailand_result->destination_country; ?>" href="<?php echo add_query_arg( array('id' => $thailand_result->ID ,'destination' => $thailand_result->destination_country,), $_SERVER['REQUEST_URI']);?>">View Details</a></td>
                </tr>
              <?php }
            } ?>
            <?php
            if ($indonesia_results != 0) {
              foreach($indonesia_results as $indonesia_result){?>
                <tr>
                  <td><?php echo $indonesia_result->email_address; ?></td>
                  <td><?php echo $indonesia_result->destination_country; ?></td>
                  <td><?php echo $indonesia_result->nationality; ?></td>
                  <td><?php echo $indonesia_result->purpose; ?></td>
                  <td><?php echo $indonesia_result->duration; ?></td>
                  <td><?php echo $indonesia_result->arrival_date; ?></td>
                  <td><?php echo $indonesia_result->telephone; ?></td>
                  <td><a id="details" data-id="<?php echo $indonesia_result->ID; ?>"data-destination = "<?php echo $indonesia_result->destination_country; ?>" href="<?php echo add_query_arg( array('id' => $indonesia_result->ID ,'destination' => $indonesia_result->destination_country,), $_SERVER['REQUEST_URI']);?>">View Details</a></td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
      </div>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Setup - add a text input to each footer cell
            $('#visa_table thead tr').clone(true).appendTo( '#visa_table thead' );
            $('#visa_table thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                if (title != 'Detail') {
                  $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

                  $( 'input', this ).on( 'keyup change', function () {
                      if ( table.column(i).search() !== this.value ) {
                          table
                              .column(i)
                              .search( this.value )
                              .draw();
                      }
                  } );
                }
                else
                {
                  $(this).html( '' );
                }
            } );

            var table = $('#visa_table').DataTable( {
                orderCellsTop: true,
                fixedHeader: true,
            } );
        } );
      </script>

      <?php
    }
    else{
      echo "<hr/>";
      echo "<h3 class='text-center' style = 'text-align: center;
      font-weight: bold;' >No Requests Yet.</h3>";
    }
  }
}

/*----- Matlas Ajax login -----*/
function ajax_login_init(){
  wp_register_script('ajax-login-script', get_stylesheet_directory_uri() . '/js/ajax-login-script.js', array('jquery') );
  wp_enqueue_script('ajax-login-script');
  wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'redirecturl' => home_url(),
    'loadingmessage' => __('Sending user info, please wait...')
  ));
}

if (!is_user_logged_in()) {
  add_action('init', 'ajax_login_init');
  add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}
  function ajax_login(){
  check_ajax_referer( 'ajax-login-nonce', 'security' );
  $info = array();
  $info['user_login'] = $_POST['username'];
  $info['user_password'] = $_POST['password'];
  $info['remember'] = true;
  $user_signon = wp_signon( $info, false );
  if ( is_wp_error($user_signon) ){
    echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
  } else {
    echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
  }
  die();
}
/*----- Matlas Ajax login -----*/