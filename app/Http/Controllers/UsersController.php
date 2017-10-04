<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Micropost;

class UsersController extends Controller{
  public function index(){
    $users = User::paginate(10);
    return view('users.index', ['users' => $users,]);
  }
  
  public function show($id){
    $user = User::find($id);
    $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
    $count_microposts = $user->microposts()->count();
    
    $data = ['user' => $user, 'microposts' => $microposts,];
    
    $data += $this->counts($user);
    
    return view('users.show', $data);
  }
  
  public function followings($id){
    $user = User::find($id);
    $followings = $user->followings()->paginate(10);
    
    $data = [
      'user' => $user,
      'users' => $followings,
    ];
    
    $data += $this->counts($user);
    
    return view('users.followings', $data);
  }
  
  public function followers($id){
    $user = User::find($id);
    $followers = $user->followers()->paginate(10);
    
    $data = [
      'user' => $user,
      'users' => $followers,
    ];
    $data += $this->counts($user);
    
    return view('users.followers', $data);
  }
  
  public function favolite_micropost($id){
    $user = User::find($id);
    $favolite_micropost = $user->favolite_micropost()->paginate(10);
    
    $data = [
      'user' => $user,
      'microposts' => $favolite_micropost,
    ];
    
    $data += $this->counts($user);
    
    return view('users.favolite_micropost', $data);
  }
}