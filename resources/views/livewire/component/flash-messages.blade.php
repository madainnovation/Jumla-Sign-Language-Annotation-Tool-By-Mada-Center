<div>
    <script>
        window.addEventListener('toast-message-show', (event) => {
            event.stopImmediatePropagation();
            msg=event.detail.message;
            title=event.detail.title;
            type=event.detail.type;
            route=event.detail.route;
            if(type==="info"){
                iziToast.info({
                    title: title,
                    message: msg,
                    position: 'topRight',
                });
            }
            if(type==="success"){
                iziToast.success({
                    title: title,
                    message: msg,
                    position: 'topRight',
                });
            }
            if(type==="error"){
                iziToast.error({
                    title: title,
                    message: msg,
                    position: 'topRight',
                });
            }

            if(route!==""){
                setTimeout(function () {
                    Turbolinks.clearCache();
                    Turbolinks.visit(route,{action: 'restore'});
                    // window.location.replace(route);
                },3000)
            }
        })
    </script>
</div>
