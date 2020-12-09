<?php  
namespace App\Repositories;

use Illuminate\Support\Facades\Http;


class BaseRepository 
{

	protected $options;
	protected $base_url;
	protected $only_api_key;

	public function __construct(Http $http)
	{
		$this->http = $http;
		$this->base_url = "https://api.themoviedb.org/3/";
		$this->options = ['api_key' => config('services.tmdb.key'), 'sort_by' => 'original_title.asc', 'page'=>1];
		$this->only_api_key = ['api_key' => config('services.tmdb.key')];
	}
}