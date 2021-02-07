<?php
namespace App\Console\Commands;

use Symfony\Component\Process\Process;

class DuskCommand extends \Laravel\Dusk\Console\DuskCommand {

    public function handle() {
        $xvfb = (new Process(['/usr/bin/Xvfb', '-ac', ':0', '-screen', '0', '1280x1024x16']))
                ->setTimeout(null);

        $xvfb->start();

        try {
            parent::handle();
        } finally {
            $xvfb->stop();
        }

        return;
    }
}
