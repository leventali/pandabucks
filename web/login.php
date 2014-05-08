<?php

require_once '../src/UserTools.php';

$error = "";
$username = "";
$password = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userTools = new UserTools();
    if($userTools->login($username, $password)){
        //successful login, redirect them somewhere
        echo "<script type='text/javascript'>alert('login successful');</script>";
    } else{
        $error = "Oops! Something is wrong. Try again?";
    }
}
?>

<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
    if($error != "") {
        echo $error."<br/>";
    }
?>
<form action="login.php" method="post">
    Username: <input type="email" name="username" value="<?php echo $username; ?>" /><br/>
    Password: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="Login" name="submit-login" />
</form>
</body>
</html>