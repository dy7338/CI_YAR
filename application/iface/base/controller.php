<?php
/**
 * controller基类接口定义
 * User: chiang
 * Date: 16-2-24
 * Time: 下午11:35
 */

namespace iface\base;


interface Controller
{
    /**
     * MY_Controller constructor.
     * 控制器基类所有控制器必须实现该接口
     */
    public function __construct();
}