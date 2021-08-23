const form = new FormData();
form.append("page", "yes");
form.append("per_page", "10");

fetch("https://doodapi.com/api/file/list?key=38097zftfg2vl52xvgz7l", {
  "method": "GET",
  "headers": {
    "Content-Type": "multipart/form-data; boundary=---011000010111000001101001l; Access-Control-Allow-Origin:  http://192.168.1.75:8090"

  }
})
.then(response => {
  console.log(response);
})
.catch(err => {
  console.error(err);
});