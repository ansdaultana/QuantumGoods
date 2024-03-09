<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'vendor_id', 'item_id', 'quantity', 'total_price', 'shipping_address',
    ];
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function products()
{
    return $this->belongsToMany(Product::class)->withPivot('quantity');
}

}
