<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class HomeController extends Controller
{
    private $movie_api = 'https://api.themoviedb.org/3/discover/movie';
    private $image_api = 'https://image.tmdb.org/t/p/w500/';

    public function index() {
        return view('welcome', [
            'movies' => $this->fetchMovieApi()
        ]);
    }

    private function fetchMovieApi() {

        try {

            $httpRequest = Http::get($this->movie_api, [
                'api_key' => env('MOVIE_API_KEY'),
                'page' => 1
            ]);

        } catch(\Exception $e) {
            throw new RequestException($e->getMessage());
        }


        // return $httpRequest['results'];
        return $this->prepareData($httpRequest['results']);
    }

    private function prepareData($data) {

        $resultArray = [];

        foreach($data as $result) {

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
}
