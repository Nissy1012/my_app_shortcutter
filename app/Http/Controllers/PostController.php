<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;

class PostController extends Controller
{
     public function index(Request $request, Post $post)//インポートしたPostをインスタンス化して$postとして使用。
     {
          $keyword = $request->input('keyword');

          $query = Post::query();

          if(!empty($keyword)) {
               $query->where('place', 'LIKE', "%{$keyword}%")
                     ->orWhere('station', 'LIKE', "%{$keyword}%");
          }

          $match_posts = $query->get();
          
          
          return view('/posts/index')->with([
               'posts'=>$post->getPaginateByLimit(),
               'match_posts'=>$match_posts, 'keyword'=>$keyword
               ]);
     
     }
     
     public function show(Post $post)
     {
          return view('/posts/show')->with(['post' => $post]);
     }
     
     public function create()
     {
          return view('/posts/create');
     }
     
     public function store(Request $request, Post $post)
     {
          $input = $request['post'];
          //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
          if($request->file('image')){
               $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
               //画像のURLを画面に表示
               $input += ['image_url' => $image_url];
          }
          $post->fill($input)->save();
          return redirect('/posts/' . $post->id);
     }
     
}
