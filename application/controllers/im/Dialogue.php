<?php
use iface\base\controller;
require_once APPPATH . 'libraries';
/**
 * xmpp,创建会话.
 * User: chiang
 * Date: 16-3-7
 * Time: 下午10:29
 */
class Dialogue extends MY_controller implements controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->_connect();
    }
}