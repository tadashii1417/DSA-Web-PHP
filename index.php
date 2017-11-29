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
      <li class="space"><a><i class="fa fa-code ispace"></i>Upload file</a></li>
      <li class="space"><a href="score.php"><i class="fa fa-cogs ispace"></i>Xem điểm</a></li>
      
    </ul>
  
</nav>
</div>
</div>


<div class="row log">
<div class="col-sm-10">
<div class=""><h1 style="text-align:center;">Upload Source code</h1></div>
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
	<label for="ta">Upload source code: </label><br>

	<input class="form-control" type="file" name="file[]" multiple ><br/><br/>
	<input type="submit" name="submit" id="st" class="btn btn-success" value="Submit"><br><br><br>

         <?php
         	error_reporting(0);
         	foreach ($_FILES['file']['name'] as $key => $value)
         	{
         		$temp=$key+1;
         		echo "File thứ ".$temp.": ";
                echo '<pre>';
				echo "Sent file: ".$_FILES['file']['name'][$key]."\n";
                echo "File size: ".$_FILES['file']['size'][$key]."\n";
                echo "File type: ".$_FILES['file']['type'][$key]."\n"; 
				echo '</pre>';
         	}
         ?>

</form>
<?php
    $mssv = htmlspecialchars($_REQUEST['mssv']); 
?>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
  // Bước 1: tạo folder uploads để chứa files
  $thisdir = getcwd();
  if(!is_dir($thisdir . "/uploaded/".$mssv."/"))
  {
    mkdir($thisdir . "/uploaded/".$mssv."/", 0777,true);
  }
}

if(isset($_POST['submit']))
{
  	$thisdir = getcwd();
  	$dir=$thisdir."/uploaded/".$mssv."/";
  	$fi = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
  	$now=iterator_count($fi);
  	$count=iterator_count($fi);
  	if($now ==0)
  	{
  		$count=$count+1;
  	}
	foreach ($_FILES['file']['name'] as $key => $value) 
	{
  		$errors=array();
		$file_name=$_FILES['file']['name'][$key];
		$file_size=$_FILES['file']['size'][$key];
		$file_tmp=$_FILES['file']['tmp_name'][$key];
		$file_type = $_FILES['file']['type'][$key];
      	$file_ext=strtolower(end(explode('.',$_FILES['file']['name'][$key])));
      	$expensions=array("cpp","h");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Chỉ hỗ trợ upload file .cpp, .h ";
      }
       
      if($file_size > 2097152) {
         $errors[]='Kích thước file không được lớn hơn 2MB';
      }
       
      if(empty($errors)==true) {
      	  if(!is_dir($thisdir . "/uploaded/".$mssv."/submit_".$count."/"))
  				{
  	  				mkdir($thisdir . "/uploaded/".$mssv."/submit_".$count."/", 0777,true);
  				}
         move_uploaded_file($file_tmp,"uploaded/".$mssv."/submit_".$count."/".$file_name);
      }else{
         print_r($errors);
      }
	}
//header('Location: http://localhost:88/assignment/index.php');

}

?>






