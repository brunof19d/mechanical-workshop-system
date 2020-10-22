<?php


namespace App\Helper;


trait RenderHtml
{
    /**
     * Render an HTML template.
     * @param string $template HTML to be rendered.
     * @param array $info Information as variables to be passed to the page to be processed.
     * @return string
     */
    public function render(string $template, array $info): string
    {
        extract($info);
        ob_start();
        require_once __DIR__ . '/../../resources/template/' . $template;
        return $html = ob_get_clean();
    }
}