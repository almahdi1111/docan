<?php
session_start();
require_once('header.php');

?>
<?php
                            $c_id=$_GET['id'];
							$image_path="images/products/";							
							$sql="select * from products where c_id=$c_id and active=1";
							$q=$con->prepare($sql);
                            $q->execute();
                            $sql_c="select * from categories where id=$c_id";
							$q_c=$con->prepare($sql_c);
                            $q_c->execute();
                            $categories=$q_c->fetchall();
                            $category_name=$categories[0]['name'];
                        echo" <div class='container-fluid border rounded border-primary shadow-sm'>
	<h2 class='row'>$category_name</h2>
        <div class='row catepro' style='padding: 11px;'>";
							if ($q->rowcount()>0)
							{							
							foreach($q->fetchall() as $products)
							{
							$id=$products['id'];
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
                            
							echo "
            <div class='col-12 col-md-6 col-lg-4 col-xl-4'>
                <div>
                    <h3><a href='product-detiles.php?id=$id'><br>$name<br><br></a></h3>
					<img id='PrdoductImages$id' class='img-thumbnail img-rounded' src='$image_path$image1' style='width: 100%;height: 70%;margin-bottom: 10px;'>
                    <div class='row'>
                        <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left' style='width: 4%;'><span class='glyphicon glyphicon-menu-left' style='margin-top: 24px;font-size: 20px;'>&lt;</span></div>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='width: 27%;padding-left: 2px;padding-right: 2px;'><img class='img-thumbnail img-rounded img-responsive' style='border: 1px solid #111;cursor: pointer;width: 100%;height: 100px;' onclick='document.getElementById(&#39;PrdoductImages$id&#39;).src=this.src;' src='$image_path$image1'></div>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='width: 27%;height: 100px;padding-left: 2px;padding-right: 2px;'><img class='img-thumbnail img-rounded img-responsive' style='border: 1px solid #111;cursor: pointer;width: 99%;height: 100px;' onclick='document.getElementById(&#39;PrdoductImages$id&#39;).src=this.src;' src='$image_path$image2'></div>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='width: 27%;padding: 0px;padding-right: 2px;padding-left: 2px;'><img class='img-thumbnail img-rounded img-responsive' style='border: 1px solid #111;cursor: pointer;width: 100%;height: 100px;' onclick='document.getElementById(&#39;PrdoductImages$id&#39;).src=this.src;' src='$image_path$image3'></div>
                        <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right'
                            style='width: 4%;'><span class='glyphicon glyphicon-menu-right' style='margin-top: 24px;font-size: 20px;'>&gt;</span></div>
                    </div>
                </div>
                <div><span>$price $</span></div>
                <div class='text-center'><a href='cart.php?productid=$id'><button class='btn btn-success text-center'>اضافة الى السلة&nbsp;<i class='fa fa-plus'></i></button></a></div>
            </div>
           
        ";
							}
							}
							else
							{
								echo "<div class='container-fluid border rounded border-primary shadow-sm'><div class='row' style='color:red;'><h1>  لايوجد اي منتجات في هذا القسم </h1></div></div>";
                            }
                            
                            echo "</div>
                            </div>";
							





require_once('footer.php');

?>