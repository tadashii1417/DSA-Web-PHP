<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BK HCM !</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="img/bk1.png">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>


</head>
<body>
<div class="main">

  <div class="row">
  <div class="col-sm-12">
  <nav class="navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="index.php">BKHCM !!!</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="space"><a href="index.php"><i class="fa fa-code ispace"></i>Upload file</a></li>
      <li class="space"><a href="score.php"><i class="fa fa-cogs ispace"></i>Xem điểm</a></li>
      
    </ul>
  
</nav>
</div>
</div>


<div class="row log">
<div class="col-sm-10">
<div class=""><h1 style="text-align:center;">Compile Results</h1></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>
<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">

<form enctype="multipart/form-data" id="form_upload" name="f2" method="POST" >
	<label for="ta">Nhập MSSV: </label>
	<input class="form-control" type="text" name="mssv"><br>
	<input type="submit" name="submit" id="st" class="btn btn-success" value="Xem điểm"><br><br><br>
</form>

<?php
    error_reporting(0);
    $mssv = htmlspecialchars($_REQUEST['mssv']); 
    $thisdir = getcwd();
if(isset($_POST['submit']))
{
	echo '<pre>';
	echo "Kết quả: ";
  $text=fopen($thisdir . "/uploaded/".$mssv."/score.txt", 'r');
  echo fgets($text);
  if($text=="")
  {
      echo "Hiện tại chưa có điểm, vui lòng quay lại sau !";
  }
  fclose($text);
	echo '</pre>';

	//header('Location: http://localhost:88/assignment/index.php');

}

?>






