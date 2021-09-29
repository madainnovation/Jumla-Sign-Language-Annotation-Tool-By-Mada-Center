<?php


namespace App\Infrastructure\Traits;


use App\Infrastructure\Interfaces\ValidationInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait ValidationTraits
{
    protected $error;
    protected $validator;
    protected $rules=[];
    protected $msg=[];

    public function exceptRule(array $keys)
    {
        if($this instanceof ValidationInterface){
            $this->fillRulesArrayIfEmpty();
            $this->rules=Arr::except($this->rules,$keys);
        }
    }

    private function fillRulesArray(){
        if($this instanceof ValidationInterface){
            $this->rules=$this->getValidationRule();
            $this->msg=$this->getValidationMessage();
        }
    }

    private function fillRulesArrayIfEmpty()
    {
        if($this instanceof ValidationInterface){
            if(count($this->rules)<=0){
                $this->fillRulesArray();
            }
        }
    }

    public function validate()
    {
        if($this instanceof ValidationInterface){
            $this->fillRulesArrayIfEmpty();
            $validator=Validator::make($this->toArray(),$this->rules,$this->msg);
            if($validator->fails()){
                $this->validator=$validator->errors();
                $this->error=true;
                return false;
            }
            return true;
        }
    }
}
