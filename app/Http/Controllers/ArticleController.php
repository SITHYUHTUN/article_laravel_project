<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use PhpParser\Node\Stmt\Catch_;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;
use Symfony\Contracts\Service\Attribute\Required;

class ArticleController extends Controller
{
    public function __construct()
    {
        // $this->middleware("auth");
        $this->middleware("auth")->except(['index','detail']);
    }
    public function index(){
        $data=Article::latest()->paginate(5);
        return $data;
        return view('articles.index',[
            'articles'=>$data
        ]);
        
    }
    public function detail($id){
        $data=Article::find($id);
        return view('articles.detail',[
            'article'=>$data
        ]);
    }
    public function delete($id){
        $article=Article::find($id);
        $article->delete();
        return redirect("/articles")->with("info","Article deleded");
    }
    public function edit($id){
        $cat=Category::all();
        
        

        $article=Article::find($id);
        
        return view("articles.edit",[
            "article"=>$article,
            "categories"=>$cat
            
        ]);

    }
    // public function editadd($id){
        
    //     $datas=Category::all();
    //     echo $datas;
    
    //     return view("articles.edit",[
    //         "categories"=>$datas
    //     ]);
    // }

    public function add(){
        $data=Category::all();
        
        return view("articles.add",[
            "categories"=>$data
        ]);
    }
    public function create(){
        $validator=validator(request()->all(),[
            "title"=>"required",
            "body"=>"required",
            "user_id"=>"required",
            "category_id"=>'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

       $article=new Article();
       $article->title=request()->title;
       $article->body=request()->body;
       $article->user_id=request()->user_id;
       $article->category_id=request()->category_id;
       $article->save();

       return redirect('/articles');
    }
    public function update($id)
{
    $validator=validator(request()->all(),[
        "title"=>"required",
        "body"=>"required",
        "category_id"=>'required',
    ]);

    if($validator->fails()){
        return back()->withErrors($validator);
    }
    $item = Article::find($id);
    $item->title = request()->title;
    $item->body = request()->body;
    $item->category_id=request()->category_id;
    
    $item->save();
    

    return redirect('/articles')->with("info","successful update");
}


}
