<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
  protected $DBGroup = 'default';
  protected $table = 'cart';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected $protectFields = true;
  protected $allowedFields = ["users_id",
    "nama",
    "harga",
    "produk_id",
    "jumlah",
    "gambar"];
  public function getCartById($id) {
    return $this->where(["users_id" => $id])->find();
  }
}