<?php  

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Arr;

class GenreRepository extends BaseRepository
{
	public function all()
	{
		return $this->http::get("{$this->base_url}genre/movie/list", $this->options)['genres'];
	}

	public function find($id)
	{
		$genres = $this->all();


		$genre = Arr::where($genres, function($genre, $key) use ($id) {
			if($genre['id'] == $id) {
				return $genre;
			}
		});

		return call_user_func_array('array_merge', $genre);
	}
}		