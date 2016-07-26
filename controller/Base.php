<?php
namespace controller;

use lib\Config;
use lib\RepoTool;

abstract class Base
{

    const WARING = 'waring';
    const INFO = 'info';
    const ERR = 'error';

    protected $view;
    protected $checkRepo = true;

    public function __construct()
    {
        $this->authentication();

        $this->view = new \lib\View();

        \lib\Git::set_bin(Config::$config['GIT_BIN']);

        $this->initialize();
    }

    protected function initialize()
    {
        $this->checkRepo && $this->checkRepo();
    }


    protected function authentication()
    {
        if (!MANY_USERS || isset($_COOKIE['username'])) {
            return;
        }

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate:BASIC Realm=authentication");
            header("HTTP/1.0 401 Unauthorized");
            echo("请验证身份信息");
            exit;
        } else if (!isset(Config::$config["USER"][$_SERVER['PHP_AUTH_USER']]) || !is_callable(Config::$config["USER"][$_SERVER['PHP_AUTH_USER']]) || !call_user_func(Config::$config["USER"][$_SERVER['PHP_AUTH_USER']], $_SERVER['PHP_AUTH_PW'])) {
            header("WWW-Authenticate:BASIC Realm=authentication");
            header("HTTP/1.0 401 Unauthorized");
            echo("请输入正确的身份信息");
            exit;
        }else{
            setcookie("username", $_SERVER['PHP_AUTH_USER']);
            $this->redirect(U('Index', 'index'));
        }
    }

    protected function checkRepo()
    {
        RepoTool::create();

        if (RepoTool::isGitEmpty()) {
            $this->showMessage("当前数据库尚未加入版本库", self::WARING, array(array("立即初始化版本库", U("Git", "init"))));
        }

        if (RepoTool::isLocalEmpty()) {
            $this->showMessage("本地数据库未初始化", self::WARING, array(array("立即初始化", U("Local", "init"))));
        }
    }

    protected function showMessage($message, $type, $params = null)
    {
        $this->view->type = $type;
        $this->view->message = $message;
        $this->view->params = $params;
        $this->view->display("message");
        exit;
    }

    protected function redirect($url)
    {
        header("Location:" . $url);
    }
}