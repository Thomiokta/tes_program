
 <?php $this->load->view('template/Header')?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
 <?php $this->load->view('template/sidebar')?>
   <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

 <?php $this->load->view('template/navbar')?>
  

<?php echo $contents ?>
    </div>
   
 <?php $this->load->view('template/footer')?>
