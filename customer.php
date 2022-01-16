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
				<h1 id="logo"><a class="notext" href="index.php" title="SAcart">ShopAyao</a></h1>
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
									 <a href="warehouse_1.php"> Warehouse A</a>
									
								</li>
								
								<li>
									 <a href="warehouse_2.php"> Warehouse B</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php"> Warehouse C</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php"> Warehouse D</a>
									
								</li>
								<li>
									<a href="warehouse_5.php"> Warehouse E</a>
									
								</li>
								<li>
									<a href="warehouse_6.php"> Warehouse F</a>
									
								</li>
								<li>
									<a href="warehouse_7.php"> Warehouse G</a>
									
								</li>
								<li>
									<a href="warehouse_8.php"> Warehouse H</a>
									
								</li>
								<li>
									<a href="warehouse_9.php"> Warehouse I</a>
									
								</li>
								<li>
									<a href="warehouse_10.php"> Warehouse J</a>
									
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
		<!-- End Navigation -->		<!-- Begin Slider -->
		<div id="slider">
		
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
           
	
<script type="text/javascript">
$(document).ready(function() { 

    $('#btnSubmit').click(function() {  

        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        var emailaddressVal = $("#email").val();
        if(emailaddressVal == '') {
            $("#email").after('<span class="error">Please enter your email address.</span>');
            hasError = true;
        }

        else if(!emailReg.test(emailaddressVal)) {
            $("#email").after('<span class="error">Enter a valid email address.</span>');
            hasError = true;
        }

        if(hasError == true) { return false; }

    });
});

</script>

					
<div id="form_wrapper" class="form_wrapper">
	 <table>
					<form class="register active"  id="myForm" method="POST" action="insertCustomer.php">

   
       <th colspan="3"><h2>CUSTOMER REGISTRATION:</h2> </th> 
						
						
						   
   
   <tr>
    <td>  

		<label> Email:</label>
		<input type="text" name="email" id="email"/>
		<span class="error">This is an error</span>

	
	</td>
    <td>   



		<label> FullName:</label>
		<input type="text" name="name" />
		<span class="error">This is an error</span>
							
   </td>


   </tr>
   
    <tr>
    <td>  

		<label>Password:</label>
		<input type="password" name="password1" id="password1" />

	</td>
	
   <td>   
     	  <label>UserName:</label>
			<input type="text" name="username" id="username"/>
			<span class="error">This is an error</span>

	</td>

   </tr>
   
   <tr>
    <td>  

		<label> Re-Password:</label>
		<input type="password" name="password2"id="password2" />  
		<div id="pass-info"> </div>
	</td>
	
   <td>   
     
			<label> Phone:</label>
			<input type="text" name="tell" id="tell"/>
			<span class="error">This is an error</span>

   </td>
   
   
   </tr>
   
    <tr>
    <td>   
	
		<label> Country:</label>
        <script type="text/javascript" src="js/countries.js"></script>
        <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>

   </td>
   
    <td>   

        <label>Address:</label>
		<input type="text" name="address" id="address"/>
		<span class="error">This is an error</span>   
		

   </td>
   
   
   </tr>
   
   
   <tr>
      <td>   
  
            <label> City:</label>
			<select name ="City" id ="state"></select>
		    <script language="javascript">print_country("country");</script>
			<span class="error">This is an error</span>
    </td>
   
      <td>   
   
			<label>Postal code:</label>
			<input type="text" name="pcode" id="pcode"/>
			<span class="error">This is an error</span>

   </td>
   
   </tr>
   
   
  <tr>
						<div class="bottom">

						<td colspan="3">	
						<button  id="btnSubmit" type="submit" name="submit"> Register</button>
							
							<div class="clear"></div>
						</div>
						
		
   </tr>
					</form>

					</table>
	
	$conn = new mysqli('email', 'fullname', 'password', 'username', 're-password', 'phone', 'country', 'address', 'city', 'postal code', 'somstore');
 $pwd = $_POST['password'];
 $encrypted_pwd = md5($pwd);
 $username = $_POST['username']; 
 $insert ="INSERT into an_users (id, username, password) 
 VALUES  ('', '$username', '$encrypted_pwd')";
 if($conn->query($insert)){
  echo 'Data inserted successfully';
 }
 else{
  echo 'Error '.$conn->error;  
 }
	
	
					
