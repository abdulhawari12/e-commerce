<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileUser extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $allowedFields =
  ["username",
    "email",
    "profile",
    "alamat",
    "password_hash",
    "updated_at"];
  protected $useTimestamps = true;
  protected $dateFormat = "datetime";
  protected $updatedField = "updated_at";
}