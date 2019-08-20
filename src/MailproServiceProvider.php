<?php

namespace Landrok\Mailpro;

use Landrok\Mailpro;
use Landrok\Mailpro\Transport\MailproAddedTransportManager;
use Illuminate\Mail\MailServiceProvider;
use Illuminate\Support\ServiceProvider;

class MailproServiceProvider.php extends MailServiceProvider
{

	public function boot()
    {
        $this->publishes([
            __DIR__.'/config/mailpro.php' => config_path('mailpro.php')
        ], 'mailproconfig');
    }

	protected function registerSwiftTransport()
    {
        $this->app->singleton('swift.transport', function ($app) {
            return new MailproAddedTransportManager($app);
        });
    }
}
