<?php

namespace Tests\Browser;

use App\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class duskSpiderURL extends DuskTestCase
{
    public function __construct(array $credentinal)
    {
        $this->credentinal = $credentinal;
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')
    //                 ->assertSee('Laravel');
    //     });
    // }
    public function spiderAndCredentinal(){
        $this->getDataFromURL();
    }

    public function getDataFromURL(){
        $url = $this->credentinal['url'];
        $page = Page::updateOrCreate(
            ['url' => $url, 'isCrawled' => true],
            ['isCrawled' => false]
        );
        // dd($page);
        $this->browse(function (Browser $browser) use ($page){
            $this ->processPageURL($browser,$page);
        });
    }
    public function processPageURL(Browser $browser,$page)
    {
        $url = $page->url;
        dd($url);
    }
}
