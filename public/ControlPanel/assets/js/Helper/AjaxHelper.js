async function callApi(api, method = "post", data = {}) {
    if (method === "post") {
        return  await $.post(api, data,
            function (data, status) {
                if (status === 200) {
                    return data;
                }
            });
    } else {
        return await $.get(api,
            function (data, status) {
                if (status === 200) {
                    return data;
                }
            });
    }
}
