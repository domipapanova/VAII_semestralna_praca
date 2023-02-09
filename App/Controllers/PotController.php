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
        $pot = Pot::getOne($id = $_GET['id']);
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

        if (isset($data['name']) && isset($data['price'])) {
            $pot->setName($this->request()->getValue('name'));
            $pot->setPrice($this->request()->getValue('price'));
            $pot->setDescription($this->request()->getValue('describtion'));
            $pot->setColor($this->request()->getValue('color'));
            $pot->setMaterial($this->request()->getValue('material'));

            if($this->request()->getValue('size') != null){
                $pot->setSize($this->request()->getValue('size'));
            }

            if(isset($_FILES['picture'])) {
                $errors = [];
                $file_name = $_FILES['picture']['name'];
                $file_size = $_FILES['picture']['size'];
                $file_tmp = $_FILES['picture']['tmp_name'];
                $file_type = $_FILES['picture']['type'];
                $file_info = pathinfo($_FILES['picture']['name']);
                $file_ext = strtolower($file_info['extension']);

                $extensions = ["jpeg", "jpg", "png", "webp"];
                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "Nesprávny formát, povolené sú JPEG alebo PNG";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'Veľkosť obrázka musí byť menšia než 2 MB';
                }

                if (empty($errors)) {
                    move_uploaded_file($file_tmp, "./public/images/" . $file_name);
                    $pot->setPictureName($file_name);
                }
            }
            $pot->save();
        }
        return $this->redirect("?c=pot");
    }

}