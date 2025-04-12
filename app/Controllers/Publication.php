<?php

namespace App\Controllers;

use App\Models\PublicationtModel;

class Publication extends BaseController
{
    public function index()
    {
        $model = new PublicationtModel();
        $data['posts'] = $model->get();
        echo view('header');
        echo view('publication/all', $data);
        echo view('footer');
    }

    public function add()
    {

        $model = new PublicationtModel();

        if ($this->request->getMethod() === 'POST' && $this->validate(['content' => 'required'])) {
            $model->save(['content' => $this->request->getPost('content'), 'user' => 1]);
        }
        return redirect()->to(base_url() . '/publication');
    }

    public function edit($id)
    {
        $model = new PublicationtModel();

        if ($this->request->getMethod() === 'POST' && $this->validate(['content' => 'required'])) {
            $model->save(['id' => $this->request->getPost('id'), 'content' => $this->request->getPost('content')]);
            return redirect()->to(base_url() . '/publication');
        } else {
            $data['post'] = $model->get($id);
            echo view('header');
            echo view('publication/edit', $data);
            echo view('footer');
        }
    }

    public function delete($id)
    {
        $model = new PublicationtModel();
        $model->delete($id);
        return redirect()->to(base_url() . '/publication');
    }
}
