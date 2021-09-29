@section("sentence",true)
@section("jsContent")
    <script src="{{asset("js/run_prettify.js")}}"></script>
@endsection
<div x-data>
    <livewire:component.flash-messages/>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="original">Code: </label>
                        <input type="text" class="form-control @error('model.code') is-invalid @enderror" wire:model="model.code">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-{{$action=='Edit'?'5':'9'}}">
                    <div class="form-group">
                        <label for="original">Original: </label>
                        <textarea class="form-control @error('model.original') is-invalid @enderror" id="original"
                                  name="original" cols="50" placeholder="Original Sentence"
                                  wire:model="model.original"></textarea>
                        @error('model.original')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                </div>
                @if($action=="Edit")
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="original">JSON: </label><p></p>
                            <code class="prettyprint">{{$model->json}}</code>
                            @error('model.original')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="original">Status: </label>
                        <select class="form-control" wire:model="model.status">
                            <option value="Not Annotated">Not Annotated</option>
                            <option value="Annotated">Annotated</option>
                            <option value="Annotation Approved">Annotation Approved</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="video">Left Side View: </label>
                        <livewire:component.file-selector  :key="'left_side_view'" name="left_side_view"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="video">Front View: </label>
                        <livewire:component.file-selector  :key="'front_view'" name="front_view"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="video">right View: </label>
                        <livewire:component.file-selector  :key="'right_view'" name="right_view"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="video">Facial View: </label>
                        <livewire:component.file-selector  :key="'facial_view'" name="facial_view"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <button class="btn btn-primary" wire:click="save" wire:loading.attr="disabled">Save</button>
    </div>
</div>
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-grip-horizontal"></i>Dashboard</a></li>
    <li class="breadcrumb-item"><a href="">Sentence</a></li>
    <li class="breadcrumb-item"><a>{{$action}} Sentence</a></li>
@endsection
@section("header")
    <div style="width: 100%;">
        <h1>{{$action}} Sentence</h1>
    </div>

@endsection
