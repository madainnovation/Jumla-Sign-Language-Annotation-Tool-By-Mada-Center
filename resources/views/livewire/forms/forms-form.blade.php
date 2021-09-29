@section("cssContent")
    <style>
        .sub-table-header-color{
            background-color: #d9d9d9
        }
        .sub-table-color{
            background-color: #efefef;
        }
    </style>
@endsection
@section("sentence",true)
<div x-data>
    <livewire:component.flash-messages/>
    <livewire:component.display-conformation/>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="original">Name: </label>
                    <input type="text" class="form-control @error('model.name') is-invalid @enderror" wire:model="model.name">
                    @error('model.name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="original">Label: </label>
                    <input type="text" class="form-control @error('model.label') is-invalid @enderror" wire:model="model.label">
                    @error('model.label')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="original">Type: </label>
                    <select class="form-control" name="type" wire:model="model.type">
                        <option value="main">Main</option>
                        <option value="Secondary">Secondary</option>
                    </select>
                    @error('model.original')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                @if($action=="Edit")
                    <div class="col-md-6">
                        <button class="btn btn-primary float-right" wire:click="load_new_parameter" data-toggle="modal" data-target="#ParameterModal">Add new element</button>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="website_table">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Label</th>
                                <th>Type</th>
                                <th width="20%">Action</th>
                            </tr>
                            @foreach($parameter_forms as $key=> $parameter)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$parameter->name}}</td>
                                    <td>{{$parameter->label}}</td>
                                    <td>{{$parameter->type}}</td>
                                    <td>
                                        <div class="row m-auto" style="float: right">
                                            <div class="btn-group">
                                                <button class="btn btn-warning" wire:click="load_parameter({{$parameter->id}})" data-toggle="modal" data-target="#ParameterModal">Edit</button>
                                                <button class="btn btn-danger" wire:click="confirmDelete({{$parameter->id}})">Delete</button>
                                                @if($parameter->type=="select")
                                                    <button class="btn btn-primary" wire:click="load_new_item({{$parameter->id}})" data-toggle="modal" data-target="#itemModal">Add item</button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @if($parameter->type=="select" && count($parameter->form_items??[])>0)
                                    <tr>
                                        <th></th>
                                        <th class="sub-table-header-color">#</th>
                                        <th class="sub-table-header-color">Label</th>
                                        <th class="sub-table-header-color">value</th>
                                        <th class="sub-table-header-color">Action</th>
                                    </tr>
                                    @foreach($parameter->form_items as $sub_key=>$item)
                                        <tr>
                                            <td></td>
                                            <td class="sub-table-color">{{$key.".".$sub_key}}</td>
                                            <td class="sub-table-color">{{$item->label}}</td>
                                            <td class="sub-table-color">{{$item->value}}</td>
                                            <td class="sub-table-color">
                                                <div class="btn-group">
                                                    <button class="btn btn-warning" wire:click="load_item({{$item->id}})" data-toggle="modal" data-target="#itemModal">Edit</button>
                                                    <button class="btn btn-danger" wire:click="confirmDeleteItem({{$item->id}})">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary" wire:click="save" wire:loading.attr="disabled">Save</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="original">Label: </label>
                            <input type="text" class="form-control @error('formItem_model.label') is-invalid @enderror" wire:model="formItem_model.label">
                            @error('formItem_model.label')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="original">Value: </label>
                            <input type="text" class="form-control @error('formItem_model.value') is-invalid @enderror" wire:model="formItem_model.value">
                            @error('formItem_model.value')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveItem" data-dismiss="modal" >Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ParameterModal" tabindex="-1" role="dialog" aria-labelledby="ParameterModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="original">Name: </label>
                            <input type="text" class="form-control @error('parameterForm_model.name') is-invalid @enderror" wire:model="parameterForm_model.name">
                            @error('parameterForm_model.name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="original">Label: </label>
                        <input type="text" class="form-control @error('parameterForm_model.label') is-invalid @enderror" wire:model="parameterForm_model.label">
                        @error('parameterForm_model.label')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                        <div class="col-md-6 form-group">
                            <label for="original">Type: </label>
                            <select class="form-control " wire:model="parameterForm_model.type">
                                <option value="text">Text</option>
                                <option value="select">Select</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveParameterFrom" data-dismiss="modal" >Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section("breadcrumb")
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-grip-horizontal"></i>Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route("form.list")}}">Forms</a></li>
    <li class="breadcrumb-item"><a>{{$action}} Form</a></li>
@endsection
@section("header")
    <div style="width: 100%;">
        <h1>{{$action}} Form</h1>
    </div>

@endsection
