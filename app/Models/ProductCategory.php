<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'table_tb_categoria_produto';
    protected $fillable = [
        'nome_categoria'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id_categoria_produto');
    }

}
