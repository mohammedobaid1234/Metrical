<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();
        return [
            'status' => 200,
            'message' => __('messages.news'),
            'data' => $news,
        ];
    }

    public function newsByCommunity($id)
    {
        $news = News::where('community_id', $id)->exists();
        if ($news) {
            return [
                'status' => 200,
                'message' => __('messages.news'),
                'data' => News::where('community_id', $id)->get(),
            ];
        }
        return [
            'status' => 404,
            'message' =>  __('messages.news.notfound'),
            'data' => $news,
        ];
    }
}
