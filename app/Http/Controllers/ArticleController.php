<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use Auth;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article= Article::all();
        return view('admin.article.index',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.article.add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        if($request->status == "on")
        {
            $status = "1";
        }
        else
        {
            $status = "0";
        }
        $user_id = Auth::user()->id;
        $request->merge(['status' => $status,'user_id' => $user_id,
        'slug' => changeTitle($request->title)]);
        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        $data = $data = $request->except(['thumbnail']);
        if($request->thumbnail == null){
            $data['thumbnail'] = $article->thumbnail;
            $request->thumbnail = $article->thumbnail;
        }
        else
        {
            if($request->hasFile('thumbnail')){
                $thumbnail = $request->thumbnail;
                $file_ext = $thumbnail->getClientOriginalExtension();
                if(in_array($file_ext, $allow_type)){
                    $file_name_tb = $request->thumbnail->store('articles');
                    $data['thumbnail'] = $file_name_tb;
                }
            }
            $request->thumbnail = $file_name_tb;
        }
        //dd($data);
        $article = Article::create($data);
        return redirect()->route('articles.show',$article)->with('thongbao','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        if($request->status == "on")
        {
            $status = "1";
        }
        else
        {
            $status = "0";
        }
        $user_id = Auth::user()->id;
        $request->merge(['status' => $status,'user_id' => $user_id,
        'slug' => changeTitle($request->title)]);
        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        $data = $data = $request->except(['thumbnail']);
        if($request->thumbnail == null){
            $data['thumbnail'] = $article->thumbnail;
            $request->thumbnail = $article->thumbnail;
        }
        else
        {
            if($request->hasFile('thumbnail')){
                $thumbnail = $request->thumbnail;
                $file_ext = $thumbnail->getClientOriginalExtension();
                if(in_array($file_ext, $allow_type)){
                    $file_name_tb = $request->thumbnail->store('articles');
                    $data['thumbnail'] = $file_name_tb;
                }
            }
            $request->thumbnail = $file_name_tb;
        }
        
        $article->update($data);
        return redirect()->route('articles.show',$article)->with('thongbao','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('destroy_success');
        return redirect()->route('articles.index')->with('thongbao','Xóa thành công.');
    }
}
