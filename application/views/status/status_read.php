
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Status</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Status</a></li>
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
              <h3 class="card-title">Status List</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            
            <div class="card-body">
              <form role="form" >
        <table class="table">
	    <tr><td>Nama Status</td><td><?php echo $nama_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('status') ?>" class="btn btn-default">Cancel</a></td></tr>
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