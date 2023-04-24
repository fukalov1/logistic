<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use App\Models\CompanyNew;
use Encore\Admin\Facades\Admin;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CompanyNewController extends Controller
{
    use HasResourceActions;
    public $page_id=0;
    public $page_name = '';
    public $bread_crubs='';


    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $this->getHeader();
        if (Admin::user()->isAdministrator())
            $this->bread_crubs = '<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs;

        return $content
            ->header('Новости для '.$this->page_name)
            ->description(' список')
            ->body($this->bread_crubs )
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        $this->getHeader();

        return $content
            ->header('Новости для '.$this->page_name)
            ->description(' список')
            ->body('<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs )
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        $this->getHeader();

        return $content
            ->header('Новости для '.$this->page_name)
            ->description(' список')
            ->body('<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs )
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CompanyNew);
        $grid->model()->orderBy('date', 'desc');

        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();
            $filter->between('date', 'Дата')->date();
            $objs = Page::where('news_branch','1')->get();
            $list = [];
            foreach ($objs as $obj) {
                $list[$obj->id] = $obj->name;
            }
            $filter->equal('page_id','Раздел')->select($list);
        });

        $grid->id('Id');
        $grid->page()->name('Раздел');
        $grid->date('Дата');
        $grid->name('Наименоване');
        $grid->anons('Анонс');
        $grid->show('Показов');
//        $grid->created_at('Created at');
//        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CompanyNew::findOrFail($id));

        $show->id('Id');
        $show->page_id('Page id');
        $show->title('Title');
        $show->description('Description');
        $show->keywords('Keywords');
        $show->url('Url');
        $show->date('Date');
        $show->name('Name');
        $show->anons('Anons');
        $show->text('Text');
        $show->show('Show');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CompanyNew());

        $form->tab('Основная', function ($form) {

            $form->radio('type', 'Тип показа новости')
                ->options([
                    '1' => 'Стандарт',
                    '2' => 'С фото',
                    '3'=> 'Промо-блок',
                    '4'=> 'Список документов',
                    '5'=> 'Список ссылок',
                    '6'=> 'Список ссылок на PDF'])->default('1');

//            $form->select('page_id', 'Раздел')->options(function ($id) {
//                $objs = Page::where('news_branch','1')->get();
//                $list = [];
//                foreach ($objs as $obj) {
//                    $list[$obj->id] = $obj->name;
//                }
//                return $list;
//
//            })->value(session('page_id'));
            $form->hidden('page_id')->value(session('page_id'));

            $form->date('date', 'Дата')->default(date('Y-m-d'));
            $form->text('name', 'Наименование');
            $form->textarea('anons', 'Анонс');
            $form->image('image', 'Фото');
//            $form->ckeditor('text', 'Текст')->options(['language' => 'ru', 'height' => 500]);
            $form->ckeditor('text', 'Текст')
                ->options(
                    [
                        'filebrowserBrowseUrl' =>  '/ckfinder/browser',
                        'filebrowserImageBrowseUrl' =>  '/ckfinder/browser',
                        'filebrowserUploadUrl' => '/ckfinder/browser?type=Files',
                        'filebrowserImageUploadUrl' => '/ckfinder/browser?command=QuickUpload&type=Images',
                        'language' => 'ru',
                        'height' => 500
                    ])->default('-');

//            $form->number('show', 'Show');
        })->tab('Мета', function ($form) {
            $form->text('title', 'Заголовок страницы');
            $form->text('description', 'Описание станицы');
            $form->text('keywords', 'Ключевые слова');
            $form->text('url', 'Адрес страницы (url)');
        });
        return $form;
    }

    private function getHeader() {
        $page = Page::find(session('page_id'));
        if ($page) {
            $this->page_id = $page->id;
            $this->page_name = $page->name;
        }
        else {
            return redirect('/admin/pages');
        }
    }

    private function getBeadCrumbs($id)
    {
        $page = Page::find($id);
        $this->bread_crubs = " <a href='/admin/sub_pages?set={$page->id}'>".$page->name."</a> / ".$this->bread_crubs;

        if (($page->parent_id>0) and (Admin::user()->isAdministrator()) ) {
            $this->getBeadCrumbs($page->parent_id);
        }
    }


}
