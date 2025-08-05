<div class="download-container">
	<div class="download-inner">
		<img title="{{ $catalog_download->title }}" alt="Image" src="/img/iggy/1.jpg" />
		<div class="info">
			<div class="col-sm-4" style="word-wrap: break-word">
				<h4 class="title lighter"><b>{{ $catalog_download->title }}</b></h4>
				<a class="black btn btn-sm btn-primary"	data-toggle="modal"	data-target="#instruction-{{$catalog_download->id}}">
					<b class="white">Download</b>
					(<small class="white">{{ FileHelper::formatBytes($product_export->size,0) }}</small>)
				</a>
			</div>
			<div class="col-sm-8">
				<br>File Contents:<br><br>
				<div class="gray1">
					<small>
						{{ $catalog_download->note }}
					</small>
				</div>
			</div>
			<div style="padding:0px 15px; position:absolute; top:0; right:0;">
				<h3 class="green">{{{ DateHelper::getDateFormat2($product_export->exported_date) }}}</h3>
				{{{ DateHelper::getAgo($product_export->exported_date) }}} ago
			</div>
		</div>
	</div>
</div>