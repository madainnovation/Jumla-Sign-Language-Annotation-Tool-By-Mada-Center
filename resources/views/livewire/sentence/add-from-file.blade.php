@section("sentence",true)
@section("jsContent")
    <script src="{{asset("js/run_prettify.js")}}"></script>
@endsection
<div x-data>
    <livewire:component.flash-messages/>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="row pl-4">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" wire:model="file"
                                           name="file">
                                    <label class="custom-file-label" for="customFile" id="filename" wire:ignore>Data File</label>
                                    <button class="btn btn-dark" style="float: right;background-color: #0a568c"
                                            wire:click="loadFile">Load
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(is_array($data))
                        <div class="row pl-4">
                            <div class="col-md-10">
                                <table class="table table-bordered table-hover table-striped table-md mt-4" id="website_table">
                                        <tr class="thead-light">
                                            <th>
                                            </th>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Sentence</th>
                                        </tr>
                                    @foreach($data as $key=>$s)
                                        @if(count($s)>2)
                                            <tr>
                                                <td>
                                                    <input name="selectedSentences[]" value="{{$key}}" wire:model="selectedSentences" type="checkbox" class="form-check cb-s" checked >
                                                </td>
                                                <td>{{$key+1}}</td>
                                                <td>{{$s[0]}}</td>
                                                <td>{{$s[1]}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary" wire:click="save" wire:loading.attr="disabled">Save</button>
            </div>
        </div>
    </div>

    <script>
        $("#customFile").on("change", function () {
            $("#filename").html($("#customFile").val().split('\\').pop());
        });

        $(document).on("change",".check-all",function (){
            $(".cb-s").each(function (){
               $(this).get(0).checked=$(".check-all").get(0).checked;
            });
        });
        $(document).on("change",".cb-s",function (){})

    </script>
</div>
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-grip-horizontal"></i>Dashboard</a></li>
    <li class="breadcrumb-item"><a href="">Sentence</a></li>
    <li class="breadcrumb-item"><a>Add Sentence By File</a></li>
@endsection
@section("header")
    <div style="width: 100%;">
        <h1>Add Sentence By File</h1>
    </div>

@endsection
