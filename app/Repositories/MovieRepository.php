<?php  
namespace App\Repositories;

class MovieRepository extends BaseRepository
{

	public function findTrending()
	{
		return $this->http::get("{$this->base_url}trending/movie/day", $this->options)['results'];

	}

	public function find($id)
	{
		return $this->http::get("{$this->base_url}movie/{$id}", ['api_key' => $this->api_key])->json();
	}

	public function findByName($name)
	{
		$this->setOptions(['query' => $name]);

		return $this->http::get("{$this->base_url}search/movie", $this->options)['results'];
	}

	public function findByGenre($genre)
	{
		$this->setOptions(['with_genres' => $genre]);
		// dd($this->options);
		return $this->http::get($this->base_url.'discover/movie', $this->options)['results'];
	}

}