<?php
use iface\base\Controller;
use service\base\service;
/**
 * 测试api控制器.
 * User: chiang
 * Date: 16-2-24
 * Time: 上午10:48
 */
class ApiTest extends MY_Controller implements Controller
{
    /**
     * 测试 return json
     * @param mixed
     * @return mixed
     */
    public function test1($str, $int, $arr)
    {
        $array = array(
            'param1' => $str,
            'param2' => $int,
            'param3' => $arr
        );
        return $this->json_response($array);
    }

    /**
     * 测试 service interface
     * @param mixed
     * @return mixed
     */
    public function test2()
    {
        $service = new service();
        return $service->test();
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
