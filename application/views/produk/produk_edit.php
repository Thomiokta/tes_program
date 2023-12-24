
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
                    </div>
 <div class="card shadow mb-4">

 <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Produk List</h6>
         
</div>
       <div class="card-body">      
    <table class="table table-bordered table-striped " style="margin-bottom: 10px" id="tabel">
            
        </table>    </div> 
        </div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Produk Edit</h4>
              <a href="<?php echo site_url('produk') ?>" type="button"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body"> 
            <form  action="<?php echo $action; ?>" method="post">
                
	    <div class="form-group">
            <label for="varchar">Nama Produk <?php echo form_error('nama_produk') ?></label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" required/>
        </div>
	    <div class="form-group">
            <label for="double">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" required/>
        </div>
	     <div class="form-group">
            <label for="int">Kategori<?php echo form_error('kategori_id') ?></label>
            <select type="text" class="form-control" name="kategori_id">
              <?php foreach ($get_kategori as $kategori) { ?>
                 <option <?php echo $kategori_id == $kategori->id_kategori ? 'selected="selected"' : '' ?> value="<?php echo $kategori->id_kategori;?>"><?php echo $kategori->nama_kategori;?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Status <?php echo form_error('status_id') ?></label>
            <select type="text" class="form-control" name="status_id">
              <?php foreach ($get_status as $status) { ?>
                 <option <?php echo $status_id == $status->id_status ? 'selected="selected"' : '' ?> value="<?php echo $status->id_status;?>"><?php echo $status->nama_status;?></option>
              <?php } ?>
            </select>
        </div>
	   </div>
            <div class="modal-footer justify-content-between">
             <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a></div>
	     
                
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