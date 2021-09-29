<div>
    <script>
        window.addEventListener("display-conformation",(event)=>{
            event.stopImmediatePropagation();
            title=event.detail.title;
            msg=event.detail.msg;
            data=event.detail.data;
            console.log(event.detail.data);
            self=this;
            fierEvent=event.detail.fierEvent;
            swal({
                title: title,
                text: msg,
                icon: 'warning',
                buttons: ["Cancel", "Ok"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        Livewire.emit(fierEvent,data);
                    }
                });
        });
    </script>
</div>
