<?php
    namespace App\Repositories;

use App\Model\Product;
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

                $client = new Client();
                $crawler = $client->request('GET',$url);
                $crawler->filter($element)->each(function(Crawler $node,$result) use ($credential){
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