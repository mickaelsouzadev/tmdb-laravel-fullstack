<?php  
namespace App\Repositories;

use Illuminate\Support\Facades\Http;


class BaseRepository 
{

	protected $http;
	protected $base_url;
	protected $api_key;
	protected $options;

	public function __construct(Http $http)
	{
		$this->http = $http;
		$this->base_url = "https://api.themoviedb.org/3/";
		$this->api_key = config('services.tmdb.key');
		$this->options['api_key'] = $this->api_key; 
	}

	protected function setOptions(array $options)
	{
		foreach ($options as $key => $value) {
			$this->options[$key] = $value;
		}
		
	}
}