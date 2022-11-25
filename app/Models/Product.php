<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'price',
        'promotional_price',
        'position',
        'type_id'
    ];

    public function type()
    {
        return $this->hasOne(ProductType::class, 'id', 'type_id');
    }

    public function getPriceFormatted()
    {
        return number_format($this->price / 100, 2);
    }

    public function getPriceFloat()
    {
        return $this->price / 100;
    }


}
