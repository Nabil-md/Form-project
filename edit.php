
<?php 

include('config/db_connect.php');

$fstName = $lstname = $email = $num = $age = "";

$errors = array('1st_name'=>'','last_name'=>'','email'=>'','phone_number'=>'','age'=>'');

?>


<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a person</h4>
        <form class ="white" action="" method="POST">
            <label for="">Image to upload: *<br/><br/></label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            <br/><br/>
            <label for="">Enter member's id: *</label>
            <input type="text" name="id" value="<?php echo htmlspecialchars($fstName); ?>">
            <div class="red-text"><?php echo $errors['1st_name']; ?></div>
            <label for="">First name: *</label>
            <input type="text" name="1st_name" value="<?php echo htmlspecialchars($fstName); ?>">
            <div class="red-text"><?php echo $errors['1st_name']; ?></div>
            <label for="">Last name: *</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($lstname); ?>">
            <div class="red-text"><?php echo $errors['last_name']; ?></div>
            <label for="">Email: *</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label for="">Phone number: *</label>
            <input type="text" name="phone_number" value="<?php echo htmlspecialchars($num); ?>">
            <div class="red-text"><?php echo $errors['phone_number']; ?></div>
            <label for="">Age:</label>
            <input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>">
            <div class="red-text"><?php echo $errors['age']; ?></div>
            <div class="center">
                <input type="submit" name="edit" value="Update" class="btn brand z-depth-0">
            </div>
        </form>  
    </section>

    <?php 
    
    if (isset($_POST['edit'])) {

        $id = $_POST['id'];
        $fn = $_POST['1st_name'];
        $ln = $_POST['last_name'];
        $em = $_POST['email'];
        $pn = $_POST['phone_number'];
        $a = $_POST['age'];

        $sql = "UPDATE members SET First_name='$fn',Last_name='$ln',Email='$em',Phone_number='$pn',Age='$a' WHERE Id = $id";
        
        $sql_run = mysqli_query($conn,$sql);

        if ($sql_run) {
            echo '<script type ="text/javascript"> alert ("Data Updated") </script>';
        } else {
            echo '<script type ="text/javascript"> alert ("Data NOT Updated") </script>';
        }


    }

    

    ?>



    <?php include('templates/footer.php'); ?>
</html>