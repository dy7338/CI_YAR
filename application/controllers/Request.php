<?php

/**
 * Created by PhpStorm.
 * User: chiang
 * Date: 16-2-24
 * Time: 下午1:42
 */
class request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * yar请求服务
     * @return mixed
     */
    public function yar_request()
    {
        $service = new Yar_Client('http://ci.com/apitest');
        $result = $service->test1(1, 2, array('1', '2'), 'param');
        var_dump($result);
    }
}