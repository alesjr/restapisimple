<?php

abstract class AbstractCoreController
{
    var $vars = [];
    var $layout = "layout";

    public function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    public function render($filename)
    {
        extract($this->vars);
        ob_start();
//        print_r(APP_VIEW . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.phtml');
        require(APP_VIEW . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.phtml');

        $content_for_layout = ob_get_clean();
        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(VIEW_LAYOUT);
        }
    }

    //evitando cross scripting e outros ataques
    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value)
        {
            $form[$key] = $this->secure_input($value);
        }
    }
}
