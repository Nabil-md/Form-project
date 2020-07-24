<?php

include('config/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM members WHERE Id = '$id_to_delete' ";

    if (mysqli_query($conn, $sql)) {
        // deletion successful
        header('location: index.php');
    } else {
        echo "Query error".mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    header('location: edit.php');
}

if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql

    $sql = "SELECT * FROM members WHERE Id= '$id' ";

        // get the query result

    $result = mysqli_query($conn, $sql);

     // fetch the result in array

    $member = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);

}


    

?>


<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>
<div class="container center">
    <?php if ($member): ?>
        <h4><?php echo htmlspecialchars($member['First_name'])." ".htmlspecialchars($member['Last_name']); ?></h4>
        <h6>Id: <?php echo htmlspecialchars($member['Id']);?></h5>
        <h6>Email: </h6>
        <p><?php echo htmlspecialchars($member['Email']); ?></p>
        <h6>Phone number: </h6>
        <p><?php echo htmlspecialchars($member['Phone_number']) ?></p>
        <h6><?php if ($member['Age']) {echo "Age :"; } ?></h6>
        <p><?php if ($member['Age']) { echo htmlspecialchars($member['Age']); } ?></p>
        <h6>registered at: </h6>
        <p><?php echo date($member['Date_of_membership']); ?></p>

            <!-- Delete form -->


        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $member['Id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            <input type="submit" name="update" value="Update" class="btn brand z-depth-0">
            
        </form>



    <?php else: ?>
        <h5>Member does not exist</h5>
    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>


</html>


