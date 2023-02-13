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
            if(strlen($data['name']) < 255 && is_numeric($data['price'])) {

                $pot->setName($this->request()->getValue('name'));
                $pot->setPrice($this->request()->getValue('price'));
                if (isset($data['describtion']) && strlen($data['describtion']) <= 1000) {
                    $pot->setDescription($this->request()->getValue('describtion'));
                }
                if (isset($data['color']) && strlen($data['color']) <= 30) {
                    $pot->setColor($this->request()->getValue('color'));
                }
                if (isset($data['material']) && strlen($data['material']) <= 50) {
                    $pot->setMaterial($this->request()->getValue('material'));
                }

                if (isset($data['size']) && is_numeric($data['size'])) {
                    $pot->setSize($this->request()->getValue('size'));
                }

                if (isset($_FILES['pot_picture'])) {
                    $errors = [];
                    $file_name = $_FILES['pot_picture']['name'];
                    $file_size = $_FILES['pot_picture']['size'];
                    $file_tmp = $_FILES['pot_picture']['tmp_name'];
                    $file_type = $_FILES['pot_picture']['type'];
                    $file_info = pathinfo($_FILES['pot_picture']['name']);
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
        }
        return $this->redirect("?c=pot");
    }

}