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
        $this->load->driver('cache');
    }

    /**
     * yar请求服务
     * @return mixed
     */
    public function yar_request()
    {
        if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
            $service = new Yar_Client('http://ci.com/base/apitest');
        }else{
            $service = new Yar_Client('http://129.com/CI_YAR/apitest');
        }

        $result = $service->test1();
        $this->cache->memcached->save('foo', $result);
        var_dump($this->cache->memcached->getServerByKey('foo'));
//        echo $this->cache->memcached->get('foo');
//        $this->cache->memcached->delete('foo');
//        $result = $service->test1('测试', 1024, array('a'=>1,'b'=>2));
        print_r(json_decode($result));
    }
}