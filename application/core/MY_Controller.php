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
    public function index($aa = null)
    {
        return $aa;
    }
}