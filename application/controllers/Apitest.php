<?php

/**
 * Created by PhpStorm.
 * User: chiang
 * Date: 16-2-24
 * Time: 上午10:48
 */
class ApiTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

    }
    /**
     * YAR service test API1
     * @param mixed
     * @return mixed
     */
    public function test1()
    {
        return $this->ip(func_get_args());
    }

    /**
     * YAR service test API2
     * @param mixed
     * @return mixed
     */
    public function test2()
    {
        return $this->ip(func_get_args());
    }

    /**
     * YAR service test API3
     * @param mixed
     * @return mixed
     */
    public function test3()
    {
        return $this->ip(func_get_args());
    }

    /**
     * 判断script运行环境
     * @param mixed
     * @return mixed
     */
    private function ip($param)
    {
        if($_SERVER["REMOTE_ADDR"] == '127.0.0.1') {
            var_dump($param);
        }
        return $param;
    }
}

//$obj = new ApiTest();
//$yar = new Yar_Server($obj);
//$yar->handle();
