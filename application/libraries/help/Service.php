<?php
/**
 * YAR呼叫服务基类
 * User: shuke
 * Date: 16-2-1
 * Time: 下午3:59
 */
namespace libraries\help;
class Service
{
    private static $_instance = array();      //服务实例
    /**
     * 单列呼叫服务
     * @param 呼叫地址URL
     * @return object
     */
    public static function call($url = NULL) {

        if(empty($url)) {
            return NULL;
        }
        //地址转换
        $url = str_replace('-', '/', $url);
        //获取唯一实例
        if(!empty(self::$_instance[$url])) {
            return self::$_instance[$url]['service'];
        }
        //实例化远程服务

        self::$_instance[$url]['service'] = new Yar_Client(SERVICE_HOST_1 . $url);
        return self::$_instance[$url]['service'];
    }

    /**
     * 并发呼叫
     * @param array 呼叫地址
     * @return object
     */
    public function call_service(array $url_ary = NULL, $package = FALSE) {

        $callback = 'callback';
        Yar_Concurrent_Client::call(SERVICE_HOST_1 . $uri, $method, $param, $callback, NULL, array(YAR_OPT_PACKAGER => "json"));
        Yar_Concurrent_Client::call(SERVICE_HOST_1 . $uri, $method, $param, $callback);
        //发送请求
        Yar_Concurrent_Client::loop('callback', 'error_callback');
    }
    
    /**
     * callback 
     * @return boolean
     */
    private function callback($retval, $callinfo) {
        return TRUE;
    }
    
    /**
     * error callback 
     * @return boolean
     */
    private function error_callback($type, $error, $callinfo) {
        return FALSE;
    }
}