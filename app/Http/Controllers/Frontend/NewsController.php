<?php

namespace App\Http\Controllers\Frontend;


use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function NewsList()
    {


        $news = News::latest()->paginate(6);
        $latest = News::latest()->limit(5)->get();
        $years = News::selectRaw('year(created_at) as year')->orderBy('created_at', 'desc')->pluck('year')->unique()->toArray();
        return view('frontend.news.news_list', compact('news', 'latest', 'years'));
    } // end method 

    public function DetailsNews($id)
    {
        $news = News::where('id', $id)->firstOrFail();
        $years = News::selectRaw('year(created_at) as year')->orderBy('created_at', 'desc')->pluck('year')->unique()->toArray();


        $latest = News::latest()->limit(5)->get();

        return view('frontend.news.news_details', compact('news', 'latest', 'years'));
    }
    public function NewsArchiveYear($year)
    {

        $news = News::whereYear('created_at', $year)->orderBy('created_at', 'desc')->paginate(6);
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $months_slo = ['januar', 'februar', 'marec', 'april', 'maj', 'junij', 'julij', 'avgust', 'september', 'oktober', 'november', 'december'];
        $latest = News::latest()->limit(5)->get();
        $years = News::selectRaw('year(created_at) as year')->orderBy('created_at', 'desc')->pluck('year')->unique()->toArray();

        return view('frontend.news.news_archive_by_year', compact('news', 'year', 'months', 'months_slo', 'latest', 'years'));
    }

    public function NewsArchiveMonth($year, $key)
    {

        $news = News::whereYear('created_at', $year)->whereMonth('created_at', $key + 1)->orderBy('created_at', 'asc')->paginate(6);
        // $news = News::paginate(6);
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $months_slo = ['januar', 'februar', 'marec', 'april', 'maj', 'junij', 'julij', 'avgust', 'september', 'oktober', 'november', 'december'];
        $latest = News::latest()->limit(5)->get();
        $years = News::selectRaw('year(created_at) as year')->orderBy('created_at', 'desc')->pluck('year')->unique()->toArray();
        return view('frontend.news.news_archive_by_month', compact('news', 'year', 'latest', 'months', 'months_slo', 'years'));
    }
}
