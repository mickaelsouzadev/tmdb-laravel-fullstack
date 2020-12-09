<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;


class MovieController extends Controller
{

    public function __construct(MovieService $service)
    {
    	$this->service = $service;
    }

    public function index()
    {
    	return $this->service->showTrendingMovies();
    }

    public function show(Request $request)
    {
    	return $this->service->showMovieDetails($request->id);
    }

    public function getByGenre(Request $request)
    {
    	return $this->service->showMoviesByGenre($request->genre);
    }

    public function getByName(Request $request)
    {
    	return $this->service->showMoviesByName($request->name);
    }
}
