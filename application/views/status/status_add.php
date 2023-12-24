
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content ">
            <div class="modal-header bg-primary">
              <h4 class="modal-title"id="exampleModalLabel">Status Input</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
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
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('status') ?>" class="btn btn-default">Cancel</a></div>
	     
                
             </form>
          </div> 
        </div> 
      </div> 

      