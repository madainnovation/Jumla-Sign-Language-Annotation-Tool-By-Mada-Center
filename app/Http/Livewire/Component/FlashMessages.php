<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class FlashMessages extends Component
{
    protected $listeners = [
        'toast' => 'setToast',
        'toast-success' => 'setToastSuccess',
        "toast-error"=>"setToastError",
        "toast-info"=>"setToastInfo"
    ];

    public function setToast ($message, $title,$type,$route="")
    {
        $this->dispatchBrowserEvent('toast-message-show',
            [
                "message"=>$message,
                "title"=>$title,
                "type"=>$type,
                "route"=>$route
            ]
        );
    }

    public function setToastSuccess($message,$route="")
    {
        $this->dispatchBrowserEvent('toast-message-show',
            [
                "message"=>$message,
                "title"=>"Success",
                "type"=>"success",
                "route"=>$route
            ]
        );
    }
    public function setToastError($message,$route="")
    {
        $this->dispatchBrowserEvent('toast-message-show',
            [
                "message"=>$message,
                "title"=>"Error",
                "type"=>"error",
                "route"=>$route
            ]
        );
    }
    public function setToastInfo($message,$route="")
    {
        $this->dispatchBrowserEvent('toast-message-show',
            [
                "message"=>$message,
                "title"=>"Info",
                "type"=>"info",
                "route"=>$route
            ]
        );
    }

    public function render()
    {
        return view('livewire.component.flash-messages');
    }
}
