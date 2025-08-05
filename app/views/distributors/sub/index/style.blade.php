
<style type="text/css">
	/*________________________________*/

	.header-AS{
		border: 1px orange solid;
		border-radius: 10px;
		padding: 10px;
	}
	.header-EU{
		border: 1px #50c0de solid;
		border-radius: 10px;
		padding: 10px;
	}
	.header-NA{
		border: 1px red solid;
		border-radius: 10px;
		padding: 10px;
	}
	.header-OC{
		border: 1px #428bca solid;
		border-radius: 10px;
		padding: 10px;
	}
	.header-SA{
		border: 1px #5cb85c solid;
		border-radius: 10px;
		padding: 10px;
	}
	.header-AF{
		border: 1px silver solid;
		border-radius: 10px;
		padding: 10px;
	}
	/*________________________________*/


	.offer-info:hover{
		
		box-shadow: 0 0 7px #5bc0de;
	}
	.offer-warning:hover{
		
		box-shadow: 0 0 7px #f0ad4e;
	}
	.offer-danger:hover{
		
		box-shadow: 0 0 7px red;
	}
	.offer-success:hover{
		
		box-shadow: 0 0 7px #5cb85c;
	}
	.offer-primary:hover{
		
		box-shadow: 0 0 7px #428bca;
	}
	.offer-default:hover{
		
		box-shadow: 0 0 7px grey;
	}
	/*________________________________*/

	.big-text{
		font-size: 40px;
	}
	.border_{
		padding-right: 10px;
	}
	.border_2{
		border: silver solid 1px;
		padding: 10px;
	}

	.border_2:hover{
		box-shadow: 0 0 5px #428bca;
		
	}

	

	.continent_header {

		font-family: 'Abel', sans-serif;
		/*font-family: 'Merienda One', cursive;*/
		/*font-family: 'Kaushan Script', cursive;*/
		/*font-family: 'Julius Sans One', sans-serif;*/
		/*font-family: 'Dancing Script', cursive;*/
		
		z-index: 0;
		font-size: 30px;
		color: rgba(0,0,0 0.9);
		overflow: hidden;
		opacity: .7;
	}


	.continent_header:target {

		font-family: 'Abel', sans-serif;
		z-index: 0;
		font-size: 30px;
		color: black;
		overflow: hidden;
	}

	.continent_header:target:before {

		font-family: FontAwesome;
		content:  "\f054";
		color: orange;

	}


	.continent-header{
		float:left;
		font-size: 17px;
		
	}
	
	tr.empty,
	tr.empty td {
		background: transparent url('http://davidrhysthomas.co.uk/linked/strike.png') 0 50% repeat-x;
	}
	.shape{
		border-style: solid; border-width: 0 40px 40px 0; float:right; height: 0px; width: 0px;
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
	.shape-text{
		color:#fff; font-size:11px; font-weight:bold; position:relative; right:-21px; top:-3px; white-space: nowrap;
		-ms-transform:rotate(30deg); /* IE 9 */
		-o-transform: rotate(360deg);  /* Opera 20.5 */
		-webkit-transform:rotate(46deg); /* Safari and Chrome */
		transform:rotate(46deg);
	}
	.offer{
		background:#fff; border:2px solid #ddd; margin: 15px 0; overflow:hidden;
	}
	
	.shape {
		border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
	}
	.offer-radius{
		border-radius:7px;
	}
	.offer-danger {	border-color: #d9534f;  }
	.offer-danger .shape{
		border-color: transparent #d9534f transparent transparent;
	}
	.offer-success {	border-color: #5cb85c; }
	.offer-success .shape{
		border-color: transparent #5cb85c transparent transparent;
	}
	.offer-default {	border-color: #999999; }
	.offer-default .shape{
		border-color: transparent #999999 transparent transparent;
	}
	.offer-primary {	border-color: #428bca; }
	.offer-primary .shape{
		border-color: transparent #428bca transparent transparent;
	}
	.offer-info {	border-color: #5bc0de; }
	.offer-info .shape{
		border-color: transparent #5bc0de transparent transparent;
	}
	.offer-warning {	border-color: #f0ad4e; }
	.offer-warning .shape{
		border-color: transparent #f0ad4e transparent transparent;
	}
	.offer-content{
		padding:0 10px 10px;
	}
	@media (min-width: 487px) {
		.container {
			max-width: 750px;
		}
		.col-sm-6 {
			width: 50%;
		}
	}
	@media (min-width: 900px) {
		.container {
			max-width: 970px;
		}
		.col-md-4 {
			width: 33.33333333333333%;
		}
	}
	@media (min-width: 1200px) {
		.container {
			max-width: 1170px;
		}
		.col-lg-3 {
			width: 25%;
		}
	}
}
</style>