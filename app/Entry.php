<?php

namespace App;

use App\Enum\Elixir;
use App\BrainStorm;


$elixirs = Elixir::getAll();
$result = null;

class Entry
{
    public function __construct()
    {
        // Initialization code if needed
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $workTypes = isset($_POST['work-type']) ? $_POST['work-type'] : [];
            $elixirNames = isset($_POST['elixir']) ? $_POST['elixir'] : [];
            $brainStorm = new BrainStorm();
            $result = $brainStorm->standOutGrowd(
                in_array('smart', $workTypes),
                in_array('hard', $workTypes),
                array_map(fn($name) => Elixir::from($name), $elixirNames)
            );
        }

        global $blade, $elixirs, $result;
        echo $blade->run("entry", ['elixirs' => $elixirs, 'result' => $result]);
    }
}
