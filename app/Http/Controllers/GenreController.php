<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenreService;

class GenreController extends Controller
{

    public function __construct(GenreService $service)
    {
    	$this->service = $service;
    }

    public function index()
    {
    	return $this->service->showAllGenres();
    }

    public function show(Request $request)
    {
    	return $this->service->showGenreById($request->id);
    }
}
