<?php
session_start();

require_once("header.php");

$id_message=$_GET['id'];

							$sql="select * from messages where id=:id";
							$q=$con->prepare($sql);
							$q->execute(array('id'=>$id_message));
							if ($q->rowcount()>0)
							{	

							foreach($q->fetchall() as $messages)
							{
							$id=$messages['id'];
							$name=$messages['sender'];
							$content=$messages['content'];
							$date=$messages['date'];
							$email=$messages['email'];
							echo "
							<div class='panel panel-primary'>
							<div class='panel-heading'>
								<h3 class='text-center'>$name</h3>
							</div>
							<div class='padding-content'>
								<div class='row'>
									<div class='col'>
										<div class='alert alert-success' role='alert'>
											<span class='pull-left'>$date</span>
											
											<span><strong>$content</strong></span>
										</div>
									</div>
								</div>

							</div>
							<div class='panel-footer'>
								<p class='text-center'>الايميل : $email</p>
							</div>
						</div>
						";
						}
						
					}
					else
								echo "<h2 style='color:red; text-align:center;'>لا يوجد اي رسائل </h2>";
							
							

?>

   <?php
require_once("footer.php");

?>