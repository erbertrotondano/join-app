<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'table_tb_produto';
    protected $fillable = [
        'nome_produto', 'valor_produto', 'id_categoria_produto'
    ];

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class);
    }
}
