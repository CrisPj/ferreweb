<?php

require(PATHAPP.PATHLIB . 'smarty/libs/Smarty.class.php');
class Template
{
    private $smarty;
    private $vars = array();

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->configurar();
    }

    public function configurar()
    {
        $this->smarty->setTemplateDir(TEMPLATES);
        $this->smarty->setCompileDir(TEMPLATES_C);
        $this->smarty->setCacheDir(CACHE);
        $this->smarty->setConfigDir(CONFIGS);
        $this->smarty->debugging = false;
        $this->smarty->caching = true;
        $this->smarty->cache_lifetime = 0;
    }

    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }
    function mostrar($nombre)
    {
        $nombreTemplate = $nombre.'.tpl';
        foreach ($this->vars as $templateVariable)
        {
            $this->smarty->assign($templateVariable["name"], $templateVariable["value"]);
        }
        $this->smarty->display($nombreTemplate);
    }
}