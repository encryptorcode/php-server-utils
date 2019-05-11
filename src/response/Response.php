<?php
namespace encryptorcode\server\response;

abstract class Response{
    
    private $data;
    private $status;
    
    public function __construct(?string $data, $status=200){
        $this->data = $data;
        $this->status = $status;
        
        if((!isset($data) || $data == "") && ($status == 200 || $status == 201)){
            $this->status = 204;
        }
    }

    public function respond() : void{
        http_response_code($this->status);
        echo $this->data;
    }
}