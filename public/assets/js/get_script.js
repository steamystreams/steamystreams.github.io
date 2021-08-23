Get("https://doodapi.com/api/file/list?key=38097zftfg2vl52xvgz7l")
  .then((response) => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error("NETWORK RESPONSE ERROR");
    }
  })
  .then(data => {
    console.log(data);
    download_url(data)
  })
  .catch((error) => console.error("FETCH ERROR:", error));