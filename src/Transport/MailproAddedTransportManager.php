<?php

namespace Landrok\Mailpro\Transport;

use Illuminate\Mail\TransportManager;

class MailproAddedTransportManager extends TransportManager
{
	protected function createMailproDriver()
    {
        return new MailproTransport;
    }
}
