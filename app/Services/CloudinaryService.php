<?php

namespace App\Services;

use Cloudinary\Api\ApiResponse;
use Cloudinary\Cloudinary;

class CloudinaryService
{
  protected Cloudinary $client;

  public function __construct()
  {
    $this->client = new Cloudinary(config('cloudinary.cloud_url'));
  }

  public function upload(string $path, array $options = []): ApiResponse
  {
    return $this->client->uploadApi()->upload($path, $options);
  }

  public function destroy(string $publicId): void
  {
    $this->client->uploadApi()->destroy($publicId);
  }
}
