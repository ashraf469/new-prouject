<?php
session_start();
include 'cone.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    $hashedpass = sha1($pass);

    $serchInData = $conect->prepare(
                                    "SELECT
                                        Id, Username, Password 
                                    FROM 
                                        users 
                                    WHERE 
                                        Username =? 
                                    AND 
                                        Password =?
                                    ");
    $serchInData->execute(array($username, $pass));
    $getinformation = $serchInData->fetch(); 
    if($serchInData->rowCount() > 0 )
        {
            $_SESSION['Username'] = $getinformation['Username'];
            $_SESSION['Id'] = $getinformation['Id'];
        header('Location: home.php');
        exit();
        }else{echo 'Your Username or Password Uncorrect';}
       


}

?>

<!-- form login -->
<div class="first">
    <p>Login</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>User Name :</label><br>
        <input type="text" name="user"><br>
        <label>Password :</label><br>
        <input type="text" name="pass"><br>
        <button type="submit">login</button>
    </form>
    <br>    
    <a href="signin.php" target="a_blank">إنشاء حساب جديد</a>
</div>

<!-- foter of page -->