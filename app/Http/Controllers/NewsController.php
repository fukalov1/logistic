<?php

namespace App\Http\Controllers;
use App\CenterNew;
use App\Page;
use App\PageBlock;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $bread_crubs;

    public function __construct(Page $page, CenterNew $centerNew)
    {
        $this->page = $page;
        $this->centerNew = $centerNew;
    }

    public function show($id=1)
    {
        $show = $this->centerNew->find($id)->show+1;
        $this->centerNew->find($id)->update(['show' => $show]);
        $data = ['data' => $this->centerNew->find($id)];
        if ($this->centerNew->find($id)->page_id>1) {
            $this->getBeadCrumbs($this->centerNew->find($id)->page_id);
        }
        else {
            $this->bread_crubs = ' Новости';
        }
        $data['pages'] = $this->page->getMenu();
        $data['directs'] = $this->page->where('number_direct','>', '0')->orderBy('number_direct')->get();
        $data['center_news'] = $this->centerNew->where('page_id', $this->centerNew->find($id)->page_id)->orderBy('date', 'desc')->limit(4)->get();
        $data['bread_crumbs'] = '<a href="/">Главная</a> /'.$this->bread_crubs;
        $data['news_branches'] = $this->page->where('id','>',1)->where('news_branch','1')->get();
        if ($id)
            $data['page_id'] = $this->centerNew->find($id)->page_id;

        $data['current_year'] = 0;
        $data['current_month'] = 0;
        $data['current_branch'] = $this->centerNew->find($id)->page_id;
        $data['years'] = ['2020','2019','2018','2017','2016','2015','2014'];
        $data['months'] = ['январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь'];

        return view('news', $data);
    }

    public function showAll($id='0')
    {
        if ($id>0)
            $news = $this->centerNew->where('page_id', $id)->orderBy('date', 'desc')->paginate(config('count_news'));
        else  {
            $news = $this->centerNew->orderBy('date', 'desc')->paginate(config('count_news'));
        }


//        $news = $news->toArray();
//
//        $news['title'] = '';
//        $news['description'] = '';
//        $news['keywords'] = '';
//
//        $news = collect($news);

//        dd($news->toArray());


        $data = ['data' => $news];
        if ($id > 1) {
            $this->getBeadCrumbs($id);
        }
        else {
            $this->bread_crubs = ' Новости';
        }


        $data['pages'] = $this->page->getMenu();
        $data['directs'] = $this->page->where('number_direct','>', '0')->orderBy('number_direct')->get();
        $data['center_news'] = $this->centerNew->orderBy('date', 'desc')->orderBy('date', 'desc')->limit(4)->get();
        $data['bread_crumbs'] = '<a href="/">Главная</a> /'.$this->bread_crubs;
        $data['news_branches'] = $this->page->where('id','>',1)->where('news_branch','1')->get();
        $data['current_year'] = 0;
        $data['current_month'] = 0;
        $data['current_branch'] = 0;
        $data['years'] = ['2020','2019','2018','2017','2016','2015','2014'];
        $data['months'] = ['январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь'];



        return view('allnews', $data);
    }

    public function showArch()
    {
        $year = \request('year');
        $month = \request('month');
        $branch = \request('branch');
        if ($branch>0)
            $news = $this->centerNew->where('page_id', $branch);
        else  {
            $news = $this->centerNew;
        }

        if ($year>0) {
            $news = $news->whereRaw('year(date)='.$year);
        }
        if ($month>0) {
            $news = $news->whereRaw('month(date)='.$month);
        }
        $news = $news->orderBy('date', 'desc')->paginate(config('count_news'));

        $data = ['data' => $news];
        $this->bread_crubs = 'Архив новостей';

        $data['pages'] = $this->page->getMenu();
        $data['directs'] = $this->page->where('number_direct','>', '0')->orderBy('number_direct')->get();
        $data['center_news'] = $this->centerNew->orderBy('date', 'desc')->orderBy('date', 'desc')->limit(4)->get();
        $data['bread_crumbs'] = '<a href="/">Главная</a> /'.$this->bread_crubs;
        $data['news_branches'] = $this->page->where('id','>',1)->where('news_branch','1')->get();
        $data['current_year'] = $year;
        $data['current_month'] = $month;
        $data['current_branch'] = $branch;
        $data['years'] = ['2020','2019','2018','2017','2016','2015','2014'];
        $data['months'] = ['январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь'];

        return view('allnews', $data);
    }

    private function getBeadCrumbs($id)
    {
        $page = Page::find($id);
        $this->bread_crubs = " <a href='/{$page->url}'>".$page->name."</a> / ".$this->bread_crubs;

        if ($page->parent_id>0) {
            $this->getBeadCrumbs($page->parent_id);
        }
    }

}
