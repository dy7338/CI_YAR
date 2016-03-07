<?php
use iface\base\controller;
use libraries\Xmpphp;

/**
 * xmpphp,创建会话.
 * User: chiang
 * Date: 16-3-7
 * Time: 下午10:29
 */
class Dialogue extends MY_controller implements controller
{
    private $obj;
    public function __construct()
    {
        parent::__construct();
        //是实例化一个xmpphp对象
        $this->_connect();
    }

    /**
     * 链接服务器
     * @param string host
     * @param int port
     * @param string username
     * @param string password
     * @param string resource
     * @param string server
     */
    private function _connect()
    {
        $this->obj = new Xmpphp\XMPPHP_XMPP(
            '45.78.32.254',
            5222,
            'test1',
            'test1234',
            'xmpphp',
            '45.78.32.254'
        );
        var_dump($this->_connect());
    }
}