<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', 'address','bank_name','contact_person', 'phone_number', 'bank_account_number', 'payment_gateway_info',
        'facebook_store_url', 'instagram_store_url','details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'vendor_id');
    }
}
