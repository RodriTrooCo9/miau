<?php

namespace App\Controllers;

use App\Models\MascotaModel;

class Mascota extends BaseController
{
    protected $mascotaModel;

    public function __construct()
    {
        $this->mascotaModel = new MascotaModel();
    }

    public function index()
    {
        $data['mascotas'] = $this->mascotaModel->findAll();
        return view('mascota/index', $data);
    }

    public function create()
    {
        return view('mascota/create');
    }

    public function store()
    {
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'tipo'        => $this->request->getPost('tipo'),
            'edad'        => $this->request->getPost('edad'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        if ($this->mascotaModel->insert($data)) {
            return redirect()->to('/mascotas');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->mascotaModel->errors());
        }
    }

    public function edit($id = null)
    {
        $data['mascota'] = $this->mascotaModel->find($id);
        
        if (empty($data['mascota'])) {
             throw new \CodeIgniter\Exceptions\PageNotFoundException('Mascota no encontrada: ' . $id);
        }

        return view('mascota/edit', $data);
    }

    public function update($id = null)
    {
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'tipo'        => $this->request->getPost('tipo'),
            'edad'        => $this->request->getPost('edad'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        if ($this->mascotaModel->update($id, $data)) {
            return redirect()->to('/mascotas');
        } else {
             return redirect()->back()->withInput()->with('errors', $this->mascotaModel->errors());
        }
    }

    public function delete($id = null)
    {
        $this->mascotaModel->delete($id);
        return redirect()->to('/mascotas');
    }
}
