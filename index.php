<?php
session_start();
require_once("header.php");		
?>
    <div class="container" style="width: 100%;padding: 0px;">
        <div class="carousel slide" data-ride="carousel" id="carousel-1" style="width: 60%;height: 54%;margin: 20%;margin-top: 2%;margin-bottom: 2%;">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/start-multivendor-ecommerce-website.gif" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/giphy.gif" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/UX-Rank-e-commerce.png" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                    data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
    <div class='container-fluid border rounded border-primary shadow-sm'>
	<h2 class='row'>المنتجات</h2>
        <div class='row catepro' style='padding: 11px;'>
	<?php
							$image_path="images/products/";							
							$sql="select * from products where active=1";
							$q=$con->prepare($sql);
							$q->execute();
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
								echo "<div class='container-fluid border rounded border-primary shadow-sm'><div class='row' style='color:red;'><h1>  لايوجد اي منتجات في الموقع</h1></div></div>";
							}
		
                    
                            
	?>
    
    </div>
    </div>
    
    <?php
require_once("footer.php");

?>