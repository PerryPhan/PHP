<?php

namespace App;

class Invoice
{
    protected array $data = [];
    private int $id = 1;
    private string $phone = '0978-834-911'; 
    
    public function __get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }
    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }


    public function __isset(string $name): bool
    {
        var_dump('isset');
        return array_key_exists($name, $this->data);
    }

    public function __unset(string $name): void
    {
        var_dump('unset');
        unset($this->data[$name]);
    }

    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)){
            call_user_func_array([$this, $name], $arguments);
            // $this->$name(...$arguments);
        }
    }

    public static function __callStatic(string $name, array $arguments)
    {
        var_dump('static');
        var_dump($name, $arguments);
    }

    protected function process( float $abc, string $def){
        var_dump('process', $abc, $def);
    }

    public function __toString(): string 
    {
        return 'hello';
    }

    public function __invoke()
    {
        var_dump('invoked');   
    }

    public function __debugInfo(): ?array
    {
        return [
            'id' => $this->id,
            'phone' => '****' . substr($this->phone, -4)
        ];
    }
}
