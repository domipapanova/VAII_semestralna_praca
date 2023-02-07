<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Pot;

class PotController extends AControllerBase
{
    public function index(): Response
    {
        $pots = Pot::getAll();
        return  $this->html($pots);
    }

    public function authorize(string $action)
    {
        return true;
    }

    public function create()
    {
        return  $this->html([
            'pot' => new Pot()
        ], 'create');
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        $pot = Pot::getOne($this->request()->getValue('id_pot'));
        $pot->delete();

        return $this->redirect("?c=pot");
    }

    public function edit()
    {
        return $this->html([
            'pot' => Pot::getOne($this->request()->getValue('id_pot'))
        ],
            'create'
        );
    }
    /**
     * @return  \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $data = $this->request()->getPost();
        $id = $this->request()->getValue('id');
        $pot = ($id ? Pot::getOne($id) : new Pot());
        if(isset($data['nazov']) && isset($data['cena'])) {
            $pot->setName($this->request()->getValue('nazov'));
            $pot->setPrice($this->request()->getValue('cena'));
            $pot->setDescription($this->request()->getValue('popis'));
            $pot->setColor($this->request()->getValue('farba'));
            $pot->setMaterial($this->request()->getValue('material'));
            $pot->setSize($this->request()->getValue('velkost'));

            if ($this->request()->getValue('obrazok') != null) {
                $pot->setPictureName($this->request()->getValue('obrazok'));
            }

            $pot->save();

        }
        return $this->redirect("?c=pot");
    }

}