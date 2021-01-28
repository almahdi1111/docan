<?php
session_start();
require_once("header.php");
$sql_last_users="select * from users";
$q_last_users=$con->prepare($sql_last_users);
$q_last_users->execute();
$last_users=$q_last_users->fetchall();
$last_users=end($last_users);
$id_last_user=$last_users['id'];

?>
        <?php

if(isset($_POST['add']))
{
    if( !empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['phone']) )
    {
        $name=$_POST['firstname']." ".$_POST['lastname'];
        $email=$_POST['email'];
        $user_type=$_POST['user_type'];
        $password=$_POST['password'];
        $password_confirm=$_POST['confirmpass'];
        $birth_date=$_POST['birthdate'];
        $phone_number=$_POST['phone'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];




if(isset($_FILES['avatar-file']['name']))
{
$image1=$_FILES['avatar-file']['name'];


$type1=$_FILES['avatar-file']['type'];


$temp_name1=$_FILES['avatar-file']['tmp_name'];


$mytypes=array('jpg','png','jpeg','gif');
$ext1=explode('.',$image1);
$ext1=end($ext1);

$id_last_user1=$id_last_user+1;

if (in_array(strtolower($ext1),$mytypes))
{
        $image1="user$id_last_user1.$ext1";

        move_uploaded_file($temp_name1,"images/users/$image1");


        
    $sql_Enter_user="insert into users ( password, name, email, user_type,address, gender,birth_date, image, phone) values (:password,:name,:email, :user_type,:address,:gender,:birth_date,:image,:phone_number)";
    $q_Enter_user=$con->prepare($sql_Enter_user);
    $q_Enter_user->execute(array('password'=>$password,'name'=>$name,'email'=>$email, 'user_type'=>$user_type,'address'=>$address,'gender'=>$gender,'birth_date'=>$birth_date,'image'=>$image1,'phone_number'=>$phone_number));
    echo "<h5 style='color:green;'>تم اضافة المستخدم بنجاح  </h5>";
}
else

echo '<br><h5>اختر صيغة صحيحة للصورة الشخصية</h5>';

}

else 
{
    $sql_Enter_user="insert into users ( password, name, email, user_type,address, gender,birth_date, phone) values (:password,:name,:email, :user_type,:address,:gender,:birth_date,:phone_number)";
    $q_Enter_user=$con->prepare($sql_Enter_user);
    $q_Enter_user->execute(array('password'=>$password,'name'=>$name,'email'=>$email, 'user_type'=>$user_type,'address'=>$address,'gender'=>$gender,'birth_date'=>$birth_date,'phone_number'=>$phone_number));
}


}
else
echo '<br><h5>يرجى تعبئة كل الحقول</h5>';


 }


?>
    <div class="container">

        <form  action=""  method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="avatar-bg center"></div>
                    </div><input type="file" class="form-control" name="avatar-file"></div>
                <div class="col-md-8 text-right">
                    <h1>الملف الشخصي</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>الاسم الاول</label><input class="form-control" type="text" name="firstname" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>الاسم الاخير</label><input class="form-control" type="text" name="lastname" required=""></div>
                        </div>
                    </div>
                    <div class="form-group"><label>الايميل</label><input class="form-control" type="email" autocomplete="off" required="" name="email"></div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>كلمة السر</label><input class="form-control" type="password" name="password" autocomplete="off" required></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>تاكيد كلمة السر</label><input class="form-control" type="password" name="confirmpass" autocomplete="off" required ></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label>العنوان</label><select name='address' class="form-control"><optgroup label="صنعاء"><option value="12" selected="">الامانة</option><option value="13">الصافية</option></optgroup><optgroup label="حجة"><option value="">المحابشة</option><option value="">كحلان الشرف</option></optgroup><optgroup label="حضرموت"><option value="">سيئون</option><option value="">المكلا</option></optgroup></select></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>نوع المستخدم</label><select class="form-control" name='user_type'> <?php if(isset($_SESSION['id']) and $_SESSION['usertype']=='admin') echo "<option value='admin'>مدير</option>";?><option value="buyer">مشتري</option><option value="vedor">بائع ومشتري</option></select></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>رقم الهاتف</label><input class="form-control" name='phone' type="tel" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>تاريخ الميلاد</label><input class="form-control" type="date" name='birthdate' required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>النوع</label><select name='gender' class="form-control"><option value="ذكر">ذكر</option><option value="انثى">انثى</option></select></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 content-right"><input class="btn btn-primary form-btn" name='add' type="submit" value='حفظ'><input class="btn btn-danger form-btn" type="reset" value='الغاء'></div>
                    </div>
                </div>
            </div>
        </form>

    </div>
<?php
require_once("footer.php");

?>