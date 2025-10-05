<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function model(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class, 'model_id');
    }

    public function customerProduct(): HasOne
    {
        return $this->hasOne(CustomerProduct::class);
    }

    public function modelName(): string
    {
        return $this->model->model_name;
    }

    public function productName(): string
    {
        return $this->modelName().' - '.$this->serial_number;
    }
}
