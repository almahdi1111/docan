<?php
session_start();
require_once("header.php");

if(isset($_GET['action']))
{
  if( $_GET['action']=='delete' and isset($_GET['id']) )
  {
    $sql_cart_delete='delete from cart where id=:id';
    $q_cart_delete=$con->prepare($sql_cart_delete);
    $q_cart_delete->execute(array('id'=>$_GET['id'] ));
  }
  elseif($_GET['action']=='removeall')
  {
    $sql_cart_delete='delete from cart where user_id=:id';
    $q_cart_delete=$con->prepare($sql_cart_delete);
    $q_cart_delete->execute(array('id'=>$_SESSION['id'] ));
  }
}


if (isset($_SESSION['id']) )
{
  $USERNAME=$_SESSION['username'];
  $user_id=$_SESSION['id'];
  if(isset($_GET['productid']))
  {
$product_id=$_GET['productid'];

echo "$user_id";
$sql_cart='insert into cart (p_id,user_id) values(:p_id,:u_id)';
$q_cart=$con->prepare($sql_cart);
$q_cart->execute(array('p_id'=>$product_id ,'u_id'=>$user_id));
}
}



?>
<?php 
if (!isset($_SESSION['id']))
{

  echo "
<div>
<h1>لم يتم تسجيل الدخول بعد هل تريد تسجيل الدخول <a href='login.php'>من هنا</a></h1>
</div>
";
}

else 
{
  $sql_cart="select * from cart where user_id=$user_id";
  $q_cart=$con->prepare($sql_cart);
  $q_cart->execute();
  if($q_cart->rowcount()>0)
  {
    $id_product_carts=$q_cart->fetchall();
   echo "<div class='shopping-cart'>
    <div class='px-4 px-lg-0'>
  
    <div class='pb-5'>
      <div class='container'>
        
          <div class='row text-center'>
            
        <div class='col-lg-8'>
            <h3>
  
            اهلا بك
              <font color='green'>";
               echo $USERNAME; 
            
              echo "</font>
   ``       في سلة المنتجات التي تود شراءها
            </h3>
        </div>
        <div class='col-lg-4'>
              <a class='btn-lg btn btn-primary ' href='cart.php?action=removeall'>
        <span class='glyphicon glyphicon-remove' style='color: red;'>
  
        </span>
                حذف كل المنتجات من السلة
              </a>
            </div>
  
  
  
          </div>
        <div class='row'>
          <div class='col-lg-12 p-5 bg-white rounded shadow-sm mb-5'>

  
            <div class='table-responsive'>
              <table class='table'>
                <thead>
                  <tr>
          
                    <th scope='col' class='border-1 bg-light'>
                      <div class='p-2 px-3 text-uppercase'>المنتج</div>
                    </th>
                    <th scope='col' class='border-1 bg-light'>
                      <div class='py-2 text-uppercase'>السعر</div>
                    </th>
                    
                    <th scope='col' class='border-1 bg-light'>
                      <div class='py-2 text-uppercase'>حذف المنتج</div>
                    </th>
                  </tr>
                </thead>
                <tbody>";
    $image_path="images/products/";
    $total_price=0;
    foreach($id_product_carts as $id_product_cart)
    {

    $product_id=$id_product_cart['p_id'];
    $cart_id=$id_product_cart['id'];

      $sql_product="select * from products where id=$product_id";
      $q_product=$con->prepare($sql_product);
      $q_product->execute();
      
      foreach($q_product->fetchall() as $product)
      {
        
    $name=$product['name'];
    $price=$product['price'];
    $id=$product['id'];
    $image1=$product['image1'];
    $total_price+=$price;
      
    echo "
                  <tr>
                    <th scope='row'>
                      <div class='p-2'>
                        <img src='$image_path$image1' alt='' width='70' class='img-fluid rounded shadow-sm'>
                        <div class='ml-3 d-inline-block align-middle'>
                          <h5 class='mb-0'> <a href='product-detiles.php?id=$id' class='text-dark d-inline-block'>$name</a></h5><span class='text-muted font-weight-normal font-italic'>الصنف: Fashion</span>
                        </div>
                      </div>
                      <td class='align-middle'><strong>$$price</strong></td>
                      
                      <td class='align-middle'><a href='cart.php?action=delete&id=$cart_id' class='text-dark'><i class=' btn btn-danger fa fa-trash'></i></a>
                      </td>
                  </tr>
                
   ";}
    }
            echo"</tbody>
            </table>
            </div>
            <!-- End -->

          <div class='container-fluid'>
          <h3>
          السعر الاجمالي لكل المنتجات

          <span>$total_price </span>
          <span>$  </span>
          </h3>

          </div>


          </div>
          </div>
          <div class='row text-center' style='font-family: GES;'>
            
            <div class='container-fluid'>
            
            
            
            
              <div class='form-group'>
            
                <a href='checkout.php' class='btn btn-primary btn-lg btn-block' style='background:#339977;border-color: unset;font-family:GES;'>
              شراء المنتجات والدفع
                </a>
            
            
              </div>
            
            
            
            
            </div>
            </div>
                  </div>
            
                </div>  </div>
          </div>
          </div>";

  }
  else
echo "
<div>
<h1>لايوجد اي منتجات في السلة تسوق من هنا <a href='login.php'>من هنا</a></h1>
</div>
";
}


?>


<?php
unset($_GET);
require_once("footer.php");

?>