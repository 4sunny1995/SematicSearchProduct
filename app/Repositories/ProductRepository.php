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
    public function getAll()
    {
        try
        {
            $items = Product::all();
            if($items)
            {
                return
                [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$items
                ];
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function store(array $data)
    {
        try
        {
            $data = Product::create($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Product::with('user')->findOrFail($data->id)
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function update(array $data,$id)
    {
        try
        {
            $item = Product::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Product::with('user')->findOrFail($id)
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function destroy($id)
    {
        try
        {
            $data = Product::findOrfail($id)->delete();
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$data
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function show($id)
    {
        try
        {
            $data = Product::findOrfail($id);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$data
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }

}
