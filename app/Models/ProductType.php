<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';

    protected $fillable = [
        'name',
        'position'
    ];

    public function getSelector()
    {
        $productTypes = $this->orderBy('position')->get();
        $selector = [];
        foreach ($productTypes as $productType) {
            $selector[$productType->id] = $productType->name;
        }

        return $selector;
    }
}
