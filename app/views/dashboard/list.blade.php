
	<!-- Catalog Download  -->
	<a href="{{ URL::to('catalog_downloads/') }}">
		<div class="blockquote-box blockquote-success clearfix">
			<div class="square pull-left"><span class="fa fa-cloud-download glyphicon-lg glyphicon-lg"></span></div>
		<h4>Catalog Downloads</h4></a>
		<p>Download our latest catalogs</p>
	</div>



	


	@if ((Auth::user()->type) == 'Bioss' OR (Auth::user()->type) == 'Admin' OR Auth::user()->distObj()->type == "Non Exclusive" OR Auth::user()->distObj()->type == "Exclusive" )

	<!-- Electronic Marketing Material   -->
	<a href="/marketing_materials">
		<div class="blockquote-box blockquote-info clearfix">
			<div class="square pull-left"><span class="glyphicon  glyphicon-picture glyphicon-lg"></span></div>
		<h4>Electronic Marketing Materials</h4></a>
		<p>Download our latest electronic marketing materials</p>
		
	</div>


	<!-- Product Inventories    -->
	<a href="/product_inventory">
		<div class="blockquote-box blockquote-danger clearfix">
			<div class="square pull-left"><span class="fa fa-search glyphicon-lg glyphicon-lg"></span></div>
		<h4>Product Inventory</h4></a>
		<p>Check our product inventory</p>
		
	</div>







	@endif
	

	
	

