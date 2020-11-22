<?php


namespace classes\controllers;


use classes\components\Menu;
use classes\Config;
use classes\Request;
use Tracy\Debugger;

/**
 * Class BaseController
 * @package classes\controllers
 */
abstract class BaseController
{

    /** @var Request */
    protected $request;

    /** @var string */
    protected $title;

    /** @var array  */
    protected $varsToTemplate = [];


    /**
     * BaseController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->setMenu();
    }


    /**
     * Vytvori objekt menu aplikace a zpristupni ho sablone
     */
    protected function setMenu()
    {
        $menu = new Menu(Config::$menuItems);
        $this->addVarToTemplate('menu', $menu);
    }


    /**
     * @param $key
     * - což je název proměnné 
     * @param $value
     * - je její hodnota
     */
    protected function addVarToTemplate($key, $value)
    {
        $this->varsToTemplate[$key] = $value;
    }


    /**
     * @return false|mixed|string
     */
    protected function getAction()
    {
        $action = $this->request->getUrlPart('action');
        if (!$action) {
            $action = Config::DEFAULT_ACTION;
        }
        return $action;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title ?? Config::DEFAULT_TITLE;
    }


    /**
     * Metoda sestaveni odpovedi klientovi
     * @throws \ReflectionException
     */
    protected function render()
    {
        $action = $this->getAction();
        $template = $this->getTemplate($action);
        $title = $this->getTitle();

        extract($this->varsToTemplate, true);
        //Debugger::barDump($menu, 'menu');


        if (!file_exists($template)) {
            Debugger::log('Neexistuje šablona: '.$template, 'critical');
            throw new \Exception('Neexistuje šablona: '.$template);
        }

        require_once 'inc/head.php';
        // Vložení konkrétní šablony podle akce Controlleru
        require_once $template;

        require_once 'inc/bottom.php';

        // Konec cinnosti interpreta PHP
        exit;
    }


    /**
     * Metoda vrati cestu k sablone aktualni akce Controlleru
     * @param $action
     * @return string
     * @throws \ReflectionException
     */
    protected function getTemplate($action)
    {
        $reflect = new \ReflectionClass($this);
        $controller = $reflect->getShortName();
        $controller = str_replace('Controller', '', $controller);
        return './views/'.$controller.'/'.$action.'.tpl';
    }

}















