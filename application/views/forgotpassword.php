<!DOCTYPE html>
<html>
    <head>
        <title>OJT WORK 2</title>
            <meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <!---custom style---->
            <link rel="stylesheet" href="../css/styl.css">
    </head>
    <body >
     
<!-- main section start -->
<section >
<div class="container">
<div class="row">

<div class="col-6 py-5 mt-5 text-right">

<!-- <h2>Reset Your password</h2> -->
<img src="../img/em.jpg" alt="sample" class="img-fluid  mw-100  mx-auto d-block rounded">
</div>
<div class="col-6 box mt-5 p-5  ">

<form  action="<?php echo base_url(); ?>Main/send"  method="post" class="border  border-2 border-light p-5 rounded-bottom rounded bg-dark">

  <div class="row mb-3">
    <div class="col-sm-10">
      <?php 
                if($error=$this->session->flashdata('msg'))
                {
                ?>
                <p style="color:green" class="text-center text-warning"><strong>Successs</strong><?php echo $error;
                        ?></p>
                        <?php }
                        ?>
      <input type="email" class="form-control" placeholder="email" name="email" >
    </div>
  </div>
    <input type="submit" class="btn btn-warning" value="Reset Your Password">
    <a href="<?php echo base_url()?>Main/login"class="text-white ">Home</a>
  </div>

  <!-- <a href="<?php echo base_url()?>Main/"class="text-white ">Home</a>

  <a href="<?php echo base_url()?>Main/reg_form"class="nav-link text-white">Sign-Up</a> -->
 
  </form>
 
</div>

</div>
</div>
</section>
<!-- main section end -->
<section class="">


</section>


<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
</body>
</html>