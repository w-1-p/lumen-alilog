<?php
// +----------------------------------------------------------------------
// | Author: 王奕平 wyp <407213504@qq.com>. Date:2020/7/8 Time:18:04
// +----------------------------------------------------------------------

namespace Wangyipinglove\LumenAliLog;

use Illuminate\Support\ServiceProvider;
use Wangyipinglove\LumenAliLog\Console\PublishConfigCommand;
use Wangyipinglove\LumenAliLog\Console\Helpers\Helpers;
use Aliyun\SLS\Client;

class LumenSLSServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
    }


    /**
     * Add the connector to the queue drivers.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.lumen-sls.publish-config', function () {
            return new PublishConfigCommand();
        });
        $path = realpath(realpath(__DIR__.'/../config/').'/sls.php');
        $this->mergeConfigFrom($path, 'sls');
        $this->commands(
            'command.lumen-sls.publish-config'
        );

        $this->app->singleton('sls', function ($app) {
            $config = $app['config']['sls'];
            $accessKeyId = Helpers::array_get($config, 'access_key_id');
            $accessKeySecret = Helpers::array_get($config, 'access_key_secret');
            $endpoint = Helpers::array_get($config, 'endpoint');
            $project = Helpers::array_get($config, 'project');
            $store = Helpers::array_get($config, 'log_store');
            $topic = Helpers::array_get($config, 'topic');
//            $env = array_get($config, 'env');

            $client = new Client($endpoint, $accessKeyId, $accessKeySecret);

            $log = new SLSLogManager($client, $topic);
            $log->setProject($project);
            $log->setLogStore($store);
            return $log;
        });

        $config = $this->app['config']['sls'];

        $this->app->instance('sls.writer', new SLSLogWriter(app('sls'), $this->app['events'], $config['topic'], $config['env']));
    }
}
