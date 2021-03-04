<!DOCTYPE html>
<html>
<head>

<style>
	table,tr,td
	{
		border:2px solid black;
		padding:20px;
		border-collapse:collapse;
		margin:10px;
		width:100px;

		margin-top: 50px;
		/*color:white;*/
		margin-right: 100px;
	}
	/*.bi{
	background-image:url("../img/th.jpg");
	background-size:cover;
      }*/
.tb
{
	font-family:Arial;
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
<body class="bi">
	<center>

	<form method="post" action="">
		<h1>STUDENT DETAILS</h1>

	<table border="2" class="table  table-info">

		
		<tr>
			<td>FIRSTNAME</td>
			<td>LASTNAME</td>
			<td>EMAIL</td>
			<td>MOBILE</td>
			<td>DOB</td>
			<td>ADDRESS</td>
			<td>DISTRICT</td>
			<td>PINCODE</td>
			<td>USERNAME</td>
			<td>ACTION</td>
			<td>ACTION</td>
			<td>ACTION</td>
		</tr>
		<?php
		if($n->num_rows()>0)
		{
			foreach($n->result()as $row)
			{

	?>
	


	<tr>
		<td>
			<?php echo $row->fname;?>
		</td>
	    <td>
	    	<?php echo $row->lname;?>
	    </td>
	    <td>
	    	<?php echo $row->email;?>
	    </td>
	    <td>
	    	<?php echo $row->mobile;?>
	    </td>
	    <td>
	    	<?php echo $row->dob;?>
	    </td>
	     <td>
	    	<?php echo $row->address;?>
	    </td>
	     <td>
	    	<?php echo $row->district;?>
	    </td>
	     <td>
	    	<?php echo $row->pincode;?>
	    </td>
	     <td>
	    	<?php echo $row->username;?>
	    </td>
	    <?php
	    if($row->status==1)
	    {
	    	?>
	    	<td>Approved</td>
	    	<td>
	    	<a href="<?php echo base_url()?>Main/rejected/<?php echo $row->id;?>">Reject</a>
	    </td>
	    	<?php

	    }
	   elseif($row->status==2)
	   {
	   	?>
	   	<td>Rejected</td>
	   	<td>
	    	<a href="<?php echo base_url()?>Main/approved/<?php echo $row->id;?>">Approve</a>
	    </td>
	   	<?php
	   }
	   else
	   {
	   	?>

	   
	    <td>
	    	<a href="<?php echo base_url()?>Main/approved/<?php echo $row->id;?>">Approve</a>
	    </td>
	    <td>
	    	<a href="<?php echo base_url()?>Main/rejected/<?php echo $row->id;?>">Reject</a>
	    </td>
	    
<?php
}
?>
<td>
	    	<a href="<?php echo base_url()?>Main/delete/<?php echo $row->id;?>">Delete</a>
	    </td>
	</tr>
	<?php
			}
		
	}
	
	 
	?>
</center>

	</table>
</form>
</body>
</html>