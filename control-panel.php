<?php
session_start();
require_once('header.php');




if ($user_type=='admin')
{
    echo" <h1 class='text-center' style='margin-bottom: 20px;'>التحكم بالمنتجات والمستخدمين</h1>
    <div class='container container-fluid'>
        <div class='row text-white'>
            <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #53c3e6;'>
                            <div class='col-xs-3 pull-left'><i class='fa fa-sitemap fa-3x'></i></div>
                            <div class='col'>
                                <div class='huge'>
									";
											$sql='select * from categories';
											$q=$con->prepare($sql);
											$q->execute();
											echo $q->rowcount();
									echo"
								
								</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=categories'>
                        <div class='panel-footer' style='height: 70px;color: #53c3e6;'><span class='pull-right'>الاصناف</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #dadd53;'>
                            <div class='col-xs-3'><i class='fa fa-edit fa-3x'></i></div>
                            <div class='col'>
                                <div class='huge'>";
									
											$sql='select * from comments';
											$q=$con->prepare($sql);
											$q->execute();
											echo $q->rowcount();
									
								echo"
								</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=comments'>
                        <div class='panel-footer' style='height: 70px;color: #dadd53;'><span class='pull-right'>التعليقات</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #2fdc13;'>
                            <div class='col-xs-3'><i class='fa fa-users fa-3x'></i></div>
                           <div class='col'>
                                <div class='huge'>
									";
											$sql='select * from users';
											$q=$con->prepare($sql);
											$q->execute();
											echo $q->rowcount();
									
								echo"
								</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=users'>
                        <div class='panel-footer' style='height: 70px;color: #2fdc13;'><span class='pull-right'>المستخدمين</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #e3a46b;'>
                            <div class='col-xs-3'><i class='fa fa-comments fa-3x'></i></div>
                           <div class='col'>
                                <div class='huge'>";
									
											$sql='select * from messages';
											$q=$con->prepare($sql);
											$q->execute();
											echo $q->rowcount();
								
								
							echo"	</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=messages'>
                        <div class='panel-footer' style='height: 70px;color: #e3a46b;'><span class='pull-right'>الرسائل</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #64b2bc;'>
                            <div class='col-xs-3'><i class='fa fa-shopping-cart fa-3x'></i></div>
                            <div class='col'>
                                <div class='huge'>";
									 
											$sql='select * from products';
											$q=$con->prepare($sql);
											$q->execute();
											echo $q->rowcount();
									
								        echo"
								</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=products'>
                        <div class='panel-footer' style='height: 70px;color: #64b2bc;'><span class='pull-right'>المنتجات</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>";
}
elseif($user_type=='vedor')
{
    echo" <h1 class='text-center' style='margin-bottom: 20px;'>لوحة التحكم الخاصة بك</h1>
    <div class='container container-fluid'>
        <div class='row text-white'>
        <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #dadd53;'>
                            <div class='col-xs-3'><i class='fa fa-edit fa-3x'></i></div>
                            <div class='col'>
                                <div class='huge'>";
									
											$sql='select * from comments  where id=:id and active=1';
											$q=$con->prepare($sql);
											$q->execute(array('id'=>$_SESSION['id']));
											echo $q->rowcount();
									
								echo"
								</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=comments'>
                        <div class='panel-footer' style='height: 70px;color: #dadd53;'><span class='pull-right'>التعليقات</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
        
        
        
        
        
        
        <div class='col-md-6 col-lg-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <div class='row' style='background-color: #64b2bc;'>
                            <div class='col-xs-3'><i class='fa fa-shopping-cart fa-3x'></i></div>
                            <div class='col'>
                                <div class='huge'>";
									 
											$sql='select * from products where id=:id and active=1';
											$q=$con->prepare($sql);
											$q->execute(array('id'=>$_SESSION['id']));
											echo $q->rowcount();
									
								        echo"
								</div>
                            </div>
                        </div>
                    </div>
                    <a href='control-panel-detiles.php?whatisshow=products'>
                        <div class='panel-footer' style='height: 70px;color: #64b2bc;'><span class='pull-right'>المنتجات</span><span class='pull-left'><i class='fa fa-arrow-circle-left'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> ";
    
}






?>

   

<?php
require_once('footer.php');

?>