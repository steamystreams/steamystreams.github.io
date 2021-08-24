curl --request GET \
>   --url 'https://enmcl1x9akrhc23.m.pipedream.net' \
>   --header 'Content-Type: multipart/form-data; boundary=---011000010111000001101001' \
>   --form page=1 \
>   --form per_page=10 \
>   --form Limit=5


const options = {
  method: "POST",
  headers,
  mode: "cors",
  body: JSON.stringify(body),
}

fetch("https://enmcl1x9akrhc23.m.pipedream.net", options)

.then(response => {
  console.log(response);
})
.catch(err => {
  console.error(err);
});