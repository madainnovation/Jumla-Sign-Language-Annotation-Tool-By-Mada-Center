<div x-data>
    <livewire:component.flash-messages/>
    <livewire:component.display-conformation/>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="website_table">
                                <tr>
                                    <th>#</th>
                                    <th>Original</th>
                                    <th>JSON path</th>
                                    <th>Status</th>
                                    <th>Download</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($list as $item)
                                   <tr>
                                       <td>{{$item->id}}</td>
                                       <td>{{$item->original}}</td>
                                       <td>{{$item->json_path}}</td>
                                       <td style="background-color: {{$item->status=="Annotated"?"#96fc6b":($item->status=="Not Annotated"?"#ff5858":"#5895ff")}}">{{$item->status}}</td>
                                       <td>
                                           @if($item->statue=="Annotated" || $item->status=="Annotation Approved")
                                                <a href="#" wire:click="downloadjson({{$item->id}})">Json</a>
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                       <td>
                                           <div class="row m-auto">
                                               <div class="btn-group">
                                                   <a
                                                       href="{{route("sentence.form",["id"=>$item->id])}}"
                                                       class="btn btn-warning">Edit</a>
                                                       <button class="btn btn-danger remove-btn" wire:click="confirmDelete({{$item->id}})">
                                                           <i class="fa fa-trash-alt"></i></button>
                                                   <a class="btn btn-primary" target="_blank" href="{{route("front.annotation",["id"=>$item->id])}}" >Annotation</a>
                                               </div>
                                           </div>
                                       </td>

                                   </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    </div>
                </div>

            </div>
        </div>
        <!--       content-->

    </section>
</div>
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-grip-horizontal"></i>Dashboard</a></li>
    <li class="breadcrumb-item">Sentence</li>
@endsection
@section("header")
        <div  style="width: 100%;display: flex;justify-content: space-between">
        <h1>List of sentence</h1>
        <div>
            <a class="btn btn-primary" href="{{route("sentence.addFromFile")}}">Add From File</a>
            <a class="btn btn-primary" href="{{route("sentence.form")}}">Create</a>
        </div>
    </div>
@endsection
