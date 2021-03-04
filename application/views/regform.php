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
    <!-- <style>
      .bg
      {
        background-image: url('../img/p.jpg');
        background-size: cover;
      }
    </style> -->
<body class="bg">
<!-- main section start -->
<section class="">
 <!--  <li class="nav-item "><a href="<?php echo base_url()?>main/index"><button type="button" class="btn btn-success" id="">Home</button></a></li> -->
<div class="container ">
<div class="row">
<div class="col-6 mt-5">
  <img src="../img/i.jpg">
  
</div>

<div class="col-6 py-3 mt-4 text-right">
<h3 class="text-dark h2 text-center">REGISTRATION</h3>
<!-- <img src="img/sg.jpg" alt="sample" class="img-fluid img">
 --><!-- </div> -->
<!-- <div class="col-6 box1"> -->
  

<form action="<?php echo base_url()?>Main/reg_insert" method="POST" class="border  border-2 border-light p-5 rounded-bottom rounded bg-dark">

  <div class="row">
    <div class="col-10 mb-3">
      <input type="text" class="form-control" placeholder="First name" name="fname" required maxlength="25" pattern="[a-zA-Z]+" >
       
    </div>
  </div>
  <div class="row">
      <div class="col-10 mb-3">
            <input type="text" class="form-control" placeholder="Last name" name="lname"required maxlength="25" pattern="[a-zA-Z]+" >
          </div>
        </div>
         <div class="row mb-3">
    <div class="col-10">
      <input type="email" class="form-control" placeholder="Email"  id="email" name="email" required="">
      <span id="email_result"></span>
    </div>
  </div>
        <div class="row mb-3">
    <div class="col-10">
      <input type="text" class="form-control" placeholder="mobile" id="phoneno"  name="mobile" required="" pattern="[6-9]{1}[0-9]{9}"><span id="phno_result"></span>
    </div>
  </div>
 <div class="row mb-3">
    <div class="col-10">
      <input type="date" class="form-control" placeholder="DOB"  name="dob" required="">
    </div>
  </div>
<div class=" row mb-3 col-10">
  <div>
  <textarea class="form-control" placeholder="address" rows="3" name="address" required></textarea>
</div>
</div>
<div class=" row mb-3 col-10 ">
  <div >
<tr>
      <td>DISTRICT:</td>
      <td><select class="form-control" name="district">
          <option>PATHANAMTHITTA</option>
          <option>KOLLAM</option>
          <option>ALAPUZHA</option>
          <option>TRIVANDRUM</option>
          <option>WAYANAD</option>
          <option>KANNUR</option>
          <option>EDUKKI</option></select></td>
    
  </div>
  </tr>
</div>
<div class="row mb-3">
  
    <div class="col-10">
      <input type="text" class="form-control" placeholder="pincode"  name="pincode" required="">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-10">
      <input type="text" class="form-control" placeholder="username" id="username" name="username" required=""><span id="uname_availability"></span>
    </div>
  </div>

  
  
  <div class="row mb-3">
    <div class="col-10">
      <input type="password" class="form-control" placeholder="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
    </div>
  </div>
  <input type="submit" name="submit" class="btn btn-warning" value="sign-up">

 
 
  </form>
 
</div>

</div>
</div>
</section>
<!-- main section end -->


<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Main/email_availibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  

      $('#phoneno').change(function(){  
           var phoneno = $('#phoneno').val();  
           if(phoneno != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Main/phno_availability",  
                     method:"POST",  
                     data:{phoneno:phoneno},  
                     success:function(data){  
                          $('#phoneno_result').html(data);  
                     }  
                });  
           }  
      });  
       $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Main/uname_availability",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#username_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  

</body>
</html>