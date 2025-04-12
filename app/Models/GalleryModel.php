<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';

    // Los campos que se pueden insertar o actualizar
    protected $allowedFields = ['user_id', 'filename', 'uploaded_at', 'ordering'];

    protected $useTimestamps = false;

    // Ordenar imagenes
    public function getImagesByUser($userId, $order = 'DESC')
    {
        return $this->where('user_id', $userId)
            ->orderBy('uploaded_at', $order)
            ->findAll();
    }
}
