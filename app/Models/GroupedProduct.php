<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GroupedProduct extends Model
{

    protected $table = 'product_type';

    public function product()
    {
        return $this->hasMany(Product::class, 'type_id', 'id')
            ->orderBy('position')
            ->get();
    }
}
