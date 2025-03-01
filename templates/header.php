<?php 

session_start();

// override: 
// $_SESSION['name']= 'Nabil';

if ($_SERVER['QUERY_STRING'] === 'noname') {
    unset($_SESSION['name']);
}


// to unset all session variables: session_unset();

$name = $_SESSION['name'] ?? 'Guest';

// get cookie

$gender = $_COOKIE['gender'] ?? 'unknown';


?>



<html>
<head>
    <title>Form</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
    .brand{
        background: #9cb7cb !important;
    }
    .brand-text {
        color: #9cb7cb !important;
    }
    form {
        max-width: 460px;
        margin: 20px auto;
        padding: 20px;
    }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class ="brand-logo brand-text">Members</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class ="grey-text">Hello <?php echo htmlspecialchars($name); ?> </li>
                <li class ="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0" >Add a person</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
    
