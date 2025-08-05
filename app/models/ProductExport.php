<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ProductExport extends Eloquent {

	
	protected $table = 'product_exports';

	// Relation
	public function catalog_download(){return $this->belongsTo('CatalogDownload');}
	public function export_type(){return $this->belongsTo('ExportType');}

}