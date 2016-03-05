<?php
use libraries\beanstalk\Client;
use iface\base\controller;
/**
 * 消息队列测试
 * User: chiang
 * Date: 16-2-29
 * Time: 下午11:24
 */
class messagelist extends MY_controller implements controller
{
    protected $msg_list;    //beanstalk对象

    public function __construct()
    {
        parent::__construct();
        $this->msg_list = new Client(array(
            'persistent' => false,  //是否长连接
            'host' => '127.0.0.1',  //服务器ip
            'port' => 11300,        //端口号默认11300
            'timeout' => 3          //连接超时时间
        ));
        //connect
        $this->__connect();
    }

    /**
     * 连接beanstalk服务器
     */
    private function __connect()
    {
        $result = $this->msg_list->connect();
        if($result !== true) {
            exit('beanstalk connect error!');
        }
        //使用test tube（一个有名字的任务队列）
        $this->msg_list->useTube('test');
        $put = $this->msg_list->put(
            1024,           //任务优先级，默认1024，数值越小优先级越高0~2^32
            0,              //不等待，直接放入ready中，供消费者读取
            60,             //任务执行时间
            'hello word'    //任务内容
        );
        if(!is_numeric($put)) {
            exit('任务发布失败');
        }
        echo $put;
        $this->msg_list->disconnect();
    }
}