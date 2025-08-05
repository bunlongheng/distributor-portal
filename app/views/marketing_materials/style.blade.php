<style type="text/css">
.imgbox{

	border-radius:5px;
	width:150px;
	display: table-cell; vertical-align: middle;

}

._hover{
	padding: 0px;
	position: relative;
	overflow: hidden;
	height: 190px;
	border: 1px solid #D8D8D8;
	/*border-radius: 10px;*/
}
._hover:hover .caption{
	opacity: 1;
	transform: translateY(-150px);
	-webkit-transform:translateY(-150px);
	-moz-transform:translateY(-150px);
	-ms-transform:translateY(-150px);
	-o-transform:translateY(-150px);
}
._hover img{
	z-index: 4;
}
._hover .caption{
	position: absolute;
	top:150px;
	-webkit-transition:all 0.3s ease-in-out;
	-moz-transition:all 0.3s ease-in-out;
	-o-transition:all 0.3s ease-in-out;
	-ms-transition:all 0.3s ease-in-out;
	transition:all 0.3s ease-in-out;
	width: 100%;
}
._hover .blur{
	background-color: rgba(0,0,0,0.8);
	height: 300px;
	z-index: 5;
	position: absolute;
	width: 100%;
}
._hover .caption-text{
	z-index: 10;
	color: #fff;
	position: absolute;
	height: 300px;
	text-align: center;
	top:-20px;
	width: 100%;

}

.file-type{
	font-size: 12px;
	padding: 5px;
	border-radius: 5px;
	border: white solid 1px;
	color:white;

}

.btn-1{
	font-size: 13px;
	padding: 5px;
	padding-left: 20px;
	padding-right: 20px;
	border-radius: 25px;
	/*border: #007aff solid 2px;*/
	background-color: #007aff;

	color:white;
	/*font-weight: bold;*/
}

.btn-2{
	font-size: 13px;
	padding: 5px;
	padding-left: 20px;
	padding-right: 20px;
	border-radius: 25px;
	background-color: #31B404;
	color:white;

}

.label-pdf{
	font-size: 10px;
	padding: 3px;
	padding-left: 5px;
	padding-right: 5px;
	border-radius: 3px;
	/*border: #007aff solid 2px;*/
	background-color: #FF0040;

	color:white;
	/*font-weight: bold;*/
}

.label-png{
	font-size: 10px;
	padding: 3px;
	padding-left: 5px;
	padding-right: 5px;
	border-radius: 3px;
	/*border: #007aff solid 2px;*/
	background-color: #FF00BF;

	color:white;
	/*font-weight: bold;*/
}

.label-jpg{
	font-size: 10px;
	padding: 3px;
	padding-left: 5px;
	padding-right: 5px;
	border-radius: 3px;
	/*border: #007aff solid 2px;*/
	background-color: #31B404;

	color:white;
	/*font-weight: bold;*/
}

.label-gif{
	font-size: 10px;
	padding: 3px;
	padding-left: 5px;
	padding-right: 5px;
	border-radius: 3px;
	/*border: #007aff solid 2px;*/
	background-color: #FFBF00;

	color:white;
	/*font-weight: bold;*/
}


.label-pdf-o{
	font-size: 12px;
	padding-left: 5px;
	padding-right: 5px;
	border: #FF0040 solid 1px;
	color:#FF0040;
	/*font-weight: bold;*/
}

.label-png-o{



	font-size: 12px;
	padding-left: 5px;
	padding-right: 5px;
	border: #FF00BF solid 1px;
	color:#FF00BF;
	/*font-weight: bold;*/
}

.label-jpg-o{
	font-size: 12px;
	padding-left: 5px;
	padding-right: 5px;
	border: #31B404 solid 1px;
	color:#31B404;
	/*font-weight: bold;*/
}

.label-gif-o{
	font-size: 12px;
	padding-left: 5px;
	padding-right: 5px;
	border: #FFBF00 solid 1px;
	color:#FFBF00;
	/*font-weight: bold;*/
}
.label-tif-o{
	font-size: 12px;
	padding-left: 5px;
	padding-right: 5px;
	border: #00FFBF solid 1px;
	color:#00FFBF;
	/*font-weight: bold;*/
}



.number-lg{
	font-size: 25px;
	/*font-family: 'Dosis', sans-serif;*/

	font-family: 'Roboto', sans-serif;
	font-weight:bold;
	line-height: 20px;
}

/*Page Specific*/

p span a:hover {
	color: white;
}

.slick {
	margin: 0px 10px 30px;
}
.slick-prev, .slick-next {
	width: auto;
}
.slick-prev:before, .slick-next:before {
	font-size: 40px;
	font-weight: normal;
}

</style>