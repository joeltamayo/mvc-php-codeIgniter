<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    // Añadir usuario
    public function create()
    {
        // Verifica si el usuario ha iniciado sesión y si su rol es 'admin'
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            // Si no cumple, redirige al login o a una página con mensaje de error
            return redirect()->to(base_url('auth/login'))->with('error', 'Acceso restringido');
        }

        // Si es POST, procesa el formulario
        if ($this->request->getMethod() === 'POST') {
            $userModel = new UserModel();
            $email = $this->request->getPost('email');

            // Verificar si el correo ya existe en la base de datos
            $existingUser = $userModel->where('email', $email)->first();
            if ($existingUser) {
                // Redirigir de vuelta con un mensaje de error flash
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'El correo ya está registrado.');
            }

            // Preparar los datos del nuevo usuario
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $email,
                'password' => $this->request->getPost('password'),
                'role'     => $this->request->getPost('role')
            ];

            if (!$userModel->save($data)) {
                // Error si falla el guardado
                return redirect()->back()->withInput()->with('error', 'No se pudo crear el usuario.');
            }

            return redirect()->to(base_url('user/list'))
                ->with('success', 'Usuario creado exitosamente.');
        }

        // Si es GET, muestra el formulario de creación
        return view('user/create');
    }

    // Editar usuario
    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id); // Buscar el usuario por ID
        $currentUserId = session()->get('user_id');
        $role = session()->get('role');

        // Si no es administrador, verificar que el usuario solo edite su propio perfil
        if ($role !== 'admin' && $id != $currentUserId) {
            return redirect()->to(base_url('user/profile'));
        }

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
        }

        // Verifica si el formulario fue enviado
        if ($this->request->getMethod() === 'POST') {
            $data = [
                'id' => $id,
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
            ];

            // Si se proporcionó una nueva contraseña, se agrega
            if ($this->request->getPost('password')) {
                $data['password'] = $this->request->getPost('password');
            }

            // Actualiza los datos en la base de datos
            $userModel->save($data);

            // Redirige según el rol:
            if ($role === 'admin') {
                return redirect()->to(base_url('user/list'));
            } else {
                return redirect()->to(base_url('user/profile'));
            }
        }

        // Muestra la vista de edición con los datos del usuario
        return view('user/edit', ['user' => $user]);
    }

    // Mostar usuarios
    public function list()
    {
        // Verifica que el usuario tenga rol de 'admin'
        if (session()->get('role') !== 'admin') {
            // Si no es admin, redirige a su perfil
            return redirect()->to(base_url('user/profile'));
        }
        $userModel = new UserModel();
        $users = $userModel->findAll(); // Obtener todos los usuarios
        return view('user/list', ['users' => $users]);
    }

    // Eliminar usuario
    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('user/profile'));
        }

        $userModel = new UserModel();
        $userModel->delete($id); // Eliminar el usuario por ID
        return redirect()->to(base_url('user/list')); // Redirige al listado
    }

    public function profile()
    {
        // Verifica que el usuario esté logueado
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('auth/login'));
        }

        // Consulta los datos del usuario
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));

        // Muestra la vista con los datos
        return view('user/profile', ['user' => $user]);
    }
}
