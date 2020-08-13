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
    
    // gender cookie

    setcookie('gender', $_POST['gender'], time() + 86400);

    $_SESSION['name'] = $_POST['name'];

    header('location: index.php');
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
        <select name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>