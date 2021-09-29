<?php

namespace App\Http\Livewire\Forms;

use App\Models\FormItem;
use App\Models\Parameter;
use App\Models\ParameterForm;
use Livewire\Component;

class FormsForm extends Component
{
    public $action="Create";
    public Parameter $model;
    public $parameter_forms=[];
    public ParameterForm $parameterForm_model;
    public FormItem $formItem_model;
    public $saveItemToParameterId="";
    protected $listeners=[
        "deleteParameter"=>"deleteParameter",
        "deleteItem"=>"deleteItem",
        ];
    protected $rules=[
        "model.name"=>"required",
        "model.label"=>"required",
        "model.type"=>"required",
        "parameterForm_model.name"=>"",
        "parameterForm_model.label"=>"",
        "parameterForm_model.type"=>"",
        "formItem_model.label"=>"",
        "formItem_model.value"=>"",
    ];
    public function render()
    {
        return view('livewire.forms.forms-form')->layout("ControlPanel.layouts.app");
    }
    public function mount($id="")
    {
        if($id!=""){
            $this->action="Edit";
            $this->model=Parameter::find($id);
            $this->parameter_forms=$this->model->parameter_forms;
        }else{
            $this->model=new Parameter();
            $this->model->type="main";
        }
        $this->parameterForm_model=new ParameterForm();
        $this->formItem_model=new FormItem();
    }

    private function refreshData()
    {
        $this->model=Parameter::find($this->model->id);
        $this->parameter_forms=$this->model->parameter_forms;
        $this->parameterForm_model=new ParameterForm();
        $this->formItem_model=new FormItem();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function load_parameter($id)
    {
        $this->parameterForm_model=ParameterForm::find($id);
    }

    public function load_item($id)
    {
        $this->formItem_model=FormItem::find($id);
    }

    public function save()
    {

        $this->validate();
        $this->model->save();
        $this->action="Edit";
    }

    public function saveItem()
    {
        $validatedData = $this->validate([
            "formItem_model.value"=>"required|max:255",
            "formItem_model.label"=>"required|max:255",
        ]);
        if(is_null($this->formItem_model->parameter_form_id)){
            $this->formItem_model->parameter_form_id=$this->saveItemToParameterId;
        }
        $this->formItem_model->save();
        $this->refreshData();
    }

    public function load_new_item($id)
    {
        $this->formItem_model->parameter_form_id=$id;
        $this->saveItemToParameterId=$id;
    }

    public function confirmDeleteItem($id)
    {
        $tempModel=FormItem::find($id);
        $this->emit("confirm-box","deleteItem",$id,"Are you sure you want delete ".$tempModel->label,"Are you Sure!");
    }

    public function deleteItem($id)
    {
        $tempModel=FormItem::find($id);
        $tempModel->delete();
        $this->refreshData();
    }

    public function saveParameterFrom()
    {

        $validatedData = $this->validate([
            "parameterForm_model.name"=>"required|max:255",
            "parameterForm_model.label"=>"required|max:255",
            "parameterForm_model.type"=>"required|max:255",
        ]);
        $old_parameter=ParameterForm::find($this->parameterForm_model->id);
        if(!is_null($old_parameter)) {
            if ($old_parameter->type == "select" && $this->parameterForm_model->type == "text") {
                $this->parameterForm_model->form_items()->delete();
            }
        }
        $this->parameterForm_model->fill($validatedData);
        $this->parameterForm_model->parameter_id=$this->model->id;
        $this->parameterForm_model->save();
        $this->refreshData();
    }

    public function load_new_parameter()
    {
        $this->parameterForm_model=new ParameterForm();
        $this->parameterForm_model->type="text";
    }
    public function confirmDelete($id){
        $tempModel=ParameterForm::find($id);
        $this->emit("confirm-box","deleteParameter",$id,"Are you sure you want delete ".$tempModel->name,"Are you Sure!");
    }

    public function deleteParameter($id)
    {
        $tempModel=ParameterForm::find($id);
        $tempModel->delete();
        $this->refreshData();
    }

}
