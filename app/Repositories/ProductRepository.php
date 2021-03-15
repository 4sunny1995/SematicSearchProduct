<?php
    namespace App\Repositories;

    use App\Model\Product;
use App\ProductTag;
use Exception;
    use Illuminate\Support\Facades\Log;
    class ProductRepository
    {
        private $result = [];
        public function getProducts(array $tags)
        {
            // dd($tags);
            try
            {
                for($i=0;$i<count($tags);$i++)
                {
                    $products = ProductTag::with('product')->where('tag',$tags[$i]['tag'])->get()->each(function($product){
                        array_push($this ->result,$product['product']->toArray());
                    });  
                }
                return $this->result;
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
                return [];
            }
        }
    }
