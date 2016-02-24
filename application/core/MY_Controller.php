<?php

/**
 * Created by PhpStorm.
 * User: chiang
 * Date: 16-2-24
 * Time: 下午2:58
 */
class MY_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 如果呼叫控制器,不是控制器内具体方法的话,避免404错误.
     * 呼叫具体方法不会出现404问题
     */
    public function index()
    {
    }

    /**
     * json数据封装
     * @param array $data           //打包的目标数据
     * @param string $code          //响应状态码
     * @param string $message       //响应信息
     * @return string $json_string  //返回json string
     */
    public function json_response(array $data = [], $code = '200', $message = 'success') : string
    {
        $result = new stdClass();
        if(empty($data)) {
            $result->code = $code;
            $result->message = $message;
            $result->data = new stdClass();
        }else{

            $result->code = $code;
            $result->message = $message;
            //打包data
            $result->data = $this->pack_data($data);
        }
        return json_encode($result);
    }

    /**
     * 递归打包json数据
     * @param array $data           //打包的目标数组
     * @return object $data_pack    //返回object
     */
    private function pack_data(array $data)
    {
        $data_pack = new stdClass();
        foreach($data as $key => $value) {
            //打包数据,如果value为数组,递归
            $data_pack->$key = is_array($value) ? $this->pack_data($value) : $value;
        }
        return $data_pack;
    }
}