<?php
/**
 * json数据封装.
 * User: chiang
 * Date: 16-2-25
 * Time: 上午9:35
 */

namespace libraries\help;


class json
{
    /**
     * 打包API返回json数据
     *
     *   stdClass Object
     *   (
     *       [code] => 200
     *       [message] => success
     *       [data] => stdClass Object
     *       (
     *           [param1] => 测试参数
     *           [param2] => 1234
     *           [param3] => stdClass Object
     *           (
     *               [0] => 1
     *               [1] => 2
     *               [2] => 3
     *           )
     *       )
     *   )
     *
     * @param array $data           //打包的目标数据
     * @param string $code          //响应状态码
     * @param string $message       //响应信息
     * @return string $json_string  //返回json string
     */
    public static function json_response(array $data = [], $code = '200', $message = 'success') : string
    {
        $result = [];
        if(empty($data)) {
            $result['code'] = $code;
            $result['message'] = $message;
            $result['data'] = [];
        }else{

            $result['code'] = $code;
            $result['message'] = $message;
            //打包data
            $result['data'] = self::pack_data($data);
        }
        return json_encode($result);
    }

    /**
     * 递归打包json数据
     * @param array $data           //打包的目标数组
     * @return array $data_pack    //返回array
     */
    private static function pack_data(array $data) : array
    {
        $data_pack = [];
        foreach($data as $key => $value) {
            //打包数据,如果value为数组,递归
            $data_pack[$key] = is_array($value) ? self::pack_data($value) : $value;
        }
        return $data_pack;
    }
}
