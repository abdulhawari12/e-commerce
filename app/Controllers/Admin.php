<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use CodeIgniter\I18n\Time;
class Admin extends BaseController
{
  protected $ProdukModel;
  public function __construct() {
    $this->ProdukModel = new ProdukModel;
  }
  public function index() {
    $data = [
      "title" => "Home | Admin"
    ];
    return view("Admin/view/home", $data);
  }
  public function dashboard() {
    $data = [
      "title" => "Dashboard | Admin"
    ];
    return view("Admin/view/dashboard", $data);
  }
  public function users() {
    $data = [
      "title" => "Kelola Users | Admin"
    ];
    return view("Admin/view/users", $data);
  }
  public function produk() {
    $data = [
      "title" => "Kelola Produk | Admin",
      "produk" => $this->ProdukModel->getProduk()
    ];
    return view("Admin/view/produk", $data);
  }
  public function settings() {
    $data = [
      "title" => "Settings | Admin"
    ];
    return view("Admin/view/settings", $data);
  }
  public function tambah() {
    $data = [
      "title" => "Tambah Data",
      "validation" => \Config\Services::validation()
    ];
    return view("Admin/view/tambah", $data);
  }
  public function add() {
    $rules = [
      "nama" => "required",
      "harga" => "required",
      "kategori" => "required",
      "deskripsi" => "required",
      "gambar1" => "required",
      "gambar2" => "required",
      "gambar3" => "required",
      "stok" => "required",
    ];
    if (!$this->validate($rules)) {
      return redirect()->to("/Admin/tambah")->withInput();
    }
    $data = [
      "nama" => $this->request->getVar("nama"),
      "harga" => $this->request->getVar("harga"),
      "kategori" => $this->request->getVar("kategori"),
      "gambar1" => $this->request->getVar("gambar1"),
      "gambar2" => $this->request->getVar("gambar2"),
      "gambar3" => $this->request->getVar("gambar3"),
      "gambar4" => $this->request->getVar("gambar4"),
      "gambar5" => $this->request->getVar("gambar5"),
      "deskripsi" => $this->request->getVar("deskripsi"),
      "diskon" => $this->request->getVar("diskon"),
      "stok" => $this->request->getVar("stok"),
      "created_at" => Time::now("Asia/Jakarta"),
    ];
    $this->ProdukModel->save($data);
    session()->setFlashData("success", "Data Berhasil Ditambahkan");
    return redirect()->to("/Admin/produkList");
  }
  public function edit($id) {
    $data = [
      "title" => "Tambah Data",
      "validation" => \Config\Services::validation(),
      "produk" => $this->ProdukModel->getProduk($id)
    ];
    return view("Admin/view/edit", $data);
  }
  public function editData($id) {
    $rules = [
      "nama" => "required",
      "stok" => "required",
      "harga" => "required",
      "kategori" => "required",
      "deskripsi" => "required",
      "gambar1" => "required",
      "gambar2" => "required",
      "gambar3" => "required",
    ];
    if (!$this->validate($rules)) {
      return redirect()->to("/Admin/edit/" . $id)->withInput();
    }
    $data = [
      "id" => $id,
      "nama" => $this->request->getVar("nama"),
      "harga" => $this->request->getVar("harga"),
      "kategori" => $this->request->getVar("kategori"),
      "gambar1" => $this->request->getVar("gambar1"),
      "gambar2" => $this->request->getVar("gambar2"),
      "gambar3" => $this->request->getVar("gambar3"),
      "gambar4" => $this->request->getVar("gambar4"),
      "gambar5" => $this->request->getVar("gambar5"),
      "deskripsi" => $this->request->getVar("deskripsi"),
      "diskon" => $this->request->getVar("diskon"),
      "stok" => $this->request->getVar("stok"),
      "updated_at" => Time::now("Asia/Jakarta"),
    ];
    $this->ProdukModel->save($data);
    session()->setFlashData("success", "Data Berhasil Diupdate!");
    return redirect()->to("/Admin/produkList");
  }
  public function deleted($id) {
    $this->ProdukModel->where(["id" => $id])->delete();
    session()->setFlashData("success", "Data Berhasil dihapus!");
    return redirect()->to("/Admin/produkList");
  }
}