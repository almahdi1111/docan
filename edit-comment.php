<?php
session_start();
require_once("header.php");

?>
    <div class="contact-clean">
	<?php						

								$sql="select * comments where id=:id";
								$q=$con->prepare($sql);
								$sql="INSERT INTO messages ( email, content,sender) VALUES(:email,:content,:name)";
								$q=$con->prepare($sql);
								if(isset($_POST['edit']))
								{
								
								$q->execute(array('name'=>$_POST['name'],'email'=>$_POST['email'],'content'=>$_POST['message']));
								if($q->rowcount()>0)
									echo "<h3 style='color:green; text-align:center;'>شكرا للتواصل معنا </h3>";
								}
		
		?>
        <form method="post">
            <h2 class="text-center">تعديل التعليق</h2>

            <div class="form-group">
				<textarea class="form-control" value="almahdi" name="comment" placeholder="التعليق">
				</textarea>
			</div>
            <div class="form-group text-center"><button name="edit" class="btn btn-success" type="submit">تعديل</button></div>
        </form>
		
    </div>
<?php
require_once("footer.php");

?>