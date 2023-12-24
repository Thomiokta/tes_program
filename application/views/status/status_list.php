     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Status</h1>
                    </div>
 <div class="card shadow mb-4">

 <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Status List</h6>
         
</div>
       <div class="card-body">      
    <a href="<?php echo base_url();?>Status/calldata" class="btn btn-primary btn-circle">
                                        <i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="ADD"></i>
                                    </a>
    <a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Create"></i>
                                    </a>


        <table class="table table-bordered table-striped " style="margin-bottom: 10px" id="tabel">
            <thead><tr>
                <th>No</th>
		<th>Nama Status</th>
		<th>Action</th>
            </tr></thead><tbody><?php
            foreach ($status_data as $status)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td class="table_data" data-row_id="<?php echo $status->id_status ?>" data-column_name="nama_status" contenteditable><?php echo $status->nama_status ?></td>
			<td style="text-align:center; min-width: 110px;"  >
				<?php 
				echo anchor(site_url('status/read/'.$status->id_status),'<i class="fas fa-eye"></i>','class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="Read"'); 
				echo anchor(site_url('status/update/'.$status->id_status),'<i class="fas fa-edit"></i>','class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"'); 
				echo anchor(site_url('status/delete/'.$status->id_status),'<i class="fas fa-trash"></i>','class="btn btn-danger btn-circle alert_notif" data-toggle="tooltip" data-placement="top" title="Delete"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?></tbody>
        </table>  
          </div> 
        </div>
        
 <?php $this->load->view('Status/status_add')?> 
 <script src="<?php echo base_url()?>asset/vendor/jquery/jquery-3.7.1.min.js"></script>
 <script>
$(document).ready(function(){  
 $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>Status/live_update",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        Swal.fire({
  icon: 'success',
  title: 'Edit Success ',
  showConfirmButton: false,
  timer: 1000
}) 
        load_data();
      }
    })
  });
 

});
</script>