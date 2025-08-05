<?php



class SpecialProducts extends Eloquent
{


    protected $table = 'special_products';



    protected $fillable = array(
        'sku',
        'name',
        'price',
        'conjugation',
    );


}