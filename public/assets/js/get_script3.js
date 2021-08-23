const form = new FormData();
form.append("page", "yes");
form.append("per_page", "10");

const settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://doodapi.com/api/file/list?key=38097zftfg2vl52xvgz7l",
  "method": "GET",
  "headers": {},
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
});