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
                                    <th>Name</th>
                                    <th>Label</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->label}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>
                                            <div class="row m-auto">
                                                <div class="btn-group">
                                                    <a
                                                        href="{{route("form.form",["id"=>$item->id])}}"
                                                        class="btn btn-warning">Edit</a>
                                                    <button class="btn btn-danger remove-btn" wire:click="confirmDelete({{$item->id}})">
                                                        <i class="fa fa-trash-alt"></i></button>
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
    <li class="breadcrumb-item"><a>Forms</a></li>
@endsection
@section("header")
    <div  style="width: 100%;display: flex;justify-content: space-between">
        <h1>List of sentence</h1>
        <a class="btn btn-primary" href="{{route("form.form")}}">Create</a>
    </div>
@endsection
