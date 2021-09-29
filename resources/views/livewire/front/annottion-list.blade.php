<div>
    <table class="table table-striped">
        <thead>
        <tr style="background-color: rgba(72,61,139,0.63)">
            <th scope="col" width="7%">#</th>
            <th scope="col" width="7%">Code</th>
            <th scope="col" width="73%">Sentence</th>
            <th scope="col" width="13%">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key=>$item)
            <tr style="background-color: {{$item->status=="Annotated"?"#96fc6bb8":($item->status=="Not Annotated"?"#ff5858a1":"#5895ff9e")}}">
                <th scope="row">{{$key}}</th>
                <th scope="row">{{$item->code}}</th>
                <td><a href="{{route("front.annotation",["id"=>$item->id])}}" style="font-weight: bold">{{$item->original}}</a></td>
                <td>{{$item->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
