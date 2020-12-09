<?php  

namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService 
{
	
	private $repository;

	public function __construct(GenreRepository $genreRepository)
	{
		$this->repository = $genreRepository;
	}

	public function showAllGenres()
	{
		return $this->repository->all();
	}

	public function showGenreById($id)
	{
		return $this->repository->find($id);
	}
}