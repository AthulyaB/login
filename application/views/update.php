<!DOCTYPE html>
<html>
<head>
	<title>updation</title>
	<style>
		fieldset{
			padding: 10px;
			margin-left:450px;
			text-align:center;
		}
		input{
			padding:10px;
			margin-top: 5px;
			text-align:center;
		}
		textarea{

			margin-top: 5px;
			text-align:center;
		}body
        {
            background-image: url(../img/8.jpg);
            background-size:cover;
            width: 600px;
        }


	</style>
    <meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <!---custom style---->
</head>
</head>
<body>
    <a href="<?php echo base_url()?>Main/user_dashboard">Back To dashboard</a>
    <h3 class="h4 text-center text-info">UPDATE PROFILE</h3>
	<form action="<?php echo base_url()?>Main/updatdetails" method="POST"class="form-control">
       <?php
        if(isset($user_data))
        {
            foreach($user_data->result() as $row1) 
            {
                ?>

		
		<input type="text" name="fname" placeholder="First Name" value="<?php echo $row1->fname;?>"class="form-control"></br>

        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row1->lname;?>"class="form-control"></br>

        <input type="email" name="email" placeholder="Email Address" value="<?php echo $row1->email;?>"class="form-control"></br>

        <input type="text" name="mobile" placeholder="Phone Number" value="<?php echo $row1->mobile;?>"class="form-control"></br>

        <input type="date" name="dob" placeholder="Date Of Birth" value="<?php echo $row1->dob;?>"class="form-control"></br>

        <input type="text" name="address" placeholder="Address" value="<?php echo $row1->address;?>"class="form-control"></br>

        <input type="text" name="district" placeholder="District" value="<?php echo $row1->district;?>"class="form-control"></br>

        <input type="text" name="pincode" placeholder="Pin Number" value="<?php echo $row1->pincode;?>"class="form-control"></br>

        <input type="text" name="username" placeholder="User Name" value="<?php echo $row1->username;?>"class="form-control"></br>

        <!-- <input type="text" name="password" placeholder="password" value="<?php echo $row1->password;?>"></br>
 -->
	    <input type="hidden" name="id" value="<?php echo $row1->id; ?>">
        <button type="submit" name="update"  value="update"class="btn btn-success">Update</button>

         </form>
    <?php
}
    }
?>
  

  
</body>
</html>