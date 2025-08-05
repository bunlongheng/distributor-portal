<div class="modal fade" id="instruction-{{$catalog_download->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class=" col-lg-3"> </div>
	<div class=" col-lg-6">
		<br><br><br><br><br>
		<div class="modal-content">
			<div class="modal-header" data-target="#modal-step-contents">
				<button class="btn btn-danger btn-xs btn-white pull-right" data-dismiss="modal">
					x
				</button>
				<h1 class="blue lighter">File Instructions</h1>
			</div>
			<div class="modal-body step-content" id="modal-step-contents">
				<h3>The zip file contains two versions of our product list :</h3>
				<p>1. <a href="#" class="btn btn-success btn-white btn-xs disabled ">XLSX file</a></p>
				<p>2. <a href="#" class="btn btn-danger btn-white btn-xs disabled ">CSV file</a></p>
				<hr>
				
				<h3>Use the <a href="#" class="btn btn-success btn-white btn-xs disabled ">XLSX file</a> if you are using:</h3>
				<h5><i class="fa fa-check green" style="font-size:15px;"></i> Excel 2010, Excel 2007 <small> ( Excel 2003 will not be compatible with our files. ) </small></h5>
				<hr>

				<h3>Use the <a href="#" class="btn btn-danger btn-white btn-xs disabled ">CSV file</a> if you are accessing the data using:</h3>
				<h5><i class="fa fa-check green" style="font-size:15px;"></i> A programming/scripting language<h5>
				<h5><i class="fa fa-check green" style="font-size:15px;"></i> A text editor (such as Notepad++ or Sublime Text)</h5>
				<h5><i class="fa fa-check green" style="font-size:15px;"></i> A spreadsheet program that can handle standard CSV files such as OpenOffice Calc.</h5>
				<div class="alert alert-block alert-warning alert-sm ">
					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-warning red"></i>
					<strong class="red">Note</strong>
					Excel's auto-format will corrupt the CSV file's data.
				</div>
				<hr>
			</div>
			<div class="modal-footer wizard-actions">
				<a href="/catalog_downloads/{{$catalog_download->id}}/download" class="btn btn-success btn-sm btn-next">
					Start Download
				</a>
			</div>
		</div>
	</div>
</div>