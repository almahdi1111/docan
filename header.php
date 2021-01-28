<?php
require_once("db_connection.php");

if (isset($_SESSION['id']))
{
$name_user=$_SESSION['username'];
$user_type=$_SESSION['usertype'];
if(isset($_SESSION['image']))
$profile_image=$_SESSION['image'];
else
    $profile_image="default.png";
}



?>
<!DOCTYPE html>
<html style="direction: rtl;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>المشروع</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-7.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<body class="text-right">
    <nav class="navbar navbar-light navbar-expand-md border-white border rounded justify-content-md-end navigation-clean-search" data-toggle="tooltip" data-bs-tooltip="" style="background-color: rgb(0,0,0);">
        <div class="container-fluid"><a class="navbar-brand" href="index.php" style="background-color: rgba(171,166,147,0);color: rgb(244,220,9);margin: 3px;">&nbsp;<img src="assets/img/logo.png" style="width: 81px;height: 74px;"></a><span class="mr-auto" style="font-size: 15px;">
        <?php 
        
        if (!isset($_SESSION['id']))
        {
        echo "    
        <a class='btn btn-primary btn-sm action-button' role='button' href='add-user.php' style='background-color: rgb(81,98,98);'><strong>التسجيل</strong></a>
		
        <a class='btn btn-light action-button' role='button' href='login.php' style='background-color: rgb(81,94,94);margin: 2px;'><strong>تسجيل الدخول</strong></a></span>
";
        }
        else
        {
        echo "
        <div
        class='dropdown'>
        <a class='dropdown-toggle shadow-sm nav-link' data-toggle='dropdown' aria-expanded='false' href='#'><span class='d-none d-lg-inline mr-2 text-gray-600 small' style='color: rgb(255,255,255);font-size: 16px;'><strong>$name_user</strong></span><img class='border rounded-circle img-profile' style='width: 60px;height: 60px;' src='images/users/$profile_image'></a>
        <div
            class='dropdown-menu text-right text-white border rounded border-info shadow-sm dropdown-menu-right animated--grow-in' role='menu' style='color: rgb(242,243,248);font-size: 17px;font-family: Nunito, sans-serif;background-color: rgb(42,43,48);opacity: 0.85;'>
            <a class='dropdown-item' role='presentation' style='padding-right: 0px;padding-left: 0px;'><i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>الملف الشخصي<br></a>
            <a class='dropdown-item' role='presentation' style='padding-right: 0px;'><i class='fas fa-cogs fa-sm fa-fw mr-2 text-gray-400'></i>اعدادت الحساب<br></a>
            ";
            
           if($user_type=='admin' or $user_type=='vedor')
           echo" <a href ='control-panel.php' class='dropdown-item' role='presentation' style='padding-right: 0px;'><i class='fas fa-list fa-sm fa-fw mr-2 text-gray-400'></i>لوحة التحكم</a>";
            
            echo "<a href='logout.php' class='dropdown-item text-right' role='presentation' style='padding-bottom: 3px;padding-right: 0px;'><i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>&nbsp;تسجيل الخروج</a></div>
</div>
<a class='btn' role='button' style='font-size: 22px;color: rgb(255,255,255);background-color: rgb(1,4,8);'><i class='fa fa-bell'></i></a>
        ";}
        ?>
        <a href='cart.php' class='btn' role='button' style='font-size: 22px;color: rgb(255,255,255);background-color: rgb(1,4,8);'><i class='fa fa-shopping-cart'></i></a>
    </div>

    </nav>
    <nav class="navbar navbar-light navbar-expand-md border-white border rounded justify-content-md-end navigation-clean-search" data-toggle="tooltip" data-bs-tooltip="" style="background-color: rgb(0,0,0);">
        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #efeded;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgb(238,223,223);"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1" style="color: rgb(210,165,165);">
                <ul class="nav navbar-nav text-right" style="padding-right: 0px;padding-top: 0px;">
                    <li class="nav-item" role="presentation" style="border-radius: 5px;"><a class="nav-link " href="index.php" style="color: rgb(255,255,255);"><strong>الصفحة الرئيسية</strong></a></li>
                    <li class="nav-item dropdown" style="margin: 0;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);"><strong>الاصناف</strong></a>
                        <div class="dropdown-menu" role="menu">
						<?php
                        
							$sql="select * from categories";
							$q=$con->prepare($sql);
							$q->execute();
							$cate=$q->fetchall();
							foreach($cate as $category)
							{
							$id=$category['id'];
							$name=$category['name'];
							$active=$category['active'];
							if($active==1)
							echo "<a class='dropdown-item' role='presentation' href='category.php?id=$id'>$name</a>";
							}
						?>
						
						</div>
                    </li>
                    <li class="nav-item" role="presentation" style="color: rgb(252,252,252);"><a class="nav-link d-block" href="contact-us.php" style="color: rgb(251,253,255);"><strong>تواصل بنا</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link d-block" href="about-us.php" style="color: rgb(255,255,255);"><strong>من نحن&nbsp;</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link d-block" href='team.php' style="color: rgb(255,255,255);"><strong>الفريق&nbsp;</strong></a></li>
                </ul>
                <form class="form-inline mr-auto" action='search_resulte.php'>
                    <div class="form-group"><label for="search-field"></label>
					<input class="border rounded border-secondary shadow form-control search-field" type="search" id="search-field" name="search">
					<button class="btn btn-primary" type="submit" style="background-color: rgb(116,50,118);"><i class="fa fa-search" style="color: rgb(255,255,255);">
					</i></button>
					</div>
                </form>
        </div>
        </div>
    </nav>