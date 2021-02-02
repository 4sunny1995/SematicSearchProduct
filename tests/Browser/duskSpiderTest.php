<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class duskSpiderTest extends DuskTestCase
{

    public function __construct($domain,$startURL)
    {
        $this->domain = $domain;
        $this->startURL = $startURL;
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
    
}
