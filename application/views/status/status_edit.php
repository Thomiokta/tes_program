
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Status</h1>
                    </div>
 <div class="card shadow mb-4">

 <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Status List</h6>
         
</div>
       <div class="card-body">      
    <table class="table table-bordered table-striped " style="margin-bottom: 10px" id="tabel">
            
        </table>    </div> 
        </div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Status Edit</h4>
              <a href="<?php echo site_url('status') ?>" type="button"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body"> 
            <form  action="<?php echo $action; ?>" method="post">
                
	    <div class="form-group">
            <label for="varchar">Nama Status <?php echo form_error('nama_status') ?></label>
            <input type="text" class="form-control" name="nama_status" id="nama_status" placeholder="Nama Status" value="<?php echo $nama_status; ?>" required/>
        </div>
	   </div>
            <div class="modal-footer justify-content-between">
             <input type="hidden" name="id_status" value="<?php echo $id_status; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('status') ?>" class="btn btn-default">Cancel</a></div>
	     
                
             </form>
          </div> 
        </div> 
      </div> 

      <script type="text/javascript">
    window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#modal-default").modal({backdrop: 'static', 'show':true}); 
    }
</script> 