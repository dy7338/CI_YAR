<?php
/**
 * 测试服务类
 * User: chiang
 * Date: 16-2-25
 * Time: 上午12:28
 */

namespace service\base;

use iface\base\iface_service;
use libraries\help\json;

class service implements iface_service
{
    public function test()
    {
        // TODO: Implement test() method.
        return json::json_response(array('service ok!'));
    }
}