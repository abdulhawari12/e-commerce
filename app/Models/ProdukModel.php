<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
  protected $DBGroup = 'default';
  protected $table = 'produk';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected $protectFields = true;
  protected $allowedFields = ["nama",
    "harga",
    "deskripsi",
    "gambar1",
    "gambar2",
    "gambar3",
    "gambar4",
    "gambar5",
    "kategori",
    "created_at",
    "updated_at",
    "diskon",
    "stok"
  ];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  // Validation
  protected $validationRules = [];
  protected $validationMessages = [];
  protected $skipValidation = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks = true;
  protected $beforeInsert = [];
  protected $afterInsert = [];
  protected $beforeUpdate = [];
  protected $afterUpdate = [];
  protected $beforeFind = [];
  protected $afterFind = [];
  protected $beforeDelete = [];
  protected $afterDelete = [];
  
  public function getProduk($id = null)
  {
    if($id !== null){
      return $this->where(["id" => $id])->first();
    }
    return $this->paginate(10);
  }
  public function getKeyword($keyword = null, $kategori = null)
  {
    if($keyword !== null){
      return $this->like("nama",$keyword)->orLike("harga",$keyword)->orLike("kategori",
      $keyword)->paginate(10,'produk');
    }else if($kategori !== null){
      return $this->like("nama",$kategori)->orLike("harga",$kategori)->orLike("kategori",
      $kategori)->paginate(10,'produk');
    }
    return $this->paginate(10,'produk');
  }
}