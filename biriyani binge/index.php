<?php

$conn=mysqli_connect('localhost','root','','binge_biriyani');
$sql='SELECT * FROM `biryani` ORDER BY created_at';
$result=mysqli_query($conn,$sql);
$biriyani=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 
</head>
<body style="background-color:black">
    <?php include('header.php'); ?>
    <h4 class="center grey-text">Biriyani!</h4>
    <div class="container">
        <?php 
        foreach($biriyani as $one){?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <img src="istockphoto-1086974196-612x612.jpg" class="brr">
                <div class="card-content center">

                    <h4 style="color: burlywood;"><?php
                    echo ($one['title']); 
                    ?></h4>
                    <div> 
                        <h5 style="color: burlywood;">ingrediants</h5>
                        <?php echo($one['ingrediants']);?>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="info.php?ID=<?php echo $one['ID']?>">more info</a>
                    </div>
                
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php }?>
    </div>
    <?php include('footer.php'); ?>


</body>
</html>