var data = {
  movies: [
    {
      movieTitle: "Ender's Game",
      movieDirector: "Gavin Hood",
      movieImage: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/movie-endersgame.jpg"
    }, {
      movieTitle: "The Fifth Estate",
      movieDirector: "Bill Condon",
      movieImage: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/movie-thefifthestate.jpg"
    }, {
      movieTitle: "Escape Plan",
      movieDirector: "Mikael Håfström",
      movieImage: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/movie-escapeplan.jpg"
    }
  ]
};

var i;

var source = $("#movie-template").html();
var template = Handlebars.compile(source);

// Event Handling
$(document).on("click", ".module-movie", function() {
  alert("movie added");
});

// display logic
for (i = 0; i < data.movies.length; i++) {

  var html = template(data.movies[i]);
  $("#movies").append(html);

}
