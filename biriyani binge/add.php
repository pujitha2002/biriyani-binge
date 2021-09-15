  <?php
  $error=['email'=>'','biriyani'=>'','ingrediants'=>'','procedure'=>''];
  $email='';
  $title='';
  $ing='';
  $king='';
  if(isset($_POST['submit']))
  {
     // echo $_POST['email'];
      //echo $_POST['biriyani'];
      //echo $_POST['ingrediants'];
      if(empty($_POST['email']))
      {
        $error['email'] ="An email is required <br />";
      }
      else{
          $email=$_POST['email'];
          if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          {
            $error['email'] ='email must be valid'.'</br>';
          }
         
      }
      if(empty($_POST['biriyani']))
      {
        $error['biriyani'] ='A title is required <br />';
      }
      else{
        
        $title=$_POST['biriyani'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title))
        {
            $error['biriyani'] ='enter correct title';
        }
      }
      if(empty($_POST['ingrediants']))
      {
        $error['ingrediants'] ="A ingrediants is required <br />";
      }
      else{
        $ing=$_POST['ingrediants'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ing))
        {
            $error['ingrediants'] =  'enter correct ingrediants';
        }
      }
      if(empty($_POST['procedure']))
      {
        $error['procedure'] ="A procedure is required <br />";
      }
      else{
        $king=$_POST['procedure'];
        
      }
  if(array_filter($error))
  {
      echo 'error in form ';
  }
  else
  {
    $conn=mysqli_connect('localhost','root','','binge_biriyani');
    if(!$conn)
    {
      echo 'error';
    }
    $email=mysqli_real_escape_string($conn,$email);
    $title=mysqli_real_escape_string($conn,$title);
    $ing=mysqli_real_escape_string($conn,$ing);
    $king=mysqli_real_escape_string($conn,$king);
    $sql="INSERT INTO biryani(`title`, `ingrediants`, `process`, `email`) VALUES('$title','$ing','$king','$email')";
    if(mysqli_query($conn, $sql)){
      header('Location: index.php');
      // success
    
    } else {
      echo 'query error: '. mysqli_error($conn);
    }
  }


  }

  ?>
<!DOCTYPE html>
<html>
    <?php include('header.php'); ?>
    <section class="container grey-text"> 
         <h4 class="center">Add a new biriyani</h4>
         <form class="white" action="add.php" method="POST">
             <label>your Email:</label>
             <input type="text" name="email" value="<?php echo $email?>">
             <div class="red-text"><?php echo $error['email']?></div> 
             <label>your Briyani:</label>
             <input type="text" name="biriyani" value="<?php echo $title?>">
             <div class="red-text"><?php echo $error['biriyani']?></div>
             <label>your Ingredients(comma seprated):</label>
             <textarea  row="5" cols="5" type="text" name="ingrediants" value="<?php echo $ing?>"></textarea>
             <div class="red-text"><?php echo $error['ingrediants']?></div>
             <label>procedure(comma seprated):</label>
             <textarea  row="5" cols="5" type="text" name="procedure" value="<?php echo $king?>"></textarea>
             <div class="red-text"><?php echo $error['procedure']?></div>

             <div class="center">
                 <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
             </div>
             
         </form>
    </section>

 

    <?php include('footer.php'); ?>

</html>