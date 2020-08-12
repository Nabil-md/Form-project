<?php 

// TERNARY OPERATORS

/*
$score = 50;

if ($score > 30) {
    echo 'high score';
} else {
    echo 'low score';
}

echo '</br>'. ($score > 20 ? 'high score' : 'low score');
*/


// SUPERGLOBALS

// such as $_GET[], $_POST[]

/*
echo $_SERVER['SERVER_NAME'].'</br>';
echo $_SERVER['REQUEST_METHOD'].'</br>';
echo $_SERVER['SCRIPT_FILENAME'].'</br>';
echo $_SERVER['PHP_SELF'].'</br>';
//echo $_SERVER['REQUEST_METHOD'].'</br>';
*/

// SESSIONS

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['name'] = $_POST['name'];
    echo $_SESSION['name'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
        <input type="text" name="name" >
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>