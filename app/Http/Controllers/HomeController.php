<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
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
        $resultArray = $this->fetchMovieApi();

        if($resultArray === NULL) {
            $resultArray['results'] = [
                [
                    'id' => 1,
                    'original_title' => 'TITLE',
                    'vote_average' => 7.2,
                    'poster_path' => 'localhost/banan.jpg',
                    'overview' => 'film overview',
                ]
            ];

            $resultArray['total_pages'] = 14;
        } else {
            $resultArray = $resultArray->json();
        }

        $movies = $this->prepareMoviesData($resultArray['results']);

        return view('welcome', [
            'movies' => $movies,
            'total_pages' => (int) $resultArray['total_pages']
        ]);
    }

    private function fetchMovieApi()
    {
//            var_dump($result->failed());
//            var_dump($result->status());

        try {
            $result = Http::get($this->movie_api, $this->url_parameters);

            $result->throw();

            return $result;
        } catch (\Exception $e) {

            $exceptionMessage = !env('APP_DEBUG')
                ? 'Movie-Loading has failed please try again later...'
                : $e->getMessage();

            if(!env('APP_DEBUG')) {
                throw new \Exception($exceptionMessage . 'LLL');
            }

        }

        return null;
    }

    private function prepareMoviesData($data)
    {

        $resultArray = [];

        foreach ($data as $result) {

            $resultArray[] = [
                'id' => $result['id'],
                'original_title' => $result['original_title'],
                'vote_average' => $result['vote_average'],
                'poster_path' => $this->image_api . $result['poster_path'],
                'overview' => $result['overview'] ?? '',
            ];

        }

        return $resultArray;
    }

}
