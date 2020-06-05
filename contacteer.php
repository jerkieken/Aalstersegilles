<!DOCTYPE HTML>
							<!-- Header -->
								<?php 
									require "_include/header.php";
								?>
								
								<?php 
								if($_GET['submit'] == "true")
								{
                                echo "<section>
                                        <div class='box'>
														<p>
														    Bedankt voor het invullen van het contactformulier. We behandelen jouw vraag zo spoedig mogelijk. 
														</p>
									</div>
                                </section>";
								}
                                ?>
								 <section>
								     <?php require "_include/contactform.php";?> 
								 </section>   

							</div>
					</div>

				<!-- Sidebar -->
				<?php require './_include/sidebar.php'; ?>
					
	
	</body>
</html>