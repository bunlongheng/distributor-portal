<?php

class DistUser extends Eloquent
{
    protected $table = 'distributors_users';

    function user()
    {
        return $this->belongsTo('User');
    }

    function dist()
    {
        return $this->belongsTo('Distributor', 'distributor_id', 'id');
    }
}