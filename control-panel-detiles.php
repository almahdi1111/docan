<?php
session_start();
require_once('header.php');

?>  
<div class='container-lg'>
 <?php

							$image_user_path="images/users/";			
							$image_product_path="images/products/";			
							
							
							
                            
							
 $user_type_per=$_SESSION['usertype'];
$user_id_per=$_SESSION['id'];
if(isset($_GET['whatisshow']))
{
 $type_show=$_GET['whatisshow'];
 
 switch($user_type_per)
 {
    case 'admin':

        {                   //________________________________________________
                           //delete comments
                           if( isset($_GET['action']) and $_GET['whatisshow']=='comments')
                           {
                              if($_GET['action']=='delete') 
                              {
                            $id_comment_delete=$_GET['id'];
                            $sql_comments_delete="delete from comments where id=:id";
                            $q_comments_delete=$con->prepare($sql_comments_delete);
                            $q_comments_delete->execute(array('id'=>$id_comment_delete));
                              }
                              //active comment query
                            elseif($_GET['action']=='active')
                           {
                            $id_comment_active=$_GET['id'];
                            $sql_comments_active="update comments set active=1 where id=:id";
                            $q_comments_active=$con->prepare($sql_comments_active);
                            $q_comments_active->execute(array('id'=>$id_comment_active));
                           }
                           //unactive comment query 
                           elseif($_GET['action']=='unactive')
                           {
                            $id_comment_active=$_GET['id'];
                            $sql_comments_active="update comments set active=0 where id=:id";
                            $q_comments_active=$con->prepare($sql_comments_active);
                            $q_comments_active->execute(array('id'=>$id_comment_active));
                           }
                           }


                           //======================================================
                           //delete and active products
                           if( isset($_GET['action']) and $_GET['whatisshow']=='products')
                           {
                              if($_GET['action']=='delete') 
                              {
                            $id_product_delete=$_GET['id_p'];
                            $sql_products_delete="delete from products where id=:id";
                            $q_products_delete=$con->prepare($sql_products_delete);
                            $q_products_delete->execute(array('id'=>$id_product_delete));
                              }
                              //active products query
                            elseif($_GET['action']=='active')
                           {
                            $id_comment_active=$_GET['id'];
                            $sql_products_active="update products set active=1 where id=:id";
                            $q_products_active=$con->prepare($sql_products_active);
                            $q_products_active->execute(array('id'=>$id_comment_active));
                           }
                           //unactive products query 
                           elseif($_GET['action']=='unactive')
                           {
                            $id_comment_active=$_GET['id'];
                            $sql_products_active="update products set active=0 where id=:id";
                            $q_products_active=$con->prepare($sql_products_active);
                            $q_products_active->execute(array('id'=>$id_comment_active));
                           }
                           }

                            //categories edit and delete and active ......
                            //=============================================================
                            if( isset($_GET['action']) and $_GET['whatisshow']=='categories')
                            {
                               if($_GET['action']=='delete') 
                               {
                             $id_categories_delete=$_GET['id'];
                             $sql_categories_delete="delete from categories where id=:id";
                             $q_categories_delete=$con->prepare($sql_categories_delete);
                             $q_categories_delete->execute(array('id'=>$id_categories_delete));
                               }
                               //active categories query
                             elseif($_GET['action']=='active')
                            {
                             $id_categories_active=$_GET['id'];
                             $sql_categories_active="update categories set active=1 where id=:id";
                             $q_categories_active=$con->prepare($sql_categories_active);
                             $q_categories_active->execute(array('id'=>$id_categories_active));
                            }
                            //unactive categories query 
                            elseif($_GET['action']=='unactive')
                            {
                             $id_categories_active=$_GET['id'];
                             $sql_categories_active="update categories set active=0 where id=:id";
                             $q_categories_active=$con->prepare($sql_categories_active);
                             $q_categories_active->execute(array('id'=>$id_categories_active));
                            }
                            }


                            //users edit delete active ...............
                            //================================================================

                            if( isset($_GET['action']) and $_GET['whatisshow']=='users')
                            {
                               if($_GET['action']=='delete') 
                               {
                             $id_users_delete=$_GET['id'];
                             $sql_users_delete="delete from users where id=:id";
                             $q_users_delete=$con->prepare($sql_users_delete);
                             $q_users_delete->execute(array('id'=>$id_users_delete));
                               }
                               //active users query
                             elseif($_GET['action']=='active')
                            {
                             $id_users_active=$_GET['id'];
                             $sql_users_active="update users set active=1 where id=:id";
                             $q_users_active=$con->prepare($sql_users_active);
                             $q_users_active->execute(array('id'=>$id_users_active));
                            }
                            //unactive users query 
                            elseif($_GET['action']=='unactive')
                            {
                             $id_users_active=$_GET['id'];
                             $sql_users_active="update users set active=0 where id=:id";
                             $q_users_active=$con->prepare($sql_users_active);
                             $q_users_active->execute(array('id'=>$id_users_active));
                            }
                            }

                           

                            $sql_users="select * from users";
							$q_users=$con->prepare($sql_users);
                            $q_users->execute();
							//________________________________________________
							$sql_categories="select * from categories";
							$q_categories=$con->prepare($sql_categories);
							$q_categories->execute();				
							//________________________________________________
							$sql_product="select * from products";
							$q_product=$con->prepare($sql_product);
							$q_product->execute();
							//________________________________________________
							$sql_comments="select * from comments order by add_date DESC";
							$q_comments=$con->prepare($sql_comments);
                            $q_comments->execute();
                            //________________________________________________


 switch ($type_show)
 {
	 
	case 'users': echo"<h1>المستخدمين</h1><div class='table-responsive table-bordered text-center'>";
						if ($q_users->rowcount()>0)
							{	
						echo"
    
                        <div class='col-lg-4 text-center'>
                        <a href='add-user.php?add=admin_add' class='btn btn-primary btn-lg pull-left'>
      
                          إضافة
      
                          <i class='fa fa-plus-circle'></i>
                      </a>
      
      
                  </div>
        
            <table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>تاريخ الميلاد</th>
                        <th>الصورة</th>
                        <th>نوع المستخدم</th>
                        <th>كلمة السر</th>	
                        <th>الايميل</th>
                        <th>العنوان</th>
                        <th>رقم الهاتف</th>
                        <th>النوع</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>";
					foreach($q_users->fetchall() as $users)
						
						{
							$user_id=$users['id'];
							$password=$users['password'];
							$nameOFuser=$users['name'];
							$email=$users['email'];
							$user_type=$users['user_type'];
							$address=$users['address'];
							$gender=$users['gender'];
							$birth_date=$users['birth_date'];
							$user_image=$users['image'];
							$phone=$users['phone'];
							$user_active=$users['active'];
							echo 
						"<tr>
						<td>$nameOFuser</td>
                        <td>$birth_date</td>
                        <td><img src='$image_user_path$user_image' style='height: 50px;width: 50px;'></td>
                        <td>$user_type</td>
                        <td>$password</td>
                        <td>$email</td>
                        <td>$address</td>
                        <td>$phone</td>
                        <td>$gender</td>
                        <td><a href='edit.php?id=$user_id' id='delete'><button id='delete' class='btn btn-primary d-block' type='button'>تعديل</button></a><a href='control-panel-detiles.php?whatisshow=users&action=delete&id=$user_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a>";
                        if($user_active!=1)
                        echo"<a href='control-panel-detiles.php?whatisshow=users&action=active&id=$user_id'><button class='btn btn-success' type='button'>تنشيط</button></a>";
                        else 
                        echo "<a href='control-panel-detiles.php?whatisshow=users&action=unactive&id=$user_id'>
                        <button class='btn btn-warning'
                                type='button'>الغاء التنشيط</button></a>";

                        
                        
                       echo" </td>
                    </tr>";
						
                        }
                echo"

                </tbody>
                </table>
                ";
                    }
                    else
                    echo "
                    <div>
                    <h1> لايوجد اي مستخدمين في الموقع</h1>
                    </div>";
                    
                    
                echo" </div>";
							
                   
						
					break;
		case 'categories':
		echo"
		
        <div class='col-lg-4 text-center'>
        <a href='add-cate.php' class='btn btn-primary btn-lg pull-left'>

          إضافة

          <i class='fa fa-plus-circle'></i>
      </a>


  </div>
		<h1>الاصناف</h1>
        <div class='table-responsive table-bordered text-center'>
            <table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                <thead>
                    <tr>
                        <th>اسم القسم</th>
                        <th>تاريخ الاضافة</th>
                        <th>الصورة</th>
                        <th>ملاحظة</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>";
                if ($q_categories->rowcount()>0)
							{	
					foreach($q_categories->fetchall() as $categories)
						
						{
							$categories_id=$categories['id'];
							$name=$categories['name'];
							$note=$categories['note'];
							$cate_image=$categories['image'];
							$date=$categories['add_date'];
							$active=$categories['active'];
                            echo"
                    <tr>
                        <td>$name</td>
                        <td>$date</td>
                        <td><img src='$cate_image' style='height: 50px;width: 50px;'></td>
                        <td>$note</td>
                        <td><a href='edit.php?id=$categories_id'><button class='btn btn-primary d-block' type='button'>تعديل</button></a><a href='control-panel-detiles.php?whatisshow=categories&action=delete&id=$categories_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a>";
                        if($active!=1)
                        echo"<a href='control-panel-detiles.php?whatisshow=categories&action=active&id=$categories_id'><button class='btn btn-success' type='button'>تنشيط</button></a>";
                        else 
                        echo "<a href='control-panel-detiles.php?whatisshow=categories&action=unactive&id=$categories_id'>
                        <button class='btn btn-warning'
                                type='button'>الغاء التنشيط</button></a>";
                        
                        echo "</td>
                    </tr>";
                }
                
            }
            
                    else
                        echo "
                <div>
                <h1> لايوجد اي اصناف </h1>
                </div>";
                
                        echo"
                        </tbody>
                    </table>
                </div>";
                break;
		case 'products':
        echo "
        
        <div class='col-lg-4 text-center'>
        <a href='add-product.php?add=admin_add' class='btn btn-primary btn-lg pull-left'>

          إضافة

          <i class='fa fa-plus-circle'></i>
      </a>


  </div>
		<h1>المنتجات</h1>
        <div class='table-responsive table-bordered text-center'>
            <table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                <thead> <tr>
                <th>اسم المنتج</th>
                <th>تاريخ الاضافة</th>
                <th>صور المنتج</th>
                <th>تفاصيل المنتج</th>
                <th>  سعر المنتج $ </th>
                <th>صاحب المنتج</th>
                <th>صنف المنتج</th>
                <th>التحكم</th>
            </tr></thead> <tbody>";
				if ($q_product->rowcount()>0)
							{	
					foreach($q_product->fetchall() as $products)
						
						{
							$product_id=$products['id'];
							$name=$products['name'];
							$detail=$products['detail'];
							$price=$products['price'];
							$date=$products['add_date'];
							$image1=$products['image1'];
							$image2=$products['image2'];
							$image3=$products['image3'];
							$active=$products['active'];
							$c_id=$products['c_id'];
                            $user_id=$products['user_id'];
                            //================================================
                            $sql_categories="select * from categories where id=$c_id";
						    $q1=$con->prepare($sql_categories);
						    $q1->execute();
							
						    $sql_users="select * from users where id=$user_id";
						    $q2=$con->prepare($sql_users);
						    $q2->execute();
							foreach ($q2->fetchall() as $users)$user_name=$users['name'];
							foreach ($q1->fetchall() as $cate)$category_name=$cate['name'];

							 echo"<tr>
                             <td>$name</td>
                             <td>$date</td>
                             <td><img src='$image_product_path$image1' style='height: 50px;width: 50px;'><img src='$image_product_path$image2' style='height: 50px;width: 50px;'><img src='$image_product_path$image1' style='height: 50px;width: 50px;'></td>
                             <td>$detail&nbsp;</td>
                             <td>$price</td>
                             <td>$user_name</td>
                             <td>$category_name</td>
                             <td><a href='add-product.php?id=$product_id'><button class='btn btn-primary d-block' type='button'>تعديل</button></a><a href='control-panel-detiles.php?whatisshow=products&action=delete&id_p=$product_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a>";
                             if($active!=1)
                             echo"<a href='control-panel-detiles.php?whatisshow=products&action=active&id=$product_id'><button class='btn btn-success' type='button'>تنشيط</button></a>";
                             else 
                             echo "<a href='control-panel-detiles.php?whatisshow=products&action=unactive&id=$product_id'>
                             <button class='btn btn-warning'
                                     type='button'>الغاء التنشيط</button></a>";
                        echo" </tr>";
						}
                        }
                        else echo "
                        <div>
                        <h1> لايوجد اي منتجات </h1>
                        </div>";
                  
               echo " </tbody> </table></div>";
               
               break;
        case 'comments':
            
         echo"
         
		<h1>التعليقات</h1>
        ";
            
                if ($q_comments->rowcount()>0)
							{
                                echo"<div class='table-responsive table-bordered text-center'><table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                                <thead>
                                    <tr>
                                        <th>رقم التعليق</th>
                                        <th>تاريخ التعليق</th>
                                        <th>تفاصيل التعليق</th>
                                        <th>في اي منتج</th>
                                        <th>صاحب التعليق</th>
                                        <th>التحكم</th>
                                    </tr>
                                </thead>
                                <tbody>";
					foreach($q_comments->fetchall() as $comments)
						
						{
							$comment_id=$comments['id'];
							$content=$comments['content'];
							$date=$comments['add_date'];
                            $active=$comments['active'];
                            $p_id_comment=$comments['p_id'];
                            //_____________________________________
                            $sql_product_comment="select * from products where id=$p_id_comment";
							$q_product_comment=$con->prepare($sql_product_comment);
                            $q_product_comment->execute();
                            $products_name=$q_product_comment->fetchall();
                            $product_name=$products_name[0]['name'];
                            
                            //_____________________________________
                            $user_id_comment=$comments['user_id'];
                            //_____________________________________
                            $sql_users_comment="select * from users where id=$user_id_comment";
							$q_users_comment=$con->prepare($sql_users_comment);
                            $q_users_comment->execute();
                            $users_name=$q_users_comment->fetchall();
                            $user_name=$users_name[0]['name'];
                            //_____________________________________
                            
                            echo "
                    <tr>
                        <td>$comment_id</td>
                        <td>$date</td>
                        <td>$content</td>
                        <td><a href='product-detiles.php?id=$p_id_comment'>$product_name</a></td>
                        <td>$user_name</td>
                        <td><a href='edit.php?id=$comment_id'><button class='btn btn-primary d-block' type='button'>تعديل</button></a><a href='control-panel-detiles.php?whatisshow=comments&action=delete&id=$comment_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a>";
                        if($active!=1)
                        echo"<a href='control-panel-detiles.php?whatisshow=comments&action=active&id=$comment_id'><button class='btn btn-success' type='button'>تنشيط</button></a>";
                        else 
                        echo "<a href='control-panel-detiles.php?whatisshow=comments&action=unactive&id=$comment_id'>
                        <button class='btn btn-warning'
                                type='button'>الغاء التنشيط</button></a>";
                                echo"</td>
                    </tr>";}
                    echo"
                </tbody>
            </table>
        </div>
        ";}
                else 
                        echo "
                <div>
                <h1> لايوجد اي تعليقات حتى الان</h1>
                </div>";
        break;
                case 'messages':
                echo"
                  <h1>الرسائل</h1>
                    <div class='table-responsive table-bordered text-center'>";

                    $sql_delete_message="delete from messages where id=:id";
                    $q_delete_message=$con->prepare($sql_delete_message);
                    if(isset($_GET['id']))
                    {
                    
                    $q_delete_message->execute(array('id'=> $_GET['id']));
                    } 
                    $sql_messages="select * from messages";
                    $q_messages=$con->prepare($sql_messages);
                    $q_messages->execute();
                        
                            if ($q_messages->rowcount())
                     {
                            echo" <table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                        <thead>
                            <tr>
                                <th>صاحب الرسالة</th>
                                <th>تاريخ الرسالة</th>
                                <th>ايميل المرسل</th>
                                <th>تفاصيل الرسالة</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>";
                         foreach($q_messages->fetchall() as $messages)
						
						{
							$message_id=$messages['id'];
							$sender=$messages['sender'];
							$content=$messages['content'];
							$email=$messages['email'];
                            $date=$messages['date'];
                            echo "
                            <tr>
                                <td>$sender</td>
                                <td>$date</td>
                                <td>$email</td>
                                <td>$content</td>
                                <td><a href='messages.php?id=$message_id'><button class='btn btn-primary d-block' type='button'>عرض</button></a><a href='?whatisshow=messages&action=delete&id=$message_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a></td>
                            </tr>";
                        }
                        echo"
                          </tbody>
                            </table>";
                     }  
                                            
                       
                           
					
                   
           else
           echo "
           <div>
           <h1> لايوجد اي رسائل </h1>
           </div>";
           
           
       echo" </div>";
                 
        echo"
       </div>
       ";break;
		default: echo "<h1 style='color:red;'>الصفحة غير موجودة</h1>";
        } break;

    }


        //======================================================================================================================================
        //لوحة تحكم البايعين العاديين

        case'vedor':

            {                   //________________________________________________
                               //delete comments
                               if( isset($_GET['action']) and $_GET['whatisshow']=='comments')
                               {
                                  if($_GET['action']=='delete') 
                                  {
                                $id_comment_delete=$_GET['id'];
                                $sql_comments_delete="delete from comments where id=:id";
                                $q_comments_delete=$con->prepare($sql_comments_delete);
                                $q_comments_delete->execute(array('id'=>$id_comment_delete));
                                  }

                               }
    
    
                               //======================================================
                               //delete and active products
                               if( isset($_GET['action']) and $_GET['whatisshow']=='products')
                               {
                                  if($_GET['action']=='delete') 
                                  {
                                $id_product_delete=$_GET['id'];
                                $sql_products_delete="delete from products where id=:id";
                                $q_products_delete=$con->prepare($sql_products_delete);
                                $q_products_delete->execute(array('id'=>$id_product_delete));
                                  }
                               }
    
                                
    
    
                                
                               
    
                               
    
                                //________________________________________________
                                $sql_categories="select * from categories";
                                $q_categories=$con->prepare($sql_categories);
                                $q_categories->execute();				
                                //________________________________________________
                                $sql_product="select * from products where user_id=:user_id order by add_date DESC";
                                $q_product=$con->prepare($sql_product);
                                $q_product->execute(array('user_id'=>$_SESSION['id']));
                                //________________________________________________
                                $sql_comments="select * from comments where user_id=:user_id  order by add_date DESC";
                                $q_comments=$con->prepare($sql_comments);
                                $q_comments->execute(array('user_id'=>$_SESSION['id']));
                                //________________________________________________
    
    
     switch ($type_show)
     {
         
            case 'products':
            echo "
            
            <div class='col-lg-4 text-center'>
            <a href='add-product.php?' class='btn btn-primary btn-lg pull-left'>
    
              إضافة
    
              <i class='fa fa-plus-circle'></i>
          </a>
    
    
      </div>
            <h1منتجاتي</h1>
            <div class='table-responsive table-bordered text-center'>
                <table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                    <thead> <tr>
                    <th>اسم المنتج</th>
                    <th>تاريخ الاضافة</th>
                    <th>صور المنتج</th>
                    <th>تفاصيل المنتج</th>
                    <th>  سعر المنتج $ </th>>
                    <th>صنف المنتج</th>
                    <th>التحكم</th>
                </tr></thead> <tbody>";
                    if ($q_product->rowcount()>0)
                                {	
                        foreach($q_product->fetchall() as $products)
                            
                            {
                                $product_id=$products['id'];
                                $name=$products['name'];
                                $detail=$products['detail'];
                                $price=$products['price'];
                                $date=$products['add_date'];
                                $image1=$products['image1'];
                                $image2=$products['image2'];
                                $image3=$products['image3'];
                                $active=$products['active'];
                                $c_id=$products['c_id'];
                                $user_id=$products['user_id'];
                                //================================================
                                $sql_categories="select * from categories where id=$c_id";
                                $q1=$con->prepare($sql_categories);
                                $q1->execute();
                                
                                $sql_users="select * from users where id=$user_id";
                                $q2=$con->prepare($sql_users);
                                $q2->execute();
                                foreach ($q2->fetchall() as $users)$user_name=$users['name'];
                                foreach ($q1->fetchall() as $cate)$category_name=$cate['name'];
    
                                 echo"<tr>
                                 <td>$name</td>
                                 <td>$date</td>
                                 <td><img src='$image_product_path$image1' style='height: 50px;width: 50px;'><img src='$image_product_path$image2' style='height: 50px;width: 50px;'><img src='$image_product_path$image1' style='height: 50px;width: 50px;'></td>
                                 <td>$detail&nbsp;</td>
                                 <td>$price</td>

                                 <td>$category_name</td>
                                 <td><a href='add-product.php?id=$product_id'><button class='btn btn-primary d-block' type='button'>تعديل</button></a><a href='control-panel-detiles.php?whatisshow=products&action=delete&id=$product_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a>";
                                
                            echo" </tr>";
                            }
                            }
                            else echo "
                            <div>
                            <h1> لايوجد اي منتجات </h1>
                            </div>";
                      
                   echo " </tbody> </table></div>";
                   
                   break;
            case 'comments':
                
             echo"
             
            <h1>التعليقات</h1>
            ";
                
                    if ($q_comments->rowcount()>0)
                                {
                                    echo"<div class='table-responsive table-bordered text-center'><table class='table table-bordered table-hover main-table text-center table-hover table table-bordered table-responsive'>
                                    <thead>
                                        <tr>
                                            <th>رقم التعليق</th>
                                            <th>تاريخ التعليق</th>
                                            <th>تفاصيل التعليق</th>
                                            <th>في اي منتج</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                        foreach($q_comments->fetchall() as $comments)
                            
                            {
                                $comment_id=$comments['id'];
                                $content=$comments['content'];
                                $date=$comments['add_date'];
                                $active=$comments['active'];
                                $p_id_comment=$comments['p_id'];
                                //_____________________________________
                                $sql_product_comment="select * from products where id=$p_id_comment";
                                $q_product_comment=$con->prepare($sql_product_comment);
                                $q_product_comment->execute();
                                $products_name=$q_product_comment->fetchall();
                                $product_name=$products_name[0]['name'];
                                
                                //_____________________________________
                                
                                
                                echo "
                        <tr>
                            <td>$comment_id</td>
                            <td>$date</td>
                            <td>$content</td>
                            <td><a href='product-detiles.php?id=$p_id_comment'>$product_name</a></td>
                            <td><a href='edit.php?id=$comment_id'><button class='btn btn-primary d-block' type='button'>تعديل</button></a><a href='control-panel-detiles.php?whatisshow=comments&action=delete&id=$comment_id'><button class='btn btn-danger d-block' type='button'>حذف</button></a>
                            
                        </tr>";}
                        echo"
                    </tbody>
                </table>
            </div>
            ";}
                    else 
                            echo "
                    <div>
                    <h1> لايوجد لديك تعليقات حتى الان</h1>
                    </div>";
            break;
                             

            default: echo "<h1 style='color:red;'>الصفحة غير موجودة</h1>";
            } 


    }
    break;
            default: echo "<h1 style='color:red;'>الصفحة غير موجودة</h1>";
    

 }}
 else
 echo "<h1 style='color:red;'>الصفحة غير موجودة</h1>";


    
	?>

	</div>
<?php
require_once('footer.php');

?>
<script></script>