<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
  public static function client(): Cloudinary
  {
    return new Cloudinary(env('CLOUDINARY_URL'));
  }
}
