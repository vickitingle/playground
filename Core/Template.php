<?php

namespace Core;

class Template
{
    /** @var string */
    protected $path;

    /** @var array */
    protected $data;

    public function __construct($path, $data = [])
    {
        $this->path = TEMPLATE_PATH . DS . $path . '.phtml';
        $this->data = $data;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        if (file_exists($this->path)) {
            try {
                extract($this->data);
                ob_start();
                include($this->path);
                $buffer = ob_get_contents();
                @ob_end_clean();
                return $buffer;
            } catch (\Exception $e) {
                throw new \Exception('The template ' . $this->path . ' could not be rendered.');
            }

        } else {
            throw new \Exception('The template ' . $this->path . ' could not be found.');
        }
    }
}