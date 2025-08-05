<!-- 
distributors.phtml 

This script will connect to : http://d.biossusa.com/ and grab all the public information of Bioss distributors.

Specification:

- Neat Interface and very easy to add more features
- Using bootstrap 3.0 grid system to make adjusting layout very simple
- Minimize `Back to Top` button to show only 1 rather than every row
- List distributors information in the order of priority : Country > Company Contacts > Address > Logo
- Order by Contients to help the user find a certain country faster
- Automatic populate dropdown-menu with Bioss distributors countries
- Automatic grab flags, and company logos using base_64 (encode/decode)
- After user select on any country from the dropdown-menu, the page will redirect/zoom-in to that country
- Also the country name will chnage to red - to help the user know which country that they clicked on.
- code are well indented with minimum documentation, and no unuse code.

-->


<!-- CDN -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
	.drop-down{
		padding: 30;
		margin: 0;
	}
	body{
		background-image: url("/img/b/10.jpg");
		background-attachment: fixed;
	}
	.silver{
		color: #4d4e5c;
	}
	.country-name {
		font-weight: bold;
	}
	.country-name:target {
		font-weight: bold;
		color: red;
	}
	.header-continents{
		background: silver;
		padding: 10px;
		border-radius: 5px;
		color: black;
		font-weight: bold;
		width: 100%;
		float:right;
	}
	#back-to-top{
		position: fixed;
		right:400;
		bottom: 17;
		color: black;
		border: #90bc26 solid 1px;
		border-radius: 5px;
		padding: 5px;
	}
	#back-to-top:hover{
		position: fixed;
		right:400;
		bottom: 17;
		color: #90bc26;
		text-decoration: none;
	}
	#join-us{
		color: black;
		border: #90bc26 solid 1px;
		border-radius: 5px;
		padding:5px;
		text-decoration: none;
	}
	#join-us:hover{
		color: #90bc26;
		text-decoration: none;
	}
</style>


<?php
        $ch = curl_init("http://d.biossusa.com/api/url?key=secret");
        
        // Use this line if set the HTTP credential for the site
        curl_setopt($ch, CURLOPT_USERPWD, "admin:5okharoth");
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $body = curl_exec($ch);
        curl_close($ch);
        
        // Retrieving from JSON file and decoding it 
        $distributors = json_decode($body, TRUE); 

?>


<!-- Array Manipulation -->
<?php 

	if( is_array($distributors) ) {
		
		foreach ($distributors as $k => $v)
		{
			$continents[$k] = $v['distributor']['continent_id'];
			$countries[$k] = $v['hq_country']['name'];
		}
	
	array_multisort( $countries, SORT_ASC, $distributors);
	
	}
?>

