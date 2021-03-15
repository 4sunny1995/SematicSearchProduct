<?php
    namespace App\Repositories;

use App\Model\Product;
use App\Page;
use App\ProductTag;
use App\Tag;
use Exception;
    use Illuminate\Support\Facades\Log;
    use Tests\Browser\duskSpiderURL;
    use Goutte\Client;
    use Symfony\Component\DomCrawler\Crawler;


class SpiderRepository
    {
        private $result = [];
        public function crawlerFrom(array $body)
        {
            $bot = new duskSpiderURL($body);
            $result = $bot ->spiderAndCredentinal();
        }
        public function crawlerByGoutte(array $body)
        {
            $credential = $body;
            try
            {
                $element = $credential['listProduct'];
                // $result = [];
                $url = $credential['url'];
                // $pages = Page::where('url',$url)->first();
                // if(!$pages)Page::create();
                Page::updateOrCreate(
                    ['url' => $url,'isCrawled'=>true],
                    ['title'=>$credential['hasTag']]
                );
                $client = new Client();
                $crawler = $client->request('GET',$url);
                $crawler->filter($element)->each(function(Crawler $node) use ($credential){
                   
                    $domain = $credential['domain'];
                    $name = $node ->filter($credential['nameProduct'])->text();
                    $price = $node ->filter($credential['priceProduct'])->text();
                    $image = $node ->filter($credential['imageProduct'])->attr("src");
                    $hasTag = $credential['hasTag'];
                    $price = preg_replace('/\D/', '', $price);
                    $product = Product::updateOrCreate(
                        ['name' => $name],
                        [
                            'price' => $price,
                            'image' =>$image,
                            'hasTag'=>$hasTag?$hasTag:"no tag",
                            'url'=>$domain
                        ]
                    );
                    $tag= Tag::updateOrCreate(
                        ['tag' => $hasTag],
                        []
                    );
                    $product_tag = ProductTag::where('product_id',$product->id)->where('tag',$tag['tag'])->first();
                    if(!$product_tag)ProductTag::create(['product_id' => $product->id,'tag'=>$tag['tag']]);
                    array_push($this->result,$product);
                });
                return $this->result;
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
            }
        }
    }