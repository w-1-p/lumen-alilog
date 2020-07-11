<?php

namespace Wangyipinglove\LumenAliLog\Logging;

use Monolog\Handler\BufferHandler;
use Monolog\Logger;

class SLSFormatter
{
    /**
     * @param $logger
     * @param int $bufferLimit
     * @param int $level
     * @param bool $bubble
     * @param bool $flushOnOverflow
     */
    public function __invoke($logger, $bufferLimit = 0, $level = Logger::DEBUG, $bubble = true, $flushOnOverflow = false)
    {
        $slsLog = app('sls');
        $handler = new SLSLogHandler($slsLog, config('sls.log_store'));
        $handler->setFormatter(new SLSLogContentFormatter());
        $logger->pushHandler(new BufferHandler($handler, $bufferLimit, $level, (bool) $bubble, (bool) $flushOnOverflow));
    }
}
