<?php
session_start();
require_once("header.php");

							$image_path="images/products/";	
							$product_id=$_GET['id'];
							
							$sql_product="select * from products where id=:id";
							$q=$con->prepare($sql_product);
							$q->execute(array('id'=>$product_id));
							if ($q->rowcount()>0)
							{							
							foreach($q->fetchall() as $products)
						
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
							
						}
						
							}
						$sql_categories="select * from categories where id=$c_id";
						$q1=$con->prepare($sql_categories);
						$q1->execute();
							
						$sql_users="select * from users where id=$user_id";
						$q2=$con->prepare($sql_users);
						$q2->execute();
							foreach ($q2->fetchall() as $users)$user_name=$users['name'];
							foreach ($q1->fetchall() as $cate)$category_name=$cate['name'];
						
							
							
							echo "
							<div class='container'>
            <div class='row'>
                <div class='col-auto col-lg-7 col-lg-6 text-left'><img id='PrdoductImages$id' class='img-thumbnail img-rounded' src='$image_path$image1' style='width: 100%;height: 70%;margin-bottom: 10px;'>
                    <div class='row'>
                        <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left' style='width: 4%;'><span class='glyphicon glyphicon-menu-left' style='margin-top: 24px;font-size: 20px;'>&lt;</span></div>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='width: 27%;padding-left: 2px;padding-right: 2px;'><img class='img-thumbnail img-rounded img-responsive' style='border: 1px solid #111;cursor: pointer;width: 100%;height: 100px;' onclick='document.getElementById(&#39;PrdoductImages$id&#39;).src=this.src;' src='$image_path$image1'></div>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='width: 27%;height: 100px;padding-left: 2px;padding-right: 2px;'><img class='img-thumbnail img-rounded img-responsive' style='border: 1px solid #111;cursor: pointer;width: 99%;height: 100px;' onclick='document.getElementById(&#39;PrdoductImages$id&#39;).src=this.src;' src='$image_path$image2'></div>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='width: 27%;padding: 0px;padding-right: 2px;padding-left: 2px;'><img class='img-thumbnail img-rounded img-responsive' style='border: 1px solid #111;cursor: pointer;width: 100%;height: 100px;' onclick='document.getElementById(&#39;PrdoductImages$id&#39;).src=this.src;' src='$image_path$image3'></div>
                        <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right'
                            style='width: 4%;'><span class='glyphicon glyphicon-menu-right' style='margin-top: 24px;font-size: 20px;'>&gt;</span></div>
                    </div>
                </div>
                <div class='col' style='margin-top: 25px;margin-bottom: 25px;'>
                    <div class='row'>
                        <div class='col-md-12 col-lg-12 col-xl-12 text-center'>
                            <h2 class='text-center'>$name</h2>
                            <p class='text-right' style='font-size: 20px;'><strong>تفاصيل المنتج</strong></p>
                            <ul class='list-group text-right' style='font-size: 18px;'>
                                <li class='list-group-item'><span>السعر:<b> $price$</b></span> </li>
                                                             
                                <li class='list-group-item'><span>صاحب المنتج:<b> $user_name</b></span></li>
                                <li class='list-group-item'><span>الصنف:<b> $category_name</b></span></li>
                                <li class='list-group-item'><span>التفاصيل:<b> $detail</b></span></li>
                            </ul><a href='cart.php?productid=$product_id'><button class='btn btn-success btn-lg text-center' type='button' style='width: 296px;height: 49px;margin: 4px;'>اضافة الى السلة&nbsp;<i class='fa fa-plus'></i></button></a>
                            <hr style='font-size: 28px;'>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class='row'>
                <div class='col'>
                    <h1 class='text-center'>المراجعات</h1>
                </div>
            </div>
			";
			if(isset($_SESSION['id']))
			{
			echo"<form method='post'>
            <div class='row'>
                <div class='col-12 text-right'>
                    <div class='form-group text-right'><label class='d-block'><strong>اكتب التعليق هنا</strong></label><input name='content' class='border rounded border-info shadow-sm form-control-lg' type='text' style='width: 90%;color: rgb(181,61,61);' placeholder='التعليق' required=''></div>
                </div>
            </div>
            <div class='row'>
                <div class='col text-center'><input value='تعليق' name='add' class='btn btn-success' type='submit' style='width: 44%;margin: 0.5rem;height: 42px;padding: 8px;font-size: 17px;'></div>
            </div>
			</form>
			";
			
			$sql="INSERT INTO comments ( content,user_id,p_id) VALUES(:content,:user_id,:p_id)";
			$q6=$con->prepare($sql);
			if(isset($_POST['add']))
			{
				$q6->execute(array('content'=>$_POST['content'],'user_id'=>$_SESSION['id'],'p_id'=>$product_id));
				
			}
		}
		else
		{
			echo "<h6 style='color:red;'>يجب ان تكون مسجلا حتى تتمكن من التعليق</h6>";

		}
			$sql_comments="select * from comments where p_id=$product_id";
						$q3=$con->prepare($sql_comments);
						$q3->execute();
			foreach ($q3->fetchall() as $comments) 
			{
			$content=$comments['content'];
			$date=$comments['add_date'];
			$comment_user_id=$comments['user_id'];
			$comment_active=$comments['active'];
			
			
			
			$sql_users="select * from users where id=$comment_user_id";
			$q4=$con->prepare($sql_users);
			$q4->execute();
			foreach ($q4->fetchall() as $comment_users)
			
			$user_name=$comment_users['name'];
			if ($comment_active==1)
			echo "
            <div class='row'>
                <div class='col' style='margin-bottom:10px;'>
                    <div class='card text-right'>
                        <div class='card-header'>
                            <h4 class='mb-0' style='font-size: 20px;'>$user_name&nbsp;<span class='pull-left' style='font-size: 16px;'>$date</span></h4>
                        </div>
                        <div class='card-body'>
                            <p class='text-right' style='width: 100%;'>$content</p>
                        </div>
                    </div>
                </div>
            </div>
        
	";	
				}	
			
						
							
			?>
			</div>
    </div>
    
<?php
require_once("footer.php");

?>