<script type="text/javascript">

$(document).ready(function(){ 
    // $("#btnSubmit").click(function() { 
    // alert("Are You Want To Save A New Customer !!!");
    //     $.ajax({
    //     cache: false,
    //     type: 'POST',
    //     url: 'insertCustomer.php',
    //     data: $("#myForm").serialize(),
    //     success: function(d) {
    //         $("#someElement").html(d);
    //     }
    //     });
    // }); 
});

</script>

					
				</div>
	   			

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
				     	<h2>Company Information :</h2>
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
		<!-- Begin Footer -->
		<div id="footer">
			<div class="boxes">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="box post-box">
						<h2>About ShopAyao</h2>
						<div class="box-entry">
							<img src="images/img/Logo.png" alt="ShopAyao" width="160" height="80"/>
							<p>ShopAyao is an e-commerce platform for the region. Fullfiling the excitment and happiness of our customers online shopping experience. ShopAyao rpovides you the easy, secure and fast online shopping. And gives you different products options from different online sellers. </p>
							<div class="cl">&nbsp;</div>
						</div>
					</div>
					<div class="box social-box">
						<h2>We are Social</h2>
						<ul>
							<li><a href="#" title="Facebook"><img src="images/social-icon1.png" alt="Facebook" /><span>Facebook</span><span class="cl">&nbsp;</span></a></li>
							<li><a href="#" title="Twitter"><img src="images/social-icon2.png" alt="Twitter" /><span>Twitter</span><span class="cl">&nbsp;</span></a></li>							
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
					<div class="box">
						<h2>Information</h2>
						<ul>
							<li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
							<li><a href="#" title="Contact Us">Contact Us</a></li>
							<li><a href="#" title="Log In">Log In</a></li>
							<li><a href="#" title="Account">Account</a></li>

						</ul>
					</div>
					<div class="box last-box">
						<h2>Categories</h2>
						<ul>
							<li><a href="#" title="Electronics">Eletronics</a></li>
							<li><a href="#" title="Women's Apparel">Women's Apparel </a></li>
							<li><a href="#" title="Men's Apparel ">Men's Apparel</a></li>
							<li><a href="#" title="Beverages">Beverages</a></li>
							<li><a href="#" title="Furnitures">Furnitures</a></li>
							<li><a href="#" title="Home & Living">Home & Living</a></li>
							<li><a href="#" title="Stationary">Stationary</a></li>
							<li><a href="#" title="Collectibles">Collectibles</a></li>
							<li><a href="#" title="Crafts Bags">Crafts Bags</a></li>
							<li><a href="#" title="Food Stuff">Food Stuff</a></li>
						</ul>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
			<div class="copy">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="carts">
						<ul>
							<li><a href="#" title="ShopAyao"><img src="images/img/Logo.png" alt="ShopAyao" /></a></li>
				
						</ul>
					</div>	<p>&copy; ShopAyao <a href="index.php"><i><font color="fefefe"> Welcome To ShopAyao Online Shopping Site </font></i></a></p>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
		</div>
		<!-- End Footer -->
		
		<div class="shout_box">
      <div class="header"> Live Discussion of ShopAyao <div class="close_btn">&nbsp;</div></div>
     <div class="toggle_chat">
     <div class="message_box">
    </div>
    <div class="user_info">
    <input name="shout_username" id="shout_username" type="text" placeholder="Your Name" maxlength="15" />
   <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" /> 
    </div>
    </div>
	</div>
	
	</div>
	<!-- End Wrapper -->
</body>
</html>