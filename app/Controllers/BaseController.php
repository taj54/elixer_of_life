<?php


namespace App\Controllers; 

use Illuminate\View\Factory;

class BaseController
{
    /**
     * @var Factory The Blade view factory instance.
     */
    protected Factory $view;

    /**
     * BaseController constructor.
     *
     * @param Factory $view The Blade view factory instance passed from the bootstrap.
     */
    public function __construct(Factory $view)
    {
        $this->view = $view;
    }

    /**
     * Renders a Blade template.
     *
     * @param string $templateName The name of the Blade template (e.g., 'welcome').
     * @param array $data Data to pass to the template.
     * @return string The rendered HTML content.
     */
    protected function render(string $templateName, array $data = []): string
    {
        try {
            return $this->view->make($templateName, $data)->render();
        } catch (\Throwable $e) {
            // Log the error or display a generic error page
            error_log("Blade rendering error: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
            return "<h1>Error: Could not render page.</h1><p>Please check logs for details.</p>";
        }
    }
}