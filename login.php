<?php
session_start();
if(isset($_SESSION['id']))
{
header('location: index.php');
exit();
}
require_once("header.php");

?>
    <div class="login-dark">

        <form id='login_form1'  action="verify.php" method="post">
		<?php if(isset($_SESSION['error']))
{
	echo $_SESSION['error'];
}
?>
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: #d88c02;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="الايميل"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="كلمة السر"></div>
            <div class="form-group"><button  class="btn btn-primary btn-block" name='send' type="submit" style="background-color: #d88c02;">تسجيل الدخول</button></div>
       

		</form>
		
    </div>
	
	 

	
<?php

require_once("footer.php");

?>