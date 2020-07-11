<?php
// +----------------------------------------------------------------------
// | Author: 王奕平 wyp <407213504@qq.com>. Date:2020/7/11 Time:16:39
// +----------------------------------------------------------------------

namespace Wangyipinglove\LumenAliLog\Console\Helpers;


class Helpers
{
    public static function array_get($array, $key, $default = null)
    {
        if (is_null($key)) {
            return $array;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return value($default);
            }

            $array = $array[$segment];
        }
        return $array;
    }
}
