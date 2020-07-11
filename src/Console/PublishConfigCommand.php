<?php

namespace Wangyipinglove\LumenAliLog\Console;

use Illuminate\Console\Command;
use Wangyipinglove\LumenAliLog\Console\Helpers\Publisher;

class PublishConfigCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lumen-sls:publish-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish config';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        echo 'publish config files ';
        $this->info('Initialization config...');

        (new Publisher($this))->publishFile(
            realpath(__DIR__.'/../../config/').'/sls.php',
            base_path('config'),
            'sls.php'
        );
    }
}
