
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
              <li class="breadcrumb-item active">Read</li>
            </ol>
          </div>
        </div>
      </div>
    </section> 
 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Produk List</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            
            <div class="card-body">
              <form role="form" >
        <table class="table">
	    <tr><td>Nama Produk</td><td><?php echo $nama_produk; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Kategori Id</td><td><?php echo $kategori_id; ?></td></tr>
	    <tr><td>Status Id</td><td><?php echo $status_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       
              </form>
             <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
    
    </section>
    <!-- /.content -->
  </div>