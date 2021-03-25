<?php
namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Log;

class CreditRepository
{
    public function getAll()
    {
        try
        {

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

        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function getDataById($id)
    {
        try
        {

        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
}