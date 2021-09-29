<div>
    <livewire:component.flash-messages/>
    <div class="container-fluid" style="padding-bottom:30px;">
        <div class="row">
            <div class="col-8">
                <h1>Jumla Annotation Tool for Sign Language</h1>
            </div>

            <div class="col-2" style="padding-top:13px;">
                <a class="btn btn-block btn-sm btn-secondary" href="{{route("front.annotation.list")}}">LOAD</a>
            </div>

            <div class="col-2" style="padding-top:13px;">
                <button class="btn btn-block btn-sm btn-success" onclick="save()">SAVE</button>
            </div>
        </div>

        <div class="row" style="background-color: darkslateblue;color:white;font-weight:bold;">
            <div class="col-2 text-left">Original Sentence</div>
            <div class="col-2 text-center">LEFT SIDE VIEW</div>
            <div class="col-4 text-center">FRONT VIEW</div>
            <div class="col-2 text-center">RIGHT SIDE VIEW</div>
            <div class="col-2 text-center">FACIAL VIEW</div>
        </div>

        <div class="row" style="background-color: darkslateblue;">
            <div class="col-2">
                <textarea wire:model="model.original" id="sentence" style="min-height:150px;height:95%; text-align: center" class="form-control"></textarea>
            </div>
            <div class="col-2">
                <video width="100%" id="video-left" autofocus muted>
                    <source src="{{asset($model->getLeftSideVideoPath())}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-4">
                <video width="100%" id="video" autofocus muted>
                    <source src="{{asset($model->getfrontSideVideoPath())}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-2">
                <video width="100%" id="video-right" autofocus muted>
                    <source src="{{asset($model->getRightSideVideoPath())}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-2">
                <video width="100%" id="videofacial" autofocus muted>
                    <source src="{{asset($model->getFacialSideVideoPath())}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="row" style="background-color:#6f6f6f;padding-bottom:10px;padding-top:10px;">
            <div class="col-1 text-center">
                <button class="btn btn-block btn-sm btn-dark" data-toggle="modal" data-target="#modalJSON"
                        onclick="viewJSON();">JSON
                </button>
            </div>
            <div class="col-1 text-center">
                <button class="btn btn-block btn-sm btn-dark">Alignement</button>
            </div>
            <div class="col-2 text-center">
                <button class="btn btn-sm btn-light"><<</button>
                <button class="btn btn-sm btn-light">ADJUST</button>
                <button class="btn btn-sm btn-light">>></button>
            </div>
            <div class="col-4 text-center">
                <button class="btn btn-sm btn-primary" onclick="changecurrenttime(-0.100);">-100ms</button>
                <button class="btn btn-sm btn-primary" onclick="changecurrenttime(-0.010);">-10ms</button>
                <button id="buttonplay" class="btn btn-sm btn-primary" style="min-width:35px;">&#9658;</button>
                <button class="btn btn-sm btn-primary" onclick="changecurrenttime(0.010);">+10ms</button>
                <button class="btn btn-sm btn-primary" onclick="changecurrenttime(0.100);">+100ms</button>
            </div>
            <div class="col-2 text-center">
                <button class="btn btn-sm btn-light"><<</button>
                <button class="btn btn-sm btn-light">ADJUST</button>
                <button class="btn btn-sm btn-light">>></button>
            </div>
            <div class="col-2 text-center">
                <button class="btn btn-sm btn-light"><<</button>
                <button class="btn btn-sm btn-light">ADJUST</button>
                <button class="btn btn-sm btn-light">>></button>
            </div>
        </div>


        <div class="row">
            <div class="col-3">Timeline</div>
            <div class="col-8 border-gray" id="timeline">
                <span class="cursor"></span>
                <input type="range" style="width:100%;" value="0" step="0.001" max="100" min="0" id="range">
                <span class="startduration">0</span>
                <span class="totalduration"></span>
            </div>
            <div class="col-1"><input class="form-control" type="text" id="currenttimeinput" value="0"></div>
        </div>
        @foreach($parameters as $parameter)
            <div class="row" style="line-height:46px !important;" wire:ignore>
                <div class="col-2">{{$parameter->label}}</div>
                <div class="col-1" style="padding-top:7px;">
                    <button class="btn btn-sm {{$parameter->type=="main"?"btn-warning":"btn-info"}} btn-block btn_add"
                            data-toggle="modal" data-modalname="{{$parameter->name}}" data-target="#modal_{{$parameter->name}}">+
                    </button>
                </div>
                <div class="col-8 border-gray" id="channel_{{$parameter->name}}"></div>
                <div class="col-1"></div>
            </div>
        @endforeach

    </div>
    <!-- MODAL MAIN-GLOSS -->
    <!-- Modal -->
    @foreach($parameters as $parameter)
        <div class="modal my-modal fade" id="modal_{{$parameter->name}}" tabindex="-1"
             aria-labelledby="modal_{{$parameter->name}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add {{$parameter->label}}</h5>
                        <div class="header-action">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                    <div class="modal-body">
                        <form id="form_{{$parameter->name}}">
                            <div class="form-group row">
                                <label for="label_{{$parameter->name}}" class="col-sm-4 col-form-label">Label</label>
                                <div class="col-sm-8"><input type="text" class="form-control" id="label_{{$parameter->name}}" name="label_{{$parameter->name}}"></div>
                            </div>
                            @foreach($parameter->parameter_forms as $input)
                            <div class="form-group row">
                                <label for="facialexpressionlabel"
                                       class="col-sm-4 col-form-label">{{$input->label}}</label>
                                <div class="col-sm-8">
                                    @switch($input->type)
                                        @case("text")
                                        <input type="text" class="form-control" id="{{$input->name}}"
                                               name="{{$input->name}}">
                                        @break
                                        @case("select")
                                        <select class="form-control" id="{{$input->name}}" name="{{$input->name}}">
                                            @foreach($input->form_items as $item)
                                                <option value="{{$item->value}}">{{$item->label}}</option>
                                            @endforeach
                                        </select>
                                        @break
                                        @default
                                    @endswitch
                                </div>
                            </div>
                        @endforeach
                                <div class="form-group row">
                                    <label for="starttime_{{$parameter->name}}" class="col-sm-4 col-form-label">Start Time</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" id="starttime_{{$parameter->name}}" name="starttime_{{$parameter->name}}"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="endtime_{{$parameter->name}}" class="col-sm-4 col-form-label">End Time</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" id="endtime_{{$parameter->name}}" name="endtime_{{$parameter->name}}"></div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="{{$parameter->type=="main"?'addmain("'.$parameter->name.'","'.$parameter->id.'");':"addsecond('".$parameter->name."','".$parameter->id."')"}}">Save</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- MODAL JSON VIEWER -->
            <!-- Modal -->
            <div class="modal fade" id="modalJSON" tabindex="-1" aria-labelledby="modalJSON" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">JSON Viewer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <code>
                                <div id="jsonviewer"></div>
                            </code>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
{{--            <script src="{{asset("js/popper.min.js")}}"--}}
{{--                    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"--}}
{{--                    crossorigin="anonymous"></script>--}}
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                    crossorigin="anonymous"></script>


            <script>

                $(document).ready(function () {
                    $(document).on("click",".btn_add",function (){
                       var modal_name=$(this).data("modalname")
                        console.log("fromDelete",modal_name);

                    });
                    video.addEventListener('loadedmetadata', function () {
                        duration = video.duration;
                        $(".totalduration").html(duration);
                        loadSavedJson();
                    });


                });
                function loadSavedJson(){
                    var savedSentence=@json($model->json);
                    if(savedSentence!==null){
                        sentence=JSON.parse(@json($model->json));
                        for (var key in sentence) {
                            if (sentence.hasOwnProperty(key)) {
                                if(Array.isArray(sentence[key])){
                                    var arr=sentence[key];
                                    arr.forEach(element=>{
                                        var f_id=element.f_id;
                                        var start_time=element["starttime_"+key];
                                        var end_time=element["endtime_"+key];
                                        var starttimep = start_time * 100 / duration;
                                        var endtimep = end_time * 100 / duration;
                                        var label_view=element["label_"+key];
                                        if(element.type==="main"){
                                            $("#channel_"+key).append('<div data-toggle="modal" data-target="#modal_'+key+'" data-name="'+key+'" data-fid="'+f_id+'" class="divmaingloss" style="cursor:pointer;left:' + (starttimep) + '%;width:' + (endtimep - starttimep) + '%;"><span class="spanmaingloss">' + label_view+ '</span></div>');
                                        }else{
                                            $("#channel_"+key).append('<div data-toggle="modal" data-target="#modal_'+key+'" data-name="'+key+'" data-fid="'+f_id+'" class="divsecondGloss" style="cursor:pointer;left:' + (starttimep) + '%;width:' + (endtimep - starttimep) + '%;"><span class="spaneyegaze">' + label_view + '</span></div>');
                                        }
                                    });


                                }
                            }
                        }
                    }
                }
                var id = "{{$model->id}}";
                var video = $("#video")[0];
                var videofacial = $("#videofacial")[0];
                var videoLift = $("#video-left")[0];
                var videoRight = $("#video-right")[0];
                var duration = 0;
                var time = 0;
                var currentTime = 0;
                var action = 0;
                var drag = 0;
                var counter = 0;
                var parameters = @json($parameters);
                counters={};
                for(var i=0;i<parameters.length;i++){
                    counters[parameters[i].name]=0;
                }

                var sentence = {};


                sentence["id"] = id;
                sentence["videofront"] = "{{$model->getfrontSideVideoPath()}}";
                sentence["videoleft"] = "{{$model->getLeftSideVideoPath()}}";
                sentence["videoright"] = "{{$model->getRightSideVideoPath()}}";
                sentence["videofacial"] ="{{$model->getFacialSideVideoPath()}}";
                sentence["sentence"] = @json($model->original);



                video.ontimeupdate = function () {
                    timeupdatefunction()
                };

                function timeupdatefunction() {
                    // Display the current position of the video in a <p> element with id="demo"
                    //document.getElementById("demo").innerHTML = vid.currentTime;

                    currentTime = video.currentTime;

                    var position = currentTime * 100 / duration;

                    $(".cursor").css('left', position + '%');

                    $("#range").val(position);

                    $("#currenttimeinput").val(currentTime);

                }

                $("#buttonplay").click(function () {
                    if (action == 0) {
                        video.play();
                        videofacial.play();
                        videoLift.play();
                        videoRight.play();
                        action = 1;
                        $("#buttonplay").html('||');
                    } else {
                        video.pause();
                        videofacial.pause();
                        action = 0;
                        videoLift.pause();
                        videoRight.pause();
                        $("#buttonplay").html('&#9658;');
                    }
                    timeupdatefunction();
                });


                $("#currenttimeinput").change(function () {
                    video.currentTime = $("#currenttimeinput").val();
                    videofacial.currentTime = $("#currenttimeinput").val();
                    timeupdatefunction();
                });

                function changecurrenttime(d) {
                    video.pause();
                    video.currentTime = video.currentTime + d;
                    timeupdatefunction();
                }


                $("#range").change(function () {
                    var p = $("#range").val();
                    video.currentTime = duration * (p / 100);
                    videofacial.currentTime = duration * (p / 100);
                    videoLift.currentTime = duration * (p / 100);
                    videoRight.currentTime = duration * (p / 100);
                    timeupdatefunction();
                });

                //VIEW JSON
                function viewJSON() {
                    var myJsonString = JSON.stringify(sentence);
                    $("#jsonviewer").html(myJsonString);
                }
                //ADD MAIN GLOSS
                var gfid="";
                function addmain(name,id) {
                    var start_time = $("#starttime_"+name).val();
                    var end_time = $("#endtime_"+name).val();
                    const data = new FormData(document.getElementById("form_"+name));
                    const value = Object.fromEntries(data.entries());
                    let r = Math.random().toString(36).substring(2);
                    value["id"]=id;
                    value["type"]="main";
                    value["f_id"]=r;
                    var arr=sentence[name];
                    if(Array.isArray(arr)){
                        arr.forEach((element,index) => {
                            if(element.f_id===gfid){
                                sentence[name].splice(index,1);
                                $("div[data-fid='"+gfid+"']").remove();
                            }
                        });
                    }
                    gfid="";
                    if(!Array.isArray(sentence[name])){
                        sentence[name]=[];
                    }
                    sentence[name][sentence[name].length] = value;
                    var json = JSON.stringify(sentence);

                    var starttimep = start_time * 100 / duration;
                    var endtimep = end_time * 100 / duration;
                    $("#channel_"+name).append('<div data-toggle="modal" data-target="#modal_'+name+'" data-name="'+name+'" data-fid="'+r+'" class="divmaingloss" style="cursor:pointer;left:' + (starttimep) + '%;width:' + (endtimep - starttimep) + '%;"><span class="spanmaingloss">' + $("#label_"+name).val()+ '</span></div>');
                    $('#modal_'+name).modal('hide');
                    document.getElementById("form_"+name).reset();
                }

                $(document).on("click",".divmaingloss",function (){
                    var name=$(this).data("name");
                    var fid=$(this).data("fid");
                    gfid=fid;
                    var arr=sentence[name];
                    arr.forEach(element => {
                        if(element.f_id===fid){
                            for (var key in element) {
                                if (element.hasOwnProperty(key)) {
                                    $("#modal_"+name).find("#"+key).val(element[key]);
                                }
                            }
                        }
                    });
                    $("#modal_"+name).find(".header-action").append('<button type="button" data-type="second" data-name="'+name+'" data-fid="'+fid+'" class="btn btn-danger remove_btn_g">Remove</button>')
                });


                function addsecond(name,id) {
                    var start_time = $("#starttime_"+name).val();
                    var end_time = $("#endtime_"+name).val();
                    const data = new FormData(document.getElementById("form_"+name));
                    const value = Object.fromEntries(data.entries());
                    value["id"]=id;
                    value["type"]="second";
                    let r = Math.random().toString(36).substring(2);
                    value["f_id"]=r;
                    var arr=sentence[name];
                    if(Array.isArray(arr)){
                        arr.forEach((element,index) => {
                            if(element.f_id===gfid){
                                sentence[name].splice(index,1);
                                $("div[data-fid='"+gfid+"']").remove();
                            }
                        });
                    }
                    gfid="";
                    if(!Array.isArray(sentence[name])){
                        sentence[name]=[];
                    }
                    sentence[name][sentence[name].length] = value;
                    var starttimep = start_time * 100 / duration;
                    var endtimep = end_time * 100 / duration;

                    $("#channel_"+name).append('<div data-toggle="modal" data-target="#modal_'+name+'" data-name="'+name+'" data-fid="'+r+'" class="divsecondGloss" style="cursor:pointer;left:' + (starttimep) + '%;width:' + (endtimep - starttimep) + '%;"><span class="spaneyegaze">' + $("#label_"+name).val() + '</span></div>');
                    $('#modal_'+name).modal('hide');
                    document.getElementById("form_"+name).reset();
                }

                $(document).on("click",".divsecondGloss",function (){
                    var name=$(this).data("name");
                    var fid=$(this).data("fid");
                    gfid=fid;
                    var arr=sentence[name];
                    arr.forEach(element => {
                        if(element.f_id===fid){
                            for (var key in element) {
                                if (element.hasOwnProperty(key)) {
                                    $("#modal_"+name).find("#"+key).val(element[key]);
                                }
                            }

                        }

                    });
                    $("#modal_"+name).find(".header-action").append('<button type="button" data-type="second" data-name="'+name+'" data-fid="'+fid+'" class="btn btn-danger remove_btn_g">Remove</button>')
                });

                $(document).on("click",".remove_btn_g",function (){
                    var name=$(this).data("name");
                    var fid=$(this).data("fid");
                    var arr=sentence[name];
                    arr.forEach((element,index) => {
                        if(element.f_id===fid){
                            sentence[name].splice(index,1);
                            $("div[data-fid='"+gfid+"']").remove();
                        }

                    });
                    $('#modal_'+name).modal('hide');
                })
                $.fn.resetForm = function() {
                    return this.each(function(){
                        this.reset();
                    });
                }
                $(document).on("hidden.bs.modal",".modal",function (){
                    $("form").resetForm();
                    $(this).find(".remove_btn_g").remove();
                })
            </script>
    <script>
        function save(){
            Livewire.emit("save",JSON.stringify(sentence));

        }
    </script>

        </div>
