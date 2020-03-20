<?php
/**
* Template Name: M Dashbord
*
* @package WordPress
* @subpackage visa_visum
* @since Visa 1.0
*/
get_header();?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

 <div class="dashboard_top">
    <div class="left_logo">
           <a href="#"><img src="/wp-content/uploads/2020/01/travel_image.png" alt="Travel Image"></a>
        </div><!-- end of left_logo-->
        <div class="top_bar">
            <div class="left_bar"></div>
            <div class="right_bar">
                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span> logout</a>
            </div>
        </div><!-- end of top_bar-->
    </div><!-- end of dashboard_top-->

<div class="dashboard">

    <div class="left_dash">
        <h5>Navigation</h5>
        <div class="dashboard_menu">
            <a href="<?php echo site_url('m-dashboard'); ?>" class="active"><span><i class="fa fa-shopping-cart"></i> </span>Orders</a>
            <a href="<?php echo site_url('m-statistics'); ?>"><span><i class="fa fa-th-large" aria-hidden="true"></i> </span> Statistics</a>
        </div>
    </div>
    <div class="right_dash">

        <div class="dash_menu">
            <div class="menu_title">
                <h3>Visum aanvragen:</h3>
            </div>
        </div>
        <?php
            global $wpdb;
            $wp_common = $wpdb->prefix.'common';
            $russia_table = $wpdb->prefix.'russia_visa_form_new';
            $russia_sql = "select * from ".$wp_common;
            $russia_results = $wpdb->get_results($russia_sql);
            $rowcount = $wpdb->num_rows;
        ?>
        <div class="total">
            <p>total aanvragen:<span class="count"><?php echo $rowcount; ?></span></p>
        </div>
        <br/>
        <div class="table-responsive">
            <table id="example" class="display nowrap" style="width:100%">
                <thead class="filter_header">
                    <tr>
                        <th></th>
                        <th>Status</th>
                        <th>Country</th>
                        <th></th>
                        <th>Purpose</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Country</th>
                        <th>Date created</th>
                        <th>Purpose</th>
                        <th>Duration</th>
                        <th>Arrival date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($russia_results != 0) {
                      foreach($russia_results as $russia_result){
                        $final_status = mtlasgetfield('ID',$russia_result->form_id,$russia_result->table_name,'final_status');
                            switch ($final_status) {
                                case 'Received':
                                    $class = 'grey';
                                    break;
                                case 'Submitted':
                                    $class = 'orange';
                                    break;
                                case 'Action required':
                                    $class = 'red';
                                    break;
                                case 'Send to client':
                                    $class = 'purple';
                                    break;
                                case 'Processed':
                                    $class = 'orange';
                                    break;
                                case 'Completed':
                                    $class = 'green';
                                    break;
                                case 'Closed':
                                    $class = 'green';
                                    break;
                                default:
                                    $class = 'grey';
                                    break;
                            }
                        $destination_country = mtlasgetfield('ID',$russia_result->form_id,$russia_result->table_name,'destination_country');
                        ?>
                        <tr>
                            <td><?php echo $russia_result->id; ?></td>
                            <td><span class="status <?php echo $class; ?>"><?php echo $final_status; ?></span></td>
                            <td><?php echo $russia_result->country; ?></td>
                            <td><?php echo $russia_result->date_created; ?></td>
                            <td><?php echo $russia_result->purpose; ?></td>
                            <td><?php echo $russia_result->duration; ?></td>
                            <td><?php echo $russia_result->arrival_date; ?></td>
                            <td><a href="<?php echo site_url('m-visa-order-details/?fid=').$russia_result->form_id.'&dest='.$destination_country; ?>" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>
<script type="text/javascript">
// Material Design example
jQuery(document).ready(function($) {
    $('#example').DataTable( {
        "columnDefs": [ { "orderable": false , targets: [0,1,2,3,4,5,6,7]} ],
        initComplete: function () {
            this.api().columns().every( function (i) {
                if(i != 0 && i != 3 && i != 5 && i != 6 && i != 7){
                    var column = this;
                    let tmps = '<select><option value=""> Select </option></select>';
                    if(i == 1){
                        tmps = '<select><option value=""> Status </option></select>';
                    } else if(i == 2){
                        tmps = '<select><option value=""> Country </option></select>';
                    } else if(i == 4){
                        tmps = '<select><option value=""> Purpose </option></select>';
                    }
                    var select = $(tmps)
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex( $(this).val() );
                            column.search( val ? '^'+val+'$' : '', true, false ).draw();
                        } );
     
                    column.data().unique().sort().each( function ( d, j ) {
                        let tmp = d.replace( /(<([^>]+)>)/ig, '');
                        select.append( '<option value="'+tmp+'">'+tmp+'</option>' )
                    } );
                }
            } );
        }
    } );

} );
</script>
<style type="text/css">input.mwidth{ max-width: 160px; }</style>
<?php get_footer(); ?>