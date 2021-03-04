<!DOCTYPE html>
<html>
<head>
<title>Work2</title>

<style>
*
{
padding:0px;
margin:0px;
}

.menubar
{
background-color:black;
text-align:center;

}
.menubar ul
{
list-style:none;
display:inline-flex;
padding:15px;

}
.menubar ul li a
{
text-decoration:none;
color:white;
padding:15px;
}
.menubar ul li
{
padding:10px;

}
.menubar ul li a:hover
{
background-color:green;
border-radius:10px;

}
.submenu
{
display:none;
}
.menubar ul li:hover .submenu
{
display:block;
position:absolute;
background-color:black;
border-radius:10px;

}
.menubar ul li:hover .submenu ul
{
display:block;
}
.submenu ul li
{
border-bottom:2px solid green;
}
.row
{

display:flex;
}
.col h2
{
text-align:center;
text-decoration:underline;
}
.ft
{
background-color:black;
padding:50px;
text-align:center;
color:white;
}

.first
{
background-image:url("../img/usr.jpg");
background-size:cover;



}
h1
{
font-size: 60px;
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
<body class="first" >
  <!-- Header start -->
  <header>
      <nav>
        <div class="top container-fluid">
            <div class="row">
           
                <div class="col-7 text-white">

                    <h4 class="h5">User Home Page</h4>
                </div>
                <div class="col-5 text-end text-white">
                    <i class="fab fa-facebook  "></i>
                    <i class="fab fa-instagram "></i>
                    <i class="fab fa-youtube "></i>
                     <i class="fab fa-google "></i>
                </div>
            </div>
        </div>
      </nav>
<div class="first">
<nav class="menubar navbar-light">

<ul>
<li> <a href="<?php echo base_url()?>Main/user_dashboard">HOME </a></li>



</li>
<li> <a href="<?php echo base_url()?>Main/update_user_det">Update Profile</a>
  <li> <a href="<?php echo base_url()?>Main/login">LOGOUT</a>
</ul>
</nav>






</body>
</html>