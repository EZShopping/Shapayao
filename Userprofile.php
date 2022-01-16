<?php
session_start();
include("config.php");
include("session.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title> ShopAyao </title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="shortcut icon" href="images/img/Logo.png" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	   	<link rel="stylesheet" href="css/userlogin.css" type="text/css" media="all" />
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
		 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
		 <!-- Linking scripts -->
    <script src="js/main.js" type="text/javascript"></script>
	
	
	<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	//toggle hide/show shout box
	$(".close_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>

<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->
</head>
<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Header -->
		<div id="header">
			<!-- Begin Shell -->
			<div class="shell">
				<h1 id="logo"><a class="notext" href="#" title="ShopAyao">ShopAyao</a></h1>
				<div id="top-nav">
					<ul>
					
						<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
						<li><a href="Sign In.php" title="Sign In"><span>Sign In</span></a></li>
					</ul>
				</div>
				<div class="cl">&nbsp;</div>
	<div class="shopping-cart"  id="cart" id="right" >
<dl id="acc">	
<dt class="active">								
<p class="shopping" >Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dt>
<dd class="active" style="display: block;">
<?php
   //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["Product Number"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Price"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Price"]*$cart_itm["Product Number"]);
        $total = ($total + $subtotal); 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <h4>(Your Shopping Cart Is Empty!)</h4>';
}
?>

</dd>
</dl>
</div>
 <div class="clear"></div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Header -->
		<!-- Begin Navigation -->
		<div id="navigation">
			<!-- Begin Shell -->
			<div class="shell">
				<ul>
					<li class="active"><a href="#" title="index.php">Home</a></li>
					<li>
						<a href="products.php">Category</a>
						<div class="dd">
							<ul>
							
								<li>
									 <a href="warehouse_1.php"> Electronics </a>
									<div class="dd">
										<ul>
											<li>
									 <a href="warehouse_1.php"> Electronics </a>
									<div class="dd">
										<ul>
											<li><a href="warehouse_1.php"></a>SA Luna</li>
                                            
										</ul>
									</div>
								</li>
								
								<li>
									 <a href="warehouse_2.php"> Women's Apparel</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_2.php">SA Calanasan</a></li>
                                            
										</ul>
									</div>
								</li>
								
								<li>
									<a href="warehouse_3.php"> Men's Apparel</a>
									<div class="dd">
										<ul>
											<li><a href="warehouse_3.php">SA Flora</a></li>
                                            
										</ul>
									</div>
								</li>
								
								<li>
									<a href="warehouse_4.php">Beverages</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_5.php">SA Kabugao</a></li>
                                             
										</ul>
									</div>
								</li>
								
								<li>
									<a href="warehouse_5.php">Furnitures</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_4.php">SA Pudtol</a></li>
                                             
										</ul>
									</div>
								</li>
								<li>
									<a href="warehouse_6.php">Home & Living</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_6.php">SA Sta. Matcela</a></li>
                                              
										</ul>
									</div>
								</li>
								<li>
									<a href="warehouse_7.php">Stationary</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_7.php"></a>SA Tuguegarao</li>
                                             
										</ul>
									</div>
								</li>
								<li>
									<a href="warehouse_8.php">Collectibles</a>
									<div class="dd">
										<ul>
											  <li>SA Aparri<a href="warehouse_8.php"></a></li>
                                            
										</ul>
									</div>
								</li>
								<li>
									<a href="warehouse_9.php">Craft Bags</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_9.php">SA Sanchez Mira</a></li>
                                             
										</ul>
									</div>
								</li>
								<li>
									<a href="warehouse_10.php">Food Stuff</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_10.php">SA Claveria</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</li>
					   <li><a href="products.php"> Products</a></li>
					   	   <li>
						<a href="products.php">Warehouse</a>
						<div class="dd">
							<ul>
								


<li>
									 <a href="warehouse_1.php">SA Luna</a>
									
								</li>
								
								<li>
									 <a href="warehouse_2.php">SA Calanasan</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php">SA Flora</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php">SA Kabugao</a>
									
								</li>
								<li>
									<a href="warehouse_5.php">SA Pudtol</a>
									
								</li>
								<li>
									<a href="warehouse_6.php">SA Sta Marcela</a>
									
								</li>
								<li>
									<a href="warehouse_7.php">SA Tuguegarao</a>
									
								</li>
								<li>
									<a href="warehouse_8.php">SA parri</a>
									
								</li>
								<li>
									<a href="warehouse_9.php">SA Sanchez Mira</a>
									
								</li>
								<li>
									<a href="warehouse_10.php">SA Claveria</a>
									
								</li>
							</ul>
						</div>
					</li>
					  <li><a href="about.php">About Us</a></li>
					  <li><a href="customer.php">Free Sign Up</a> </li>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->

		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
					


<?php
$result = mysqli_query($mysqli,"SELECT * FROM warehouse");
?>
      <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

		<thead>  <th Colspan="9">  ShopAyao Warehouse Data Table </th></thead>
		<thead>
		<thead>
			</tr>
   		    <th>Check ID</th> 
    	      <th>ID</th>
              <th> Name</th>			  
    		<th>Country</th>
		    <th>City</th>				
    		<th> Address</th>
			 <th>Postal Code</th>				
    		<th> Email</th>
    		<th>Actions</th>
			</tr>
		</thead>
		<tbody>
<?php while($row = mysqli_fetch_array($result))
  {?>

    <tr>
    <td><input type="checkbox"></td>
    <td><?Php echo $row['Warehouse_ID']; ?></td>
    <td><?php echo $row['Warehouse']; ?></td>
   <td><?php echo $row['Country']; ?></td>
	<td><?php echo $row['City']; ?></td>
	<td><?php echo $row['Address']; ?></td>
	<td><?php echo $row['PostalCode']; ?></td>
	<td><?php echo $row['Email']; ?></td>
    <td> <a href="wareViewUpdate.php?update=<?php echo $row['Warehouse_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
     <a href="DeleteWarehouse.php?delete=<?php echo $row['Warehouse_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
    </tr>

  <?php }mysqli_close($mysqli);?>
      </tbody>
</table>
	  
 </div> 
				</div>
			</div>
			<!-- End Content -->
			
			
			<!-- Begin Sidebar -->
			<div id="sidebar">
				<ul>
					<li class="widget">
						<h2>TOP Brands</h2>
						<div class="brands">
							<ul>
								<li><a href="warehouse_1.php" title="Brand 1"><img src="images/img/product01.png" width="103" height="51" alt="Brand 1" /></a></li>
								<li><a href="warehouse_2.php" title="Brand 2"><img src="images/img/Accessories1.jpg" width="103" height="51" alt="Brand 2" /></a></li>
								<li><a href="warehouse_3.php" title="Brand 3"><img src="images/img/hmt.JPG" width="103" height="51" alt="Brand 3" /></a></li>
								<li><a href="warehouse_4.php" title="Brand 4"><img src="images/img/Santol-Wine.jpg" width="103" height="51" alt="Brand 4" /></a></li>
								<li><a href="warehouse_5.php" title="Brand 5"><img src="images/img/F-Chair.jpg" width="103" height="51" alt="Brand 5" /></a></li>
								<li><a href="warehouse_6.php" title="Brand 6"><img src="images/img/F-Chair.jpg" width="103" height="51" alt="Brand 6" /></a></li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						<a href="#" class="more" title="More Brands">More Brands</a>
					</li>
				</ul>
			</div>
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
	<div class="post">
					<h2>Welcome!</h2>
					<img src="images/img/Logo.png" alt="Post Image" />
					<p>ShopAyao is an e-commerce platform for the region. Fullfiling the excitment and happiness of our customers online shopping experience. ShopAyao rpovides you the easy, secure and fast online shopping. And gives you different products options from different online sellers. <a href="#" class="more" title="Read More">Read More</a></p>
					<div class="cl">&nbsp;</div>
				</div>
		</div>
		<!-- End Main -->

			<div class="boxes">
			
			<div class="copy">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="carts">
								<div class="shout_box">
      <div class="header"> Live Discussion of ShopAyao<div class="close_btn">&nbsp;</div></div>
     <div class="toggle_chat">
     <div class="message_box">
    </div>
    <div class="user_info">
    <input name="shout_username" id="shout_username" type="text" placeholder="Your Name" maxlength="15" />
   <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" /> 
    </div>
    </div>
	</div>
	
					</div>	<p align="center">&copy; ShopAyao <a href="index.php"><i><font color="fefefe"> Welcome To <strong> ShopAyao</strong> Online Shopping Site </font></i></a></p>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
		</div>

	<!-- End Wrapper -->
</body>
</html>