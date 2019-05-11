<?php
namespace encryptorcode\server\request;

class Request{
    private $method;
    private $path;
    private $params;
    private $headers;
    private $cookies;
    
    private function __construct(){
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->path = $_SERVER["REQUEST_URI"];
        $this->params = $_GET;
        $this->headers = array_change_key_case(getallheaders(),CASE_UPPER);
        $this->cookies = $_COOKIE;
    }

    private static $request;
    private static function request() : Request{
        if(!isset(self::$request)){
            self::$request = new self();
        }
        return self::$request;
    }

    public static function method() : string{
        return self::request()->method;
    }

    public static function path() : string{
        return self::request()->path;
    }

    public static function params() : array{
        return self::request()->params;
    }

    public static function param($key) : ?string{
        $params = self::request()->params;
        if(isset($params[$key])){
            return $params[$key];
        } else {
            return null;
        }
    }

    public static function headers() : array{
        return self::request()->headers;
    }

    public static function header($key) : ?string{
        $headers = self::request()->headers;
        if(isset($headers[$key])){
            return $headers[$key];
        } else {
            return null;
        }
    }

    public static function cookies() : array{
        return self::request()->cookies;
    }

    public static function cookie($key) : ?string{
        $cookies = self::request()->cookies;
        if(isset($cookies[$key])){
            return $cookies[$key];
        } else {
            return null;
        }
    }
}