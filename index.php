<?php 

// ** communicate with the database: MySQLi or PDO



include('config/db_connect.php');

$sql = 'SELECT Id, First_name, Last_name, Age FROM members ORDER BY Date_of_membership';

// make query and get the result

$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array

$members = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free memory result

mysqli_free_result($result);

// close connection

mysqli_close($conn);    


?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Members</h4>
    <div class="container">
        <div class="row">
            <?php  foreach ($members as $member) { ?>
                <div class="col s6 md3 ">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($member['First_name']." ".$member['Last_name']); ?></h6>
                            <div><?php echo htmlspecialchars($member['Age']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $member['Id'] ?>" class="href">more information</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

    

</html>