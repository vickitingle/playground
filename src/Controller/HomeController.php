<?php

namespace Controller;

use Framework\Core\AbstractController;
use Framework\Core\Template;
use Framework\Database\Db;

class HomeController extends AbstractController
{
    protected $template;
    protected $connection;

    public function __construct(
        Template $template,
        Db $connection
    ) {
        parent::__construct($template);
        $this->connection = $connection;
    }

    public function indexAction()
    {
        $params = [
            'id > 1',
            'name="Sakura"'
        ];

        $result = $this->connection->select('test', $params);

        echo '<pre>';
        print_r($result);
        echo '</pre>';

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