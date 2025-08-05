<div id="accordion" class="accordion-style2">
	<div class="group">
		<h3 class="accordion-header">Our Company </h3>

		<div>
			<p>
				Bioss is a leading antibody developer and manufacturer with over 10,000 antigens/primary antibodies and more than 130,000 derived products.<br><br>

				Bioss is committed to providing top quality antibodies that accelerate biological research and discovery. To express our confidence in Bioss's products, we offer a generous 100% satisfaction guarantee. Bioss also invests in a third party validation program to provide unbiased authentication. Our company promises fast delivery with strong, top quality scientific support to accommodate your research needs.
			</p>
		</div>
	</div>

	<div class="group">
		<h3 class="accordion-header">Contact info</h3>

		<div>
			<p>
				Address: <br>

				500 West Cummings Park, Suite 6500, <br>
				Woburn, MA 01801 , USA<br><br>
				Tel: +1.781.569.5821<br>
				Fax: +1.781.731.9286<br><br>

				Order Fulfillment: orders@biossusa.com<br>
				Accounting: acct@biossusa.com<br>
				Scientific Support: support@biossusa.com<br>
				Business and Marketing: distributor@biossusa.com<br>
			</p>
		</div>
	</div>

	
</div><!-- #accordion -->






<!-- page specific plugin styles -->
<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />

<!-- text fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />

<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
			<![endif]-->
			<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
			<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		  <![endif]-->

		  <!-- inline styles related to this page -->

		  <!-- ace settings handler -->
		  <script src="assets/js/ace-extra.min.js"></script>

		  <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->


		
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>



<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {

		


				//jquery accordion
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
				//jquery tabs
				$( "#tabs" ).tabs();
				
				
				//progressbar
				$( "#progressbar" ).progressbar({
					value: 37,
					create: function( event, ui ) {
						$(this).addClass('progress progress-striped active')
						.children(0).addClass('progress-bar progress-bar-success');
					}
				});


			});
		</script>


