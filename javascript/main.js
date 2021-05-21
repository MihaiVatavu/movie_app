const apiKey = "aa806af51ddcf7eebc557d13e1cecf88";

const searchForMovie = event => {
	event.preventDefault();

	let inputText = document.getElementById("search").value;
	if (event.value == null) {
		console.log("Hello");
	}
	console.log(inputText);
	searchMovies(inputText);
};
//Check if the doc has a search box
if (document.getElementById("searchform")) {
	const searchForm = document.getElementById("searchform");
	searchForm.addEventListener("submit", searchForMovie);
}

//Set the movie id so you can pass it to the details page
const getMovieId = id => {
	sessionStorage.setItem("id", id);
	// console.log(sessionStorage.getItem('id'));
};

const addedToFav = () => {
	const uiOutput = `
	<div class="col s12 center" id="details_movie">
			<h1 class="center">Movie has been added to favourites</h1>
	</div>
	`;
	document.getElementById("movie").insertAdjacentHTML("afterbegin", uiOutput);
};

//Function that receives the id,title and rating of the movie as params and pass them to php with ajax
const addToFavorites = (param1, param2, param3) => {
	let dataToPass = {};
	dataToPass.id = param1;
	dataToPass.title = param2;
	dataToPass.rating = param3;

	$.ajax({
		type: "POST",
		url: "../user/addToFav.php",
		data: dataToPass,
		success: function (data) {
			console.log(data);
		},
	});
	addedToFav();
};

const popularMovies = async () => {
	let data = await fetch(
		`https://api.themoviedb.org/3/movie/popular?api_key=aa806af51ddcf7eebc557d13e1cecf88`
	);
	let result = await data.json();
	let movies = result.results;
	// console.log(movies)
	let uiOutput = "";
	movies.forEach(movie => {
		// console.log(movie)
		let poster;
		if (movie.poster_path === null) {
			poster = "../assets/default_movie_image.png";
		} else {
			poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
		}
		let overview = movie.overview.slice(0, 150);

		uiOutput = `
    <div class="movieOutput col s10 m6 l4">
    <div class="card large">
      <div class="card-image">
        <img src="${poster}" alt="poster_for_movie" width="350" height="450">
      </div>
      <div class="card-content">
      <span class="card-title">${movie.original_title}</span>
        <p class="card-text">${overview}...</p>
      </div>
      <div class="card-action">
        <a onclick="getMovieId('${movie.id}')"  href="../template/details.php?id=${movie.title}">More info</a> 
      </div>
    </div>
  </div>  
    `;
		document
			.getElementById("movies")
			.insertAdjacentHTML("afterbegin", uiOutput);
	});
};

const searchMovies = async input => {
	let data = await fetch(
		`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=' + ${input}`
	);
	let result = await data.json();
	let movies = result.results;
	// console.log(movies)
	const existingMoviesUi = document.getElementById("movies");
	while (existingMoviesUi.firstChild) {
		existingMoviesUi.firstChild.remove();
	}
	// console.log(existingMoviesUi);
	let uiOutput = "";
	movies.forEach(movie => {
		// console.log(movie);
		let poster;
		if (movie.poster_path === null) {
			poster = "../assets/default_movie_image.png";
		} else {
			poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
		}
		let date = movie.release_date;
		let overview = movie.overview.slice(0, 150);

		uiOutput = `
    <div class="col s10 m6 l4">
    <div class="card large">
      <div class="card-image">
        <img src="${poster}" alt="poster_for_movie" width="350" height="450">
        <span class="card-title">${movie.original_title}</span>
      </div>
      <div class="card-content">
        <p>${overview}.</p>
      </div>
      <div class="card-action">
        <a onclick="getMovieId('${movie.id}')"  href="../template/details.php?id=${movie.title}">More info</a> 
      </div>
    </div>
  </div>  
    `;
		document
			.getElementById("movies")
			.insertAdjacentHTML("afterbegin", uiOutput);
	});
};

const getIndividualMovie = async () => {
	let movieId = sessionStorage.getItem("id");
	let data = await fetch(
		`https://api.themoviedb.org/3/movie/${movieId}?api_key=aa806af51ddcf7eebc557d13e1cecf88`
	);
	let result = await data.json();
	let movie = result;
	let poster;
	if (movie.poster_path === null) {
		poster = "../image/default-movie.png";
	} else {
		poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
	}
	console.log(movie);

	let uiOutput = `
  <div class="col s12 m8 l6 center" id="details_movie">
      <h1 class="center">${movie.title}</h1>
      <h2 class="center">Rating : ${movie.vote_average}</h2>
      <p class="center">${movie.overview}</p>
      <p class="center">Runtime : ${movie.runtime}/min</p>
    </div>
    <div class="col s12 m8 l6 center" id="details_movie_poster">
      <img class="responsive-img" src="${poster}">
    </div>
  `;
	document.getElementById("movie").insertAdjacentHTML("afterbegin", uiOutput);
};

const getIndividualMovieLoggedIn = async () => {
	let movieId = sessionStorage.getItem("id");
	let data = await fetch(
		`https://api.themoviedb.org/3/movie/${movieId}?api_key=aa806af51ddcf7eebc557d13e1cecf88`
	);
	let result = await data.json();
	let movie = result;

	let poster;
	if (movie.poster_path === null) {
		poster = "../image/default-movie.png";
	} else {
		poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
	}
	console.log(movie);

	let uiOutput = `
  <div class="col s12 m8 l6 center" id="details_movie">
      <h1 class="center">${movie.title}</h1>
      <h2 class="center">Rating : ${movie.vote_average}</h2>
      <p class="center">${movie.overview}</p>
      <p class="center">Runtime : ${movie.runtime}/min</p>
						<button onclick="addToFavorites('${movie.homepage}','${movie.title}','${movie.vote_average}')" class="btn-large waves-effect waves-light grey darken-4 center">Add to Favourites
						<i class="material-icons right">favorite_border</i>
				</button> 
    </div>
    <div class="col s12 m8 l6 center" id="details_movie_poster">
      <img class="responsive-img" src="${poster}">
    </div>
  `;
	document.getElementById("movie").insertAdjacentHTML("afterbegin", uiOutput);
};