<div class="container" style="background-color: white;">
	<div class="row">
		
		<!-- Dropdown-Menu : Country Names  -->
		<div class="col-sm-6 drop-down ">
			Select Country :
			<select class="state" id="state" onchange="window.location=this.value" >
				<option value="">--Select--</option>
				<?php
				foreach(array_unique($countries) as $country){ ?>
				<option value="#<?php echo $country ; ?> ">
					<?php echo $country ; ?>
				</option>
				<?php } ?>
			</select>

			<?php echo count($distributors);?>
		</div>
		
		<div class="col-sm-6 drop-down ">
			<p class="pull-right">Want to become an authorized Bioss distributor in your country?
				<a href="https://biossusa.com/store/distributor_registry.html" id="join-us"> <b>Join Us</b></a>
			</p>
		</div>
		
		<div class="col-sm-12">
			
			<?php foreach(array_unique(array_values($continents)) as $continent_id){
				if($continent_id == 1 ){ $continent_name = "Europe" ; $continent_code = "EU" ;
				}elseif ($continent_id == 2 ){ $continent_name = "Asia" ; $continent_code = "AS" ;
				}elseif ($continent_id == 3 ){ $continent_name = "North America" ; $continent_code = "NA" ;
				}elseif ($continent_id == 4 ){ $continent_name = "Oceania" ; $continent_code = "OC" ;
				}elseif ($continent_id == 5 ){ $continent_name = "South America" ; $continent_code = "SA" ;
				}else{  $continent_name = "Africa" ; $continent_code = "AF" ; }
				echo '<p id="'.$continent_name.'" class="header-continents">'.$continent_name."</p>"; ?>
				
				<?php foreach($distributors as $distributor){
					if ($distributor['distributor']['continent_id'] == $continent_id){ ?>
					
					<div class="row">
						<div class="col-sm-12 ">
							<!-- 1 -->
							<div class="col-sm-2">
								
								<!-- Country Name -->
								<h5 id="<?php echo isset( $distributor['hq_country']['name'] ) ? $distributor['hq_country']['name'] : '' ?>" class="country-name" >
									<?php echo isset( $distributor['hq_country']['name'] ) ? $distributor['hq_country']['name'] : '' ?>
								</h5>
								
								<!-- Country Flag -->
								<img src="<?php echo $distributor['flag'] ?>" width="36px" height="36px">
							</div>
							
							<!-- 2 -->
							<div class="col-sm-3"><br>
								
								<!-- Company Name -->
								<b>
									<?php echo isset( $distributor['distributor']['company_name'] ) ? $distributor['distributor']['company_name'] : '' ?> <br>
								</b>
								
								<!-- Phone -->
								<i class="fa silver fa-phone"></i> <?php echo isset( $distributor['distributor']['phone_public'] ) ? $distributor['distributor']['phone_public'] : '' ?>
								<br>
								
								<!-- Email -->
								<i class="fa silver fa-envelope"></i>
								<?php echo isset( $distributor['distributor']['email_public'] ) ? $distributor['distributor']['email_public'] : '' ?>
								<br />
								
								<!-- URL -->
								<p class="tel"> <i class="fa silver fa-globe"></i>
									<a href="http://<?php echo str_replace("http://","", isset( $distributor['distributor']['url'] ) ? $distributor['distributor']['url'] : '' ); ?>" target="blank_">
										<?php echo isset( $distributor['distributor']['url'] ) ? $distributor['distributor']['url'] : '' ?>
									</a>
								</p>
							</div>
							
							<!-- 3 -->
							<div class="col-sm-3"><br>
								<!-- Address -->
								<p class="add">
									<?php echo isset( $distributor['address']['adline1'] ) ? $distributor['address']['adline1'] : '' ?><br>
									<?php echo isset( $distributor['address']['adline2'] ) ? $distributor['address']['adline2'] : '' ?>
									<?php echo isset( $distributor['address']['city'] ) ? $distributor['address']['city'] : '' ?>,
									<?php echo isset( $distributor['address']['state'] ) ? $distributor['address']['state'] : '' ?>
									<?php echo isset( $distributor['address']['postcode'] ) ? $distributor['address']['postcode'] : '' ?> ,
									<?php echo isset( $distributor['address']['country_id'] ) ? $distributor['address']['country_id'] : '' ?><br>
									<!-- Country Name -->
									<?php echo isset( $distributor['hq_country']['name'] ) ? $distributor['hq_country']['name'] : '' ?>
									
								</p>
							</div>
						
							<!-- 4 -->
							<div class="col-sm-2">
								<?php if( isset( $distributor['user']['logo_path'] )){ ?><br>
								
								<!-- Company Logo -->
								<img  id="Company Logo" src="<?php echo $distributor['logo'] ?>" alt="logo" height="40px" width="130px" >
				
								<?php } ?>
							</div>
					
					</div>
					</div>
					<hr>
				<?php } ?><!-- End of distributors loop -->
			<?php } ?><!-- End of continents loop -->		
		<?php } ?><!-- End of if distributor array is exist -->
	</div>
</div>

<a href="#" id="back-to-top"> <b>Back to Top</b></a>