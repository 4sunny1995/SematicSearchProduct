<?php
    namespace App\Repositories;

use App\Model\Category;
use App\Model\CrawlerHistory;
use App\Model\Product;
use App\Page;
use App\ProductTag;
use App\Tag;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tests\Browser\duskSpiderURL;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;


class SpiderRepository
    {
        private $result = [];
        public function crawlerByGoutte(array $body)
        {
            $credential = $body;
            try
            {
                // dd($body);
                $check = CrawlerHistory::updateOrCreate(
                    [
                        'url' => $credential['url'],
                        'listProduct' => $credential['listProduct']
                    ],
                    [
                        'nameProduct' => $credential['nameProduct'],
                        'priceProduct' => $credential['priceProduct'],
                        'imageProduct' => $credential['imageProduct'],
                        'hasTag' => $credential['hasTag'],
                        'category' => $credential['category']
                    ]
                );
                if($check){
                    $element = $credential['listProduct'];
                    $url = $credential['url'];
                    $category = $credential['category'];
                    $category_id = $this->getCategoryId($category);
                    Page::updateOrCreate(
                        ['url' => $url,'isCrawled'=>true],
                        ['title'=>$credential['hasTag']]
                    );
                    $client = new Client();
                    $crawler = $client->request('GET',$url);
                    $crawler->filter($element)->each(function(Crawler $node) use ($credential,$category_id){
                       
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
                                'url'=>$domain,
                                'content'=>$name,
                                'category_id'=>$category_id
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
                    // dd($this->result);
                    return $this->result;    
                }
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
            }
        }
        public function getCategoryId($category)
        {
            $cate = Category::firstOrCreate(
                ['name' => $category], ['code' => strtoupper(Str::random(8))]
            );
            return $cate->id;
        }
        public function reSpiderAll()
        {
            try
            {
                dd(123);
                Log::info('----------ReSpider All---------------');
                $items = CrawlerHistory::all()->each(function($item){
                    $string = '------------------ReSpider '.$item['id'].'-----------------------------';
                    Log::info($string);
                    dd($item);
                    $this->crawlerByGoutte($item->toArray());
                });
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$items
                ];
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
            }
        }
        public function reSpiderItem(array $body)
        {
            $credential = $body;
            try
            {
                $string = '------------------ReSpider '.$credential['id'].'-----------------------------';
                Log::info($string);
                $this->crawlerByGoutte($credential);
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$body
                ];
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
            }
        }
    }