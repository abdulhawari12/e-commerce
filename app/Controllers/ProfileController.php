<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileUser;
class ProfileController extends BaseController
{
  protected $ProfileUser;
  public function __construct() {
    $this->ProfileUser = new ProfileUser;
  }
  public function index($id) {
    $users = $this->ProfileUser->find($id);
    //dd($this->request->getVar());
    //dd($users);
    $rules = [
      "profile" => "max_size[profile, 1024]|is_image[profile]|mime_in[profile,image/png,image/jpg,image/jpeg,image/webp]"
    ];
    if (!$this->validate($rules)) {
      return redirect()->to("/Settings/akun")->withInput();
    }
    $username = $this->request->getVar("username");
    $profile = $this->request->getFile("profile");
    $alamat = $this->request->getVar("alamat");
    $email = $this->request->getVar("email");
    $sampulLama = $this->request->getVar("sampulLama");
    if($profile->getError() == 4){
      $namaRandom = $sampulLama;
    }else{
    $namaRandom = $profile->getRandomName();
    $profile->move("assets/image/profile", $namaRandom);
    if($users["profile"] != "default.png"){
    unlink("assets/image/profile/" . $sampulLama);
    }
    }
    $data = [
      "username" => $username,
      "email" => $email,
      "alamat" => $alamat,
      "profile" => $namaRandom
    ];
    session()->setFlashData("success", "Profile Berhasil Disimpan");
    $this->ProfileUser->update($id, $data);
    return redirect()->to("/Settings");
  }
}