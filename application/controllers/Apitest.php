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
        echo 'hello';
    }
    public function aa() {
        echo 11;
    }
}
