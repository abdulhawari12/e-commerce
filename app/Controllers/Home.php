<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use App\Models\CartModel;
class Home extends BaseController
{
  protected $ProdukModel,
  $CartModel,
  $UserModel;

  public function __construct() {
    $this->ProdukModel = new ProdukModel;
    $this->CartModel = new CartModel;
  }
  public function index() {
    $cartCount = $this->CartModel->where(["users_id" =>
      user_id()])->countAllResults();
    $produk = $this->ProdukModel->orderBy("id", "DESC")->paginate(10);
    $data = [
      "title" => "Home",
      "cartss" => $cartCount,
      "produk" => $produk
    ];
    return view('Home/view/home', $data);
  }
  public function produk() {
    $pager = \Config\Services::pager();
    $keyword = $this->request->getVar("keyword");
    $kategori = $this->request->getVar("kategori");
    //dd($this->ProdukModel->getKeyword($keyword,$kategori));
    $cartCount = $this->CartModel->where(["users_id" =>
      user_id()])->countAllResults();
    $totalCount = $this->ProdukModel->countAllResults("nama");
    $data = [
      "title" => "Produk",
      "produk" => $this->ProdukModel->getKeyword($keyword,
        $kategori),
      "cartss" => $cartCount,
      "pager" => $this->ProdukModel->pager,
      "keyword" => $keyword,
      "kategori" => $kategori,
    ];
    return view('Home/view/produk', $data);
  }
  public function settings() {
    $cart = $this->CartModel->getCartById(user_id());
    $cartCount = $this->CartModel->where(["users_id" =>
      user_id()])->countAllResults();
    $data = [
      "title" => "Settings",
      "cartss" => $cartCount
    ];
    return view('Home/view/settings', $data);
  }
  public function detail($id) {
    $cartCount = $this->CartModel->where(["users_id" =>
      user_id()])->countAllResults();
    $produk = $this->ProdukModel->getProduk($id);
    $pl = $this->ProdukModel->where(["kategori" =>
      $produk["kategori"]])->orderBy("id", "DESC")->limit(10)->find();
    $data = [
      "title" => "Detail Produk",
      "produk" => $produk,
      "cartss" => $cartCount,
      "pl" => $pl
    ];
    return view("Home/view/detail", $data);
  }
  public function addCart($id) {
    $nama = $this->request->getVar("nama");
    $harga = $this->request->getVar("harga");
    $gambar = $this->request->getVar("gambar");
    $jumlah = $this->request->getVar("jumlah");
    $userid = $this->request->getVar("users_id");
    $cartItem = $this->CartModel->where("users_id", $id)->find();
    //dd($cartItem);
    foreach ($cartItem as $c) {
      // dd($c);
      if ($c["nama"] == $nama) {
        $newqty = $c["jumlah"] + $jumlah;
        $this->CartModel->update($c["id"], ["jumlah" => $newqty]);
        session()->setFlashData("success", "Produk Berhasil Dikeranjang");
        return redirect()->to("/Produk");
      }
    }
    $data = [
      "nama" => $nama,
      "harga" => $harga,
      "jumlah" => $jumlah,
      "gambar" => $gambar,
      "users_id" => $id,
    ];
    $this->CartModel->save($data);
    session()->setFlashData("success", "Produk Berhasil Dikeranjang");
    return redirect()->to("/Produk");
  }
  public function cart($id) {
    $carts = $this->CartModel->where(["users_id" => $id])->find();
    //dd($cart);
    $produk = $this->ProdukModel->getProduk();
    //dd($carts);
    $data = [
      "title" => "My Cart",
      "cart" => $carts,
      "pl" => $produk
    ];
    return view("Home/view/cart", $data);
  }
  public function deleted($id) {
    $this->CartModel->where(["id" => $id])->delete();
    session()->setFlashData("success", "Produk Berhasil Dihapus");
    return redirect()->to("/Cart/" . user_id());
  }
  public function akun() {
    $data = [
      "title" => "Informasi Akun Saya",
      "validation" => \Config\Services::validation()
    ];
    return view("Home/view/informasi_akun", $data);
  }/*
  public function editAkun($id) {
  //  dd($this->request->getVar());
  $data = [
     "email" => $this->request->getVar("email"),
     "username" => $this->request->getVar("username"),
     "alamat" => $this->request->getVar("alamat"),
    ];
    session()->setFlashData("success", "Berhasil Disimpan");
    $this->UserModel->withGroup($this->request->getVar("role"),$data);
    return redirect()->to("/Settings");
  }*/
}