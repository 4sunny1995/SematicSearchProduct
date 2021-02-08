<?php
    namespace App\Repositories;

use App\Model\Broader;
use App\Model\Narrower;

class SearchRepository
    {
        private $result = [];
        // public function search($key)
        // {
        //     $result = $this -> generation($key);

        //     return $result;
        // }
        public function generation($key)
        {
            //replace ký tự đặc biệt + dấu câu
            $refer = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s','', $key);
            //tách chuỗi
            $items = explode(' ',$refer);
            //generation string
            for($i = 0 ;$i<count($items)-1;$i++)
            {
                $word = $items[$i];
                $temp = $this->findReferences($word);
                if($temp)array_merge($this->result,$temp);
                for($j=$i+1;$j<count($items);$j++)
                {
                    $word = $word." ".$items[$j];
                    $temp = $this->findReferences($word);
                    if($temp)array_merge($this->result,$temp);
                }
            }
            $result = $this->result;
            return $result;
            
        }
        public function getBroaders($word)
        {
            $result = [];
            $broaders = Broader::where('root',$word)->get()->toArray();
            for($index = 0 ;$index < count($broaders);$index++)
            {
                array_push($result,$broaders[$index]);
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
        public function findReferences($word)
        {
            $result = [];
            $broaders = $this->getBroaders($word);
            $narrowers = $this->getNarrowers($word);
            if($broaders)
            {
                array_merge($result,$broaders);
            }
            if($narrowers)
            {
                array_merge($result,$narrowers);
            }
            return $result;
        }
    }