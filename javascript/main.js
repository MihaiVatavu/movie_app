const apiKey= 'aa806af51ddcf7eebc557d13e1cecf88';



// const searchMovies = async(input)=>{
//   let data = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=${apikey}&query=' + ${input}`)
//   let result = await data.json();
//   console.log(result)
  
// }


const checkSearch = (event)=>{

  event.preventDefault()

  let inputText = document.getElementById('search').value


  if(event.value == null){
    console.log('Hello')
  }
  console.log(inputText)
  searchMovies(inputText)
}

//Check if the doc has a search box 
if(document.getElementById('search_form')){
  const searchForm =  document.getElementById('search_form');
  searchForm.addEventListener('submit', checkSearch);
}

//Set the movie id so you can pass it to the details page
const getMovieId = (id)=>{
  sessionStorage.setItem('id', id);
  console.log(sessionStorage.getItem('id'));
}


const popularMovies = async ()=>{
  let data = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=aa806af51ddcf7eebc557d13e1cecf88`);
  let result = await data.json();
  let movies = result.results
  // console.log(movies)
  let uiOutput = '';
  movies.forEach((movie)=>{
      console.log(movie)
      let poster  
      if (movie.poster_path === null) {
        poster = "../assets/default_movie_image.png";
    } else {
        poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
    }
    let date = movie.release_date;
    let year = date.slice(0, 4);

    uiOutput=`
    <div class="movieOutput col s10 m6 l4">
    <div class="card large">
      <div class="card-image">
        <img src="${poster}" alt="poster_for_movie" width="350" height="450">
        <span class="card-title">${movie.original_title}</span>
      </div>
      <div class="card-content">
        <p>${movie.overview}.</p>
      </div>
      <div class="card-action">
        <a onclick="getMovieId('${movie.id}')"  href="../template/details.php?id=${movie.title}">More info</a> 
      </div>
    </div>
  </div>  
    `
  document.getElementById('movies').insertAdjacentHTML('afterbegin',uiOutput)
   });
}

const searchMovies = async(input)=>{
  let data = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=' + ${input}`)
  let result = await data.json();
  let movies = result.results
  // console.log(movies)
  const existingMoviesUi = document.getElementById('movies');
  while (existingMoviesUi.firstChild) {
    existingMoviesUi.firstChild.remove()
}
  console.log(existingMoviesUi)
  let uiOutput = '';
  movies.forEach((movie)=>{
      console.log(movie)
      let poster  
      if (movie.poster_path === null) {
        poster = "../assets/default_movie_image.png";
    } else {
        poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
    }
    let date = movie.release_date;

    uiOutput=`
    <div class="col s10 m6 l4">
    <div class="card large">
      <div class="card-image">
        <img src="${poster}" alt="poster_for_movie" width="350" height="450">
        <span class="card-title">${movie.original_title}</span>
      </div>
      <div class="card-content">
        <p>${movie.overview}.</p>
      </div>
      <div class="card-action">
        <a onclick="getMovieId('${movie.id}')"  href="../template/details.php?id=${movie.title}">More info</a> 
      </div>
    </div>
  </div>  
    `
    document.getElementById('movies').insertAdjacentHTML('afterbegin',uiOutput)
    });
  
}


const getIndividualMovie = async ()=>{

  let movieId = sessionStorage.getItem('id');
  console.log(movieId)
  let data = await fetch(`https://api.themoviedb.org/3/movie/${movieId}?api_key=aa806af51ddcf7eebc557d13e1cecf88`);
  let result = await data.json();
  let movie = result
  let poster
    if (movie.poster_path === null) {
    poster = "../image/default-movie.png";
    } else {
    poster = "https://image.tmdb.org/t/p/w500" + movie.poster_path;
  }
  console.log(movie)

  let uiOutput = `
  <div class="col s12 m8 l6 center" id="details_movie">
      <h1 class="center">${movie.title}</h1>
      <h2 class="center">Note : ${movie.vote_average}</h2>
      <p class="center">${movie.overview}</p>
      <p class="center">Runtime : ${movie.runtime}/min</p>
    </div>
    <div class="col s12 m8 l6 center" id="details_movie_poster">
      <img class="responsive-img" src="${poster}">
    </div>

  `;
  document.getElementById('movie').insertAdjacentHTML('afterbegin',uiOutput)
  
}