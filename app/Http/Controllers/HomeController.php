<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private $movie_api = 'https://api.themoviedb.org/3/discover/movie';
    private $image_api = 'https://image.tmdb.org/t/p/w500/';

    public function __construct(Request $request)
    {
        $this->url_parameters = $request->query();
        $this->url_parameters['api_key'] = env('MOVIE_API_KEY');
    }

    public function index(Request $request)
    {

        return view('welcome', [
            'movies' => $this->fetchMovieApi()
        ]);
    }

    private function fetchMovieApi()
    {

        $url_params = $this->prepareUrl();


        $httpRequest = Http::get($this->movie_api, $this->url_parameters);

        // return $httpRequest['results'];
        return $this->prepareData($httpRequest['results']);
    }

    private function prepareData($data)
    {

        $resultArray = [];

        foreach ($data as $result) {

            $resultArray[] = [
                'id' => $result['id'],
                'original_title' => $result['original_title'],
                'vote_average' => $result['vote_average'],
                'poster_path' => $this->image_api . $result['poster_path'],
                'overview' => $result['overview'] ?? ''
            ];

        }

        return $resultArray;
    }

    private function prepareUrl()
    {
        $separator = '?';

        $uri_query = '';

        foreach($this->url_parameters as $param => $value) {
            $uri_query .= $separator . $param . '=' . $value;
            $separator = '&';
        }

        return $uri_query;
     }
}
