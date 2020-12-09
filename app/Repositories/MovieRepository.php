<?php  
namespace App\Repositories;

class MovieRepository extends BaseRepository
{

	public function all() 
	{
		return $this->http::get("{$this->base_url}discover/movie", $this->query)['results'];
	}

	public function findTrending()
	{
		return $this->http::get("{$this->base_url}trending/movie/day", $this->query)['results'];

	}

	public function find($id)
	{
		// dd("{$this->base_url}movie/{$id}");
		return $this->http::get("{$this->base_url}movie/{$id}", $this->only_api_key)->headers();
	}

	public function findByName($name)
	{
		// return $this->http::get("{$this->base_url}movie", $this->query)->json();
	}

	public function findByGenre($genre)
	{
		$this->query['with_genre'] = $genre;
		return $this->http::get($this->base_url.'discover/movie', $this->query)['results'];
	}

}