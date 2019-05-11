<?php
namespace encryptorcode\server\response;

class RedirectResponse extends Response{
    
    private $redirectUrl;

    public function __construct(?string $redirectUrl){
        $this->redirectUrl = $redirectUrl;
    }

    public function respond() : void{
        header("Location: $this->redirectUrl");
        exit();
    }
}