<?php

namespace Framework\Core;

use Framework\Core\Template;

class AbstractController
{
    protected $template;

    public function __construct(
        Template $template
    ) {
        $this->template = $template;
    }

    public function getView($controller, $isAdmin = false, array $variables = [])
    {
        return $this->template->getView($controller, $isAdmin, $variables);
    }
}