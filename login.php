<?php
session_start();
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <style>
        h1{
            text-align : center ;
        }
        div{
            align-self : center;
            background-color : powderblue ;
            padding : 20px;           
            border-radius:5px;
            width: 500px;
            margin: auto;
        }
        table{
            font-size : 200%; 
            padding : 20px;   
        }
        input[type=text],input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

    </style>
    <body>
        <h1>Login</h1>
        <form method="POST" >
            <div>
                <table>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="password" id="password" placeholder="*****" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Login"></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
<?php

if ( isset( $_POST['submit' ]) ) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if ( $username == 'admin' && $password =='admin123' ){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        header('Location:faqform.php?id=$username"');
    }
    else {
        echo "<script>alert('Invalid user')</script>";
    }
    
}
?>
