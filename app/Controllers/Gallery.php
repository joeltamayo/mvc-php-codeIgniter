<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController
{
    // Método para listar imágenes del usuario actual
    public function index()
    {
        // Verifica que el usuario esté logueado y que no sea admin
        if (!session()->get('logged_in') || session()->get('role') === 'admin') {
            return redirect()->to(base_url('user/list'));
        }

        $userId = session()->get('user_id');
        $galleryModel = new GalleryModel();

        // Recibir el parámetro "order" desde la URL (por GET)
        // Si se pasa "asc", ordena ascendentemente; de lo contrario, por defecto descendente
        $order = $this->request->getGet('order') == 'asc' ? 'ASC' : 'DESC';

        $data['images'] = $galleryModel->getImagesByUser($userId, $order);

        $data['order'] = strtolower($order);

        return view('gallery/index', $data);
    }


    // Método para subir una nueva imagen
    public function upload()
    {
        // Verifica que el usuario esté logueado
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('auth/login'));
        }

        // Si es POST y hay un archivo subido
        if ($this->request->getMethod() === 'POST' && $this->request->getFile('image')) {
            $file = $this->request->getFile('image');

            // Reglas de validación para archivos de imagen:
            $rules = [
                'image' => 'uploaded[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png,image/gif,image/webp]'
                    . '|max_size[image,2048]'
            ];

            // Validar que el archivo sea valido
            if (!$this->validate($rules)) {
                // Redirige con error
                return redirect()->back()
                    ->with('error', implode('<br>', $this->validator->getErrors()))
                    ->withInput();
            }

            // Verifica si el archivo es válido y no se ha movido
            if ($file->isValid() && !$file->hasMoved()) {
                // Genera un nombre aleatorio para evitar conflictos
                $newName = $file->getRandomName();
                // Define la ruta destino
                $file->move(WRITEPATH . '../public/uploads/gallery', $newName);

                // Guarda información en la base de datos
                $galleryModel = new \App\Models\GalleryModel();
                $data = [
                    'user_id'     => session()->get('user_id'),
                    'filename'    => 'uploads/gallery/' . $newName,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'ordering'    => 0
                ];
                $galleryModel->save($data);
                return redirect()->to(base_url('gallery'));
            } else {
                return redirect()->back()->with('error', 'Error al subir la imagen');
            }
        }

        // Si es GET, muestra el formulario de subida
        return view('gallery/upload');
    }

    // Método para borrar una imagen
    public function delete($id)
    {
        // Verifica que el usuario esté logueado
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('auth/login'));
        }
        $galleryModel = new GalleryModel();

        // Verifica que la imagen pertenezca al usuario antes de borrar
        $image = $galleryModel->find($id);
        if ($image && $image['user_id'] == session()->get('user_id')) {
            // Borrar el archivo del servidor
            $filepath = WRITEPATH . '../public/' . $image['filename'];
            if (file_exists($filepath)) {
                unlink($filepath);
            }
            // Borrar el registro de la base de datos
            $galleryModel->delete($id);
        }
        return redirect()->to(base_url('gallery'));
    }
}
