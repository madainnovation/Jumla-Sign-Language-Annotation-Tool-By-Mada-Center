<div>
    <link rel="stylesheet" href="{{ asset('ControlPanel/assets/css/icons.css') }}">
    <div style="display: flex;flex-direction: row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#staticBackdrop_{{$name}}">
            Select One..
        </button>
        <span>{{$file_name}}</span>
    </div>

    <div class="modal fade" id="staticBackdrop_{{$name}}"  tabindex="-1" wire:ignore.self
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">files</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="height: 300px;overflow-y: scroll">
                        <button  type="button" wire:click="openDirectory('..')" style="border-color:#ffffff00;background-color: #ffffff00;display: grid;justify-content: start;padding: 5px;max-width: 75px;grid-row: 2;grid-template-columns: auto;text-align: center;height: 100px;">
                            <div
                                style="display: grid;justify-content: start;padding: 5px;max-width: 75px;grid-row: 2;grid-template-columns: auto;text-align: center;height: 100px;">
                                <img src="{{asset("images/folder.png")}}" width="100%">
                                <label style="max-width: 65px;font-size: 14px;">..</label>
                            </div>
                        </button>
                        @foreach($directories as $key=>$value)
                            <button  type="button" wire:click="openDirectory('{{$value}}')" style="border-color:#ffffff00;background-color: #ffffff00;display: grid;justify-content: start;padding: 5px;max-width: 75px;grid-row: 2;grid-template-columns: auto;text-align: center;height: 100px;">
                                <div
                                    style="display: grid;justify-content: start;padding: 5px;max-width: 75px;grid-row: 2;grid-template-columns: auto;text-align: center;height: 100px;">
                                    <img src="{{asset("images/folder.png")}}" width="100%">
                                    <label style="max-width: 65px;font-size: 14px;">{{$value}}</label>
                                </div>
                            </button>
                        @endforeach


                        @foreach($files as $key=>$value)
                                <button data-dismiss="modal"  type="button" wire:click="selectFile('{{$value}}')" style="border-color:#ffffff00;background-color: #ffffff00;display: grid;justify-content: start;padding: 5px;max-width: 75px;grid-row: 2;grid-template-columns: auto;text-align: center;height: 100px;">
                                    <div
                                        style="display: grid;justify-content: start;padding: 5px;max-width: 75px;grid-row: 2;grid-template-columns: auto;text-align: center;height: 100px;">
                                        <div class="fi fi-doc">
                                            <div class="fi-content">{{explode(".",$value)[count(explode(".",$value))-1]}}</div>
                                        </div>
                                        <label style="max-width: 65px;font-size: 14px;">{{$value}}</label>
                                    </div>
                                </button>
                        @endforeach

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
</div>

