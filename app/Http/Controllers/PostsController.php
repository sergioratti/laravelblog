<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category ;
use App\Tag ;
use Auth ;
use Session ;

class PostsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all()) ;
    }

    public function trashed()
    {

        $posts = Post::onlyTrashed()->get() ;
        return view('admin.posts.trashed')->with('posts',$posts) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all() ;

        if( $categories->count() == 0){

            Session::flash('info','You have to create some categories first') ;
            return redirect()->back() ;
        }

        return view('admin.posts.create')->with('categories',Category::all())
                                        ->with('tags', Tag::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]) ;

        $featured  = $request->featured ;

        $featured_new_name = time().$featured->getClientOriginalName() ;

        $featured->move('uploads/posts', $featured_new_name) ;
        
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content ,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]) ;

        $post->tags()->attach( $request->tags) ;

        Session::flash('success','Post created!');

        return redirect()->route('posts.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.posts.edit')
        ->with('post', Post::find($id))
        ->with('categories',Category::all())
        ->with('tags',Tag::all())  ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]) ;


        $post = Post::find($id) ;        
        if( $request->hasFile('featured')){
            $featured  = $request->featured ;

            $featured_new_name = time().$featured->getClientOriginalName() ;

            $featured->move('uploads/posts', $featured_new_name) ;
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title ;
        $post->content = $request->content ;
        
        $post->category_id = $request->category_id ;
        $post->slug = str_slug($request->title) ;
        
        $post->save() ;

        $post->tags()->sync($request->tags) ;

        Session::flash('success','Post updated!');

        return redirect()->route('posts.index') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        Post::destroy($id) ;

        Session::flash('success','Post trashed!') ;

        return redirect()->route('posts.index') ;
    }

    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first() ;
        
        $post->forceDelete() ;
        Session::flash('success','Post removed!') ;



        return redirect()->route('posts.trashed') ;
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first() ;

        $post->restore() ;

        Session::flash('success','Post restored!') ;

        return redirect()->route('posts.index') ;
    }
}
