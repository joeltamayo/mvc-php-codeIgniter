<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Registro de usuarios
    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $userModel = new \App\Models\UserModel();
            $email = $this->request->getPost('email');

            // Verificar si el correo ya existe
            $existingUser = $userModel->where('email', $email)->first();

            if ($existingUser) {
                return redirect()->back()->with('error', 'El correo ya está registrado.');
            }

            // Guardar usuario
            $userModel->save([
                'username' => $this->request->getPost('username'),
                'email'    => $email,
                'password' => $this->request->getPost('password'),
                'role'     => 'user'
            ]);

            return redirect()->to(base_url('auth/login'))->with('success', 'Cuenta creada con éxito. Ahora puedes iniciar sesión.');
        }

        return view('auth/register');
    }


    public function login()
    {
        helper('cookie');

        // Si ya hay sesión, redirige según rol:
        if (session()->get('logged_in')) {
            $role = session()->get('role');
            if ($role == 'admin') {
                return redirect()->to(base_url('user/list'));  // panel de administrador
            } else {
                return redirect()->to(base_url('gallery'));  // página de usuario
            }
        }

        // Si el formulario se envía
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            // Si se encontró el usuario y se verifica la contraseña
            if ($user && $password === $user['password']) {

                // Si el checkbox "Recordar email" está marcado
                if ($this->request->getPost('keep_logged_in')) {
                    set_cookie('remember_email', $user['email'], 60 * 60 * 24 * 30); // 30 días
                } else {
                    delete_cookie('remember_email');
                }

                // Crear datos de sesión
                session()->set([
                    'logged_in' => true,
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'email'     => $user['email'],
                    'role'      => $user['role']
                ]);

                // Redirigir según rol:
                if ($user['role'] == 'admin') {
                    return redirect()->to(base_url('user/list'));
                } else {
                    return redirect()->to(base_url('gallery'));
                }
            } else {
                // Enviar mensaje de error
                session()->setFlashdata('error', 'Credenciales incorrectas');
                return redirect()->back()->withInput();
            }
        }

        // Pasar el valor de la cookie a la vista
        return view('auth/login', [
            'rememberedEmail' => get_cookie('remember_email')
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}