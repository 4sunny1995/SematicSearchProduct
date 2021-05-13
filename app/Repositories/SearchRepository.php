<?php
    namespace App\Repositories;

use App\Model\Broader;
use App\Model\History;
use App\Model\Jargon;
use App\Model\Narrower;
use App\Model\Synonymous;
use App\Tag;
use Exception;
use Illuminate\Support\Facades\Log;

class SearchRepository
    {
        private $result = [];
        private $bro = [];
        private $nar = [];
        // public function search($key)
        // {
        //     $result = $this -> generation($key);

        //     return $result;
        // }
        public function generation($key)
        {
            //replace ký tự + dấu câu
            $rep = [',','.','!','?','//','@','$','%','^','#','*'];
            $refer = str_replace($rep,'', $key);
            //tách chuỗi
            $items = explode(' ',$refer);
            //generation string
            for($i = 0 ;$i<count($items)-1;$i++)
            {
                $word = $items[$i];
                $temp = $this->findReferences($word);
                
                if($temp){
                    // dd($temp,$this->result);
                    for($in=0;$in<count($temp);$in++){
                        array_push($this->result,$temp[$i]);
                    }
                }
                for($j=$i+1;$j<count($items);$j++)
                {
                    // var_dump($word);
                    $word = $word." ".$items[$j];
                    // var_dump($word);
                    $temp = $this->findReferences($word);
                    if($temp){
                        for($in=0;$in<count($temp);$in++){
                            array_push($this->result,$temp[$in]);
                            // var_dump($temp[$in],$word,"---2---");
                        }
                    }
                }
            }
            $this->getSemantic($this->result);
            dd($this->result);
            $result = $this->result;
            return $result;
            
        }
        public function getBroaders($word)
        {
            $result = [];
            $broaders = Broader::where('root',$word)->get()->toArray();
            if($broaders)
            {
                for($index = 0 ;$index < count($broaders);$index++)
                {
                    array_push($result,$broaders[$index]);
                }
            }
            return $result;
        }
        public function getNarrowers($word)
        {
            $result = [];
            $narrowers = Narrower::where('root',$word)->get()->toArray();
            for($index = 0 ;$index < count($narrowers);$index++)
            {
                array_push($result,$narrowers[$index]);
            }
            return $result;
        }
        //Tìm từ tham chiếu
        public function findReferences($word)
        {
            try
            {
                $result = [];
                $broaders = $this->getBroaders($word);
                $narrowers = $this->getNarrowers($word);
                if($broaders)
                {
                    for($i=0;$i<count($broaders);$i++){
                        array_push($result,$broaders[$i]['refer']);
                    }
                    
                }
                if($narrowers)
                {
                    for($i=0;$i<count($narrowers);$i++){
                        array_push($result,$narrowers[$i]['refer']);
                    }
                    // dd($result);
                }
                
                // var_dump($this->result,$this->bro,$this->nar);
                return $result;
            }
            catch(Exception $e)
            {
                dd($e->getMessage());
                return [];
            }
        }
        public function mergeWord(array $from,array $to)
        {
            // dd($from);
            for($i=0;$i<count($from);$i++){
                array_push($to,$from[$i]['refer']);
            }
            return $to;
        }
        public function updateOrCreateKey(array $key_word)
        {
            
            try
            {
                for($i=0;$i<count($key_word);$i++){
                    $history = History::where('key_word',$key_word[$i])->first();
                    if($history){
                        $history->times = $history->times +1;
                        
                    }
                    else {
                        $history=new History();
                        $history->key_word = $key_word[$i];
                        $history ->times = 1;
                    }
                    $history->save();
                }
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
                return null;
            }
        }
        public function sortTag(array $body)
        {
            try
            {
                $result = [];
                $tags = Tag::orderBy('times', 'DESC')->get()->toArray();
                
                $i = 0;
                $j=0;
                //Sắp xếp tuần tự
                for($i=0;$i<count($tags);$i++){
                    for($j=0;$j<count($body);$j++){
                        $tagname = strtolower($tags[$i]['tag']);
                        $tagkey = strtolower($body[$j]);
                        if($tagname==$tagkey){
                            array_push($result,$tags[$i]);
                            break;
                        }
                    }
                }
                // dd($result);
                // if(count($body)==count($result))
                return $result;

            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
                return $body;
            }
        }
        public function updateOrCreateTag(array $body)
        {
            try
            {
                for($i=0;$i<count($body);$i++)
                {
                    $tag = Tag::where('tag',$body[$i])->first();
                    if($tag){
                        $tag->times = $tag->times + 1;
                        $tag->save();
                    }
                    else {
                        Tag::create(['tag' => $body[$i]]);
                    }
                }
                
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
            }
        }
        public function getSynonymous(array $items)
        {
            foreach($items as $item)
            {
                $words = Synonymous::where('root',$item)->get()->each(function($word){
                    array_push($this->result,$word['refer']);
                });
            }
        }
        public function getJargon(array $items)
        {
            foreach($items as $item)
            {
                $words = Jargon::where('root',$item)->get()->each(function($word){
                    array_push($this->result,$word['refer']);
                });
            }
        }
        public function getSemantic(array $items)
        {
            $this->getSynonymous($items);
            $this->getJargon($items);
        }
    }