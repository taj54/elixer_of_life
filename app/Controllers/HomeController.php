<?php

namespace App\Controllers;

use App\services\BrainStorm ;
use App\Enum\Elixir;
use App\services\BrainStormService;

class HomeController extends BaseController
{
    public function index(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $workTypes = isset($_POST['work-type']) ? $_POST['work-type'] : [];
            $elixirNames = isset($_POST['elixir']) ? $_POST['elixir'] : [];
            $brainStorm = new BrainStormService();
            $result = $brainStorm->standOutGrowd(
                in_array('smart', $workTypes),
                in_array('hard', $workTypes),
                array_map(fn($name) => Elixir::from($name), $elixirNames)
            );
        }
        $elixirs = Elixir::getAll();
        $result = $result ?? null;
        return $this->render("entry", ['elixirs' => $elixirs, 'result' => $result]); 
    }
    

}