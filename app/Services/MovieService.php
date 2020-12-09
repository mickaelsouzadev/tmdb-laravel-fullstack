<?php  

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
	public function __construct(MovieRepository $movieRepository) 
	{
		$this->movieRepository = $movieRepository;
	}

	public function showTrendingMovies()
	{
		$movies = $this->movieRepository->findTrending();
	
		return $this->formatMovies($movies);
	}

	public function showMovieDetails($id)
	{
		$movie = $this->movieRepository->find($id);
		dd($movie);
		return $this->formatOnlyOneMovie($movie);
	}

	public function showMovieByName() {}

	public function showMoviesByGenre($genre) {
		$movies = $this->movieRepository->findByGenre($genre);
	
		return $this->formatMovies($movies);
	}

	private function formatMovies($movies)
	{	
		
		foreach ($movies as $key => $movie) {
			$movies[$key] = collect($movie)->only(['id', 'title', 'genre_ids', 'poster_path'])->all();
		}

		return $movies;
	}

	private function formatOnlyOneMovie($movie) 
	{
	
		return collect($movie)->only(['id', 'title', 'genres', 'poster_path']);
	
	}
}