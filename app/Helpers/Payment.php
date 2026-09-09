<?php
namespace App\Helpers;

class Payment {

    private $provider;
    private $request;

    public static function initial($request) 
    {
        return new Payment($request);
    }

    public function __construct($request) 
    {
        $this->request = $request;
    }

    public function pay() 
    {
        
    }

}