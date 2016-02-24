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
        if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
            $service = new Yar_Client('http://ci.com/apitest');
        }else{
            $service = new Yar_Client('http://129.com/CI_YAR/apitest');
        }

        $result = $service->test2();
//        $result = $service->test1('测试', 1024, array('a'=>1,'b'=>2));
        var_dump($result);
    }
}