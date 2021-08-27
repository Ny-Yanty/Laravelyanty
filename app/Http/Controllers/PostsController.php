<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    $posts - Post::orderBy('title','desc')->paginate(10);
    return view('posts.index')->with('posts',$posts);
}
    @return
    public function create()
    {
       return view('posts.create');
    }
    @param
    @return

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'

        ]);
         $post = new Post;
         $post->title = $request->input('title');
         $post->body = $request->inout('body');
         $post->save();
          return redirect('/posts')->with('success','Post Created');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error ')
        }


        return view('posts.edit')->width('post',$post);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
            'cover_image' => 'image|nullable|max:1999  '
        ]);

    }
    public fucntion destroy($id)
    {
        if()$request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalImage();

            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file()'cover_image'->getOriginalClientExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);




        } else {
            $fileNameToStore ='noimage.jpg';
        }
        $post = Post::find($id);

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error ')
        }

        $post->delete();
        return  redirect('/posts')->with('success', 'Post Removed' );
    }

    show
    destroy


