<?php
session_start();
require_once("header.php");

?>
    <div class="container profile profile-view">
	<?php
							
								
							if(isset($_POST['add']))
							{
								if(!empty($_POST['name']))
							{	
								$sql="insert into categories (name, note) values (:name,:note)";
								$q=$con->prepare($sql);
								$q->execute(array('name'=>$_POST['name'],'note'=>$_POST['note']));
								echo "one row inserted";
							}
							else "<h4>Enter name for category</h4>";
						}
						
					
			?>					
        <form  method="post" action="">
            <div class="form-row profile-row">
                <div class="col-md-12 text-right">
                    <h1>اضافة صنف</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
								<label>اسم الصنف</label>
								<input class="form-control" type="text" name="name" required>
								</div>
                            <div class="form-group">
								<label>وصف الصنف</label>
								<input class="form-control" type="text" name="note">
							
							<label class="d-block">صورة الصنف</label>
							<input type="file">
							</div>
							<input class="btn btn-primary pull-left" type="submit" name="add" value="حفظ">
                        
							   
						</div>
                    </div>
                </div>
            </div>
        </form>
				
    </div>
<?php
require_once("footer.php");

?>