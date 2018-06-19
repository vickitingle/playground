<?php

namespace Controller;

use Framework\Core\AbstractController;
use Framework\Core\Template;

class HomeController extends AbstractController
{
    protected $template;

    public function __construct(
        Template $template
    ) {
        parent::__construct($template);
    }

    public function indexAction()
    {
        return parent::getView(
            __METHOD__,
            false,
            [
                'title' => APP_NAME.' - Home',
                'header' => 'Welcome to '.APP_NAME
            ]
        );

    }
}