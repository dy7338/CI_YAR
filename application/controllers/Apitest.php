<?php

/**
 * Created by PhpStorm.
 * User: chiang
 * Date: 16-2-24
 * Time: 上午10:48
 */
class ApiTest extends MY_Controller
{
    /**
     * YAR service test API1
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
     * YAR service test API2
     * @param mixed
     * @return mixed
     */
    public function test2()
    {
        return $this->json_response($this->ip(func_get_args()));
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
