<?php
session_start();
require_once("db_connection.php");
		
            if (isset($_POST['send']))
            {
                
            $sql='select * from users where email=:email and password=:password and active=1';
            $q=$con->prepare($sql);
            $q->execute(array('email'=>$_POST['email'],'password'=>$_POST['password']));
            $userlogin=$q->fetchall();
            
            if($q->rowcount()>0)
            {
                $_SESSION['username']=$userlogin[0]['name'];
                $_SESSION['id']=$userlogin[0]['id'];
                $_SESSION['usertype']=$userlogin[0]['user_type'];
                $_SESSION['image']=$userlogin[0]['image'];
             header('location: index.php');
                exit();
 
                
            }
            else
            {
                $_SESSION['error']="<h3 style='color:red;'>هناك خطا ام في كلمة السر او الايميل او ان حسابك غير منشط </h3>";
                header("Location: login.php");
            }
        }

      


?>
