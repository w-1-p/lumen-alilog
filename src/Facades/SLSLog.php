<?php

namespace Wangyipinglove\LumenAliLog\Facades;

use Illuminate\Support\Facades\Facade;

class SLSLog extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'sls';
    }
}
