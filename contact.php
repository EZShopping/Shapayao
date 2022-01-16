<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title> ShopAyao </title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/img/Logo.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	   
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
				<h1 id="logo"><a class="notext" href="index.php" title="SAcart">Suncart</a></h1>
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
					<li class="active"><a href="index.php" title="index.php">Home</a></li>
					<li>
						<a href="products.php">Category</a>
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
		<!-- Begin Slider -->
		<div id="slider">
		
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
              <div class="support_desc">
  				<h2>Live Support</h2>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Welcome To Live Technical Support</span></p>
  				<p> Admin On behalf on <b>ShopAyao</b> shop we have welcome you 24/7 live support 
				  you can ask what ever you think about our shop.</p>
  			</div>

				<div id="form_wrapper" class="form_wrapper">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="POST" action="feedback_process.php" id="frmcontact">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" id="name"value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" id="email"value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="phone" id="phone"value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="text"  id="textarea" maxlength="100"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type = "submit" name = "submit" id = "submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				
									
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
 
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'feedback_process.php',
        data: $("#frmcontact").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
				

			</div>
			<!-- End Content -->

	 
			<!-- Begin Sidebar -->
			<div id="sidebar">
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h2>Find Us Here</h2>
					    	  <div class="map">
							   	    <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/place/Apayao+State+College,+Luna+Campus/@18.3323408,121.3761845,17z/data=!3m1!4b1!4m5!3m4!1s0x3388b16a9582c493:0xf3dabd64f9ea05cd!8m2!3d18.3323408!4d121.3783732?hl=en"></iframe><br><small><a href="https://www.google.co.in/maps/search/san+isidro,+Luna+Apayao+Philippines/@18.3388227,121.3580159,13z/data=!3m1!4b1" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
							  </div>
      				</div>
      			<div class="company_address">
				     	<h2>Shop Information :</h2>
						    	<p><big> ShopAyao</big> Is A Online Project in partial fulfilment to our final module</p>
						   		<p>  </p>
								<p> APAYAO STATE COLLEGE</p>
						   		<p>SAN ISIDRO, LUNA, APAYAO</p>
								 <BIG>PHONE</BIG>
				   		          <p>+639982760169</p>
								   <p>+639287734040</p>
				   		          <BIG>EMAIL</BIG>
				 	 	          <p>shopayao@gmail.com</p>
								  <p>dhonaguinaldovill@gmail.com</p>
								  <p>jovelynann1221@gmail.com</p>
								   <BIG>FOLLOW US</BIG>
				   		    <p><span>Facebook</span>, <span>Twitter</span></p>
							         <p>shopayao@gmail.com</p>
				   </div>
				 </div>
			</div>
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
			<!-- Begin Products -->
		</div>
		<!-- End Main -->
					
							 <div class="shout_box">
     <div class="header"> Live Discussion of ShopAyao <div class="close_btn">&nbsp;</div></div>
     <div class="toggle_chat">
     <div class="message_box">
     </div>
     <div class="user_info">
     <input name="shout_username" id="shout_username" type="text" placeholder="Your Name" maxlength="25" />
     <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="200" /> 
     </div>
     </div>
	 </div>
	</div>
	<!-- End Wrapper -->	
</body>
</html>