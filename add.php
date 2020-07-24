<?php 
/*
if (isset($_GET['submit'])) {
    echo $_GET['Email'];
    echo $_GET['1st_name'];
    echo $_GET['last_name'];
    echo $_GET['age'];
}
*/

    include('config/db_connect.php');


    $fstName = $lstname = $email = $num = $age = "";

    $errors = array('1st_name'=>'','last_name'=>'','email'=>'','phone_number'=>'','age'=>'');


    if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['1st_name']);
    // echo htmlspecialchars($_POST['last_name']);
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['phone_number']);
    // echo htmlspecialchars($_POST['age']);

// ** check first name

    if (empty($_POST['1st_name'])) {
        $errors['1st_name'] = "a first name is required <br/> ";
    } else {
        $fstName = $_POST['1st_name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $fstName)) {
            $errors['1st_name'] = "First name must be letters ans spaces only"."<br/>";
        }
    } 

// ** check last name

    if (empty($_POST['last_name'])) {
        $errors['last_name'] = "a last name is required <br/> ";
    } else {
        $lstname = $_POST['last_name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $lstname)) {
          $errors['last_name'] = "Last name must be letters and spaces only"."<br/>";
        }
    }

// ** check email

    if (empty($_POST['email'])) {
        $errors['email'] = "an email is required <br/> ";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "The email isn't valid"."<br/>";
        }
    }

// ** check phone number

    if (empty($_POST['phone_number'])) {
        $errors['phone_number'] = "a phone number is required <br/> ";
    } else {
        $num = $_POST['phone_number'];
        if (!preg_match('/^[0-9\+]/', $num)) {
            $errors['phone_number'] = "phone number must be numbers only"."<br/>";
        }
    }

// ** check age

    $age = $_POST['age'];
    if (!preg_match('/^[0-9 ]*$/', $age)) {
        $errors['age'] = "age must be numbers only"."<br/>";
    }


    if (array_filter($errors)) {
    } else {

        $fstName = mysqli_real_escape_string($conn, $_POST['1st_name']);
        $lstname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $num = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);


        // craete sql query

        $sql = "INSERT INTO members(First_name,Last_name,Email,Phone_number,Age) VALUES ('$fstName','$lstname','$email','$num','$age')";

        // save to database and check

        if (mysqli_query($conn, $sql)) {
            // saving to database successful
            header('location:index.php');
        } else {
            echo "Query error: ".mysqli_error($conn);
        }

       


    }   
}

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a person</h4>
        <form class ="white" action="" method="POST">
        <label for="">Image to upload: *<br/><br/></label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br/><br/>
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
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>  
    </section>


</html>

