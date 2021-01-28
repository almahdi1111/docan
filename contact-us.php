<?php
session_start();
require_once("header.php");

?>
    <div class="contact-clean">
	<?php
								$sql="INSERT INTO messages ( email, content,sender) VALUES(:email,:content,:name)";
								$q=$con->prepare($sql);
								if(isset($_POST['send']))
								{
								
								$q->execute(array('name'=>$_POST['name'],'email'=>$_POST['email'],'content'=>$_POST['message']));
								if($q->rowcount()>0)
									echo "<h3 style='color:green; text-align:center;'>شكرا للتواصل معنا </h3>";
								}
		
		?>
        <form method="post">
            <h2 class="text-center">تواصل بنا</h2>
            <div class="form-group">
				<input class="form-control" type="text" name="name" placeholder="الاسم" required="">
			</div>
            <div class="form-group text-right">
				<input class="form-control" type="email" name="email" placeholder="الايميل" required="">
				
			</div>
            <div class="form-group">
				<textarea class="form-control" name="message" placeholder="الرسالة" rows="14" required="">
				</textarea>
			</div>
            <div class="form-group text-center"><button name="send" class="btn btn-primary" type="submit">ارسال</button></div>
        </form>
		
    </div>
<?php
require_once("footer.php");

?>