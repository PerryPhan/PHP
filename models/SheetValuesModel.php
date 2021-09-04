<?php
/**
 * Model helps controlling Sheet
 * 
 * @created 03/09/2021 
 */
class SheetValuesModel{
    /**
     * @var $string
     */
    private $range;
    
    /**
     * @var array
     */
    private $values;

    /**
     * To String
     * @return string
     */
    public function toString(){
        $str = '';
        foreach( $this->values as $value){
            $str .= json_encode($value)."<br>";
        }
        return " range : $this->range "."<br>". 
               " values: "."<br>"
               .$str;
    }

    /**
     * Testing with many examples
     * @return void
     */
    public function testing(): void{
        $model = new SheetValuesModel();
        // #1 
        $model->setRange('A1:B1');
        $model->setValues([[
            'John Doe',
            'john@test.com',
        ],
        [
            'Jack Waugh',
            'jack@test.com',
        ]]);

        echo $model->toString();
    }

    /**
     * Set Range
     * @param string $range
     * @return void
     */
    public function setRange( $range ){
        $this->range = $range;
    }

    /**
     * Get Range
     * @return string
     */
    public function getRange(){
        return $this->range;
    }

    /**
     * Set Values
     * @param array $values
     * @return void
     */
    public function setValues( $values ){
        $this->values = $values;
    }

    /**
     * Get Values
     * @return array
     */
    public function getValues(){
        return $this->values;
    }
}

