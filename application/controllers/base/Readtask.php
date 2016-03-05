<?php

use libraries\beanstalk\client;
use iface\base\controller;
/**
 * Created by PhpStorm.
 * User: chiang
 * Date: 16-3-5
 * Time: 下午9:01
 */
class Readtask extends MY_controller implements controller
{
    private $msg_list;

    public function __construct()
    {
        parent::__construct();
        //实例化beanstalk客户端
        $this->msg_list = new client(array(
            'persistent' => false,  //是否长连接
            'host' => '127.0.0.1',     //服务器ip
            'port' => 11300,       //端口号默认11300
            'timeout' => 3         //连接超时时间
        ));
        //连接beanstalk服务器
        $result = $this->msg_list->connect();
        if($result !== true) {
            exit('beanstalk connect error!');
        }
        $this->read_task();
    }

    /**
     * 读取beanstalk任务
     */
    private function read_task()
    {
        //set tube
        $this->msg_list->useTube('test');
        //listen test tube
        $this->msg_list->watch('test');
        //阻塞方式ready task
        while(true) {
            $task = $this->msg_list->reserve();
            //任务执行 or 分发
            $result = $this->msg_list->touch($task['body']);
            if($result) {
                //删除
            }else{
                //休眠
            }
        }
    }
}