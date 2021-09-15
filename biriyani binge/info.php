<?php
$conn=mysqli_connect('localhost','root','','binge_biriyani');
if(isset($_GET['ID']))
{
    $ID=mysqli_real_escape_string($conn,$_GET['ID']);
    $sql="SELECT * FROM `biryani`  WHERE ID=$ID ";
    $result=mysqli_query($conn,$sql);
    $biriyani=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="conatiner center" style="border: 20px solid black;margin:auto">
<h4>
    <?php echo $biriyani['title'];?>
</h4>
<hr>
<p>Created by:    <?php echo $biriyani['email'];?></p>
<p>Date:     <?php echo $biriyani['created_at'];?></p>
 <h5>Ingrediants</h5>
 <p> <?php 
 foreach(explode(',',$biriyani['ingrediants']) as $ingi){?>
<li><?php echo $ingi?></li>

 <?php }?></p></p>
<h5>process</h5>
<p> <?php 
 foreach(explode(',',$biriyani['process']) as $ingi){?>
<li><?php echo $ingi?></li>

 <?php }?></p>
 


</div>
<?php include('footer.php'); ?>

    
</body>
</html>