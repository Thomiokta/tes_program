
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content ">
            <div class="modal-header bg-primary">
              <h4 class="modal-title"id="exampleModalLabel">Produk Input</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
            <form  action="<?php echo $action; ?>" method="post">
      
      <div class="form-group">
            <label for="varchar">Id Produk <?php echo form_error('id_produk') ?></label>
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="ID Produk" value="<?php echo $id_produk; ?>" required/>
        </div> 
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
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a></div>
	     
                
             </form>
          </div> 
        </div> 
      </div> 

      