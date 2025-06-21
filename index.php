<?php
require_once 'enum_elixir.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elixir of Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/elixir.css">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST">
                            <h4 class="mb-3">Select the type of work you prefer:</h4>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="work-type[]" value="smart" id="smart_work">
                                        <label class="form-check-label" for="smart_work">Smart Work</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="work-type[]" value="hard" id="hard_work">
                                        <label class="form-check-label" for="hard_work">Hard Work</label>
                                    </div>
                                </div>
                            </div>

                            <h4 class="mb-3">Select the elixirs that you believe will help you in your journey:</h4>
                            <div class="mb-4">
                                <?php
                                foreach (Elixir::getAll() as $elixir) {
                                    $name = htmlspecialchars($elixir->getName());
                                    $desc = htmlspecialchars($elixir->getDescription());
                                    echo <<<HTML
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="elixir[]" value="{$name}" id="elixir_{$name}">
                                        <label class="form-check-label fw-bold" for="elixir_{$name}">{$name}</label>
                                        <div class="form-text">{$desc}</div>
                                    </div>
                                    HTML;
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>

                        <div class="elixir-results mt-4">
                            <?php
                            require 'brain_storm.php';
                            // Process form submission
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $workTypes = isset($_POST['work-type']) ? $_POST['work-type'] : [];
                                $elixirs = isset($_POST['elixir']) ? $_POST['elixir'] : [];

                                // Create an instance of BrainStorm
                                $brainStorm = new BrainStorm();

                                // Call the standOutGrowd method with the selected work types and elixirs
                              $result =  $brainStorm->standOutGrowd(
                                    in_array('smart', $workTypes),
                                    in_array('hard', $workTypes),
                                    array_map(fn($name) => Elixir::from($name), $elixirs)
                                );
                                // Display the results
                                if (!empty($result)) {
                                    echo '<h5>Results:</h5>';
                                    echo '<ul class="list-group">';
                                    foreach ($result as $message) {
                                        echo '<li class="list-group-item">' . htmlspecialchars($message) . '</li>';
                                    }
                                    echo '</ul>';
                                } else {
                                    echo '<p class="text-muted">No results to display.</p>';
                                }
                            }
                            ?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>