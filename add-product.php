<?php
session_start();

require_once("header.php");
                        $sql="select * from categories where active=1";
						$q_cate=$con->prepare($sql);
                        $q_cate->execute();
                        $sql_last_product="select * from products";
						$q_last_product=$con->prepare($sql_last_product);
                        $q_last_product->execute();
                        $last_product=$q_last_product->fetchall();
                        $last_product=end($last_product);
                        $id_last_product=$last_product['id'];
?>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="form-row">
                    <div class="col-md-12 text-right">
                    <h1>اضافة منتج</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group"><label>اسم المنتج</label><input class="form-control" type="text" name="name" required></div>
                            <div class="form-group"><label>وصف المنتج</label><input class="form-control" type="text" name="detail" required></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label>الصنف</label><select class="form-control" name="cate" required><?php 
                            foreach($q_cate as $cate)
                            {
                                $id_cate=$cate['id'];
                                $name_cate=$cate['name'];
                            
                            echo "<option value='$id_cate'>$name_cate</option>";

                            }
                            
                            ?>
                            </select></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>سعر المنتج</label><input class="form-control" type="number" step=0.01 name="price" required></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label class="block">صور المنتج</label><input type="file" name="image1" required> <input type="file" name="image2" required> <input type="file" name="image3" required></div>
                        </div>
                        <div class="col-md-12 offset-xl-4 content-right"><button class="btn btn-primary form-btn" type="submit" name='add'>حفظ</button><button class="btn btn-danger form-btn" type="reset">الغاء</button></div>
                    </div>
                </div>
            </div>
        </form>
        <?php

if(isset($_POST['add']))
{
    if( !empty($_POST['name']) and !empty($_POST['detail']) and !empty($_POST['price']) )
    {
$name=$_POST['name'];
$detail=$_POST['detail'];
$c_id=$_POST['cate'];
$user_id=$_SESSION['id'];
$price=$_POST['price'];
if(isset($_FILES['image1']['name']) and isset($_FILES['image2']['name']) and isset($_FILES['image3']['name']))
{
$image1=$_FILES['image1']['name'];
$image2=$_FILES['image3']['name'];
$image3=$_FILES['image3']['name'];

$type1=$_FILES['image1']['type'];
$type2=$_FILES['image2']['type'];
$type3=$_FILES['image3']['type'];

$temp_name1=$_FILES['image1']['tmp_name'];
$temp_name2=$_FILES['image2']['tmp_name'];
$temp_name3=$_FILES['image3']['tmp_name'];

$mytypes=array('jpg','png','jpeg','gif');
$ext1=explode('.',$image1);
$ext1=end($ext1);
$ext2=explode('.',$image2);
$ext2=end($ext2);
$ext3=explode('.',$image3);
$ext3=end($ext3);
$id_last_product1=$id_last_product+1;
$id_last_product2=$id_last_product+2;
$id_last_product3=$id_last_product+3;

if (in_array(strtolower($ext1),$mytypes) and in_array(strtolower($ext3),$mytypes) and in_array(strtolower($ext3),$mytypes))
{
        $image1="product$id_last_product1.$ext1";
        $image2="product$id_last_product2.$ext2";
        $image3="product$id_last_product3.$ext3";
        move_uploaded_file($temp_name1,"images/products/$image1");
        move_uploaded_file($temp_name2,"images/products/$image2");
        move_uploaded_file($temp_name3,"images/products/$image3");

        $sql_Enter_user="insert into products ( name, detail, price, c_id,user_id, image1, image2,image3) values ( :name, :detail, :price, :c_id,:user_id, :image1,:image2,:image3)";
        $q_Enter_user=$con->prepare($sql_Enter_user);
        $q_Enter_user->execute(array( 'name'=>$name, 'detail'=>$detail, 'price'=>$price, 'c_id'=>$c_id,'user_id'=>$user_id, 'image1'=>$image1, 'image2'=>$image2,'image3'=>$image3));
        echo "<h5 style='color:green;'>تم اضافة المنتج بنجاح  يمكن ان تشاهده من <a href='product-detiles.php?id=$id_last_product1'>  هنا</a></h5>";
}
else

echo '<br><h5>اختر صيغة صحيحة للصور</h5>';

}
else echo"ادخل ثلاث صور للمنتجات";


}
 }


?>
    </div>
<?php
require_once("footer.php");

?>