<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Message;
use Validator;
use Auth;
use DB;

class UserController extends Controller
{
    public function userList(){
        $users = User::orderBy('id','ASC')->get();
        return view('back-end.users',compact('users'));
    }
    public function messages(){
        $user_id=  Auth::id();

        // Get the unique sets of tickers we need to fetch.
        $exchanges = Message::join('users as sender', 'sender.id', '=', 'messages.sender_id')
        ->select('sender.name as sender_name')
        ->where(function($q) use ($user_id) {
            $q->where('sender_id', $user_id)
            ->orWhere('receiver_id', $user_id);
        })->distinct('sender.name')->get();

        // $messages = DB::table('messages')
        // ->select('sender_id', 'receiver_id')
        // ->distinct()
        // ->get();

        // return $messages;
        // Create an empty collection to hold our latest ticker rows,
        // because we're going to fetch them one at a time. This could be
        // an array or however you want to hold the results.

        $users = new Collection();

        foreach ($exchanges as $exchange) {
        $users->add(
            // Find each group's latest row using Eloquent + standard modifiers.
            Message::join('users as sender', 'sender.id', '=', 'messages.sender_id')
            ->where([
                    // 'receiver.name' => $exchange->sender_id,
                    'sender.name' => $exchange->sender_name,
                ])
                ->select('messages.*','sender.name as sender_name','sender.email')
                ->latest()
                ->first()
            );
        }
        // return $users;

        return view('back-end.messages',compact('users'));
    }
public function ViewMessages($sender_id){
    $receiver_id=Auth::id();
    $messages= Message::
                join('users as sender', 'sender.id', '=', 'messages.sender_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.receiver_id')
                ->select('messages.*', 'sender.name as sender_name', 'receiver.name as receiver_name')
                ->where(function($q) use ($sender_id) {
                    $q->where('sender_id', $sender_id)
                    ->orWhere('receiver_id', $sender_id);
                })->where(function ($q) use ($receiver_id) {
                    $q->where('sender_id', $receiver_id)
                    ->orWhere('receiver_id', $receiver_id);
                })->orderBy('created_at', 'DESC')->get();

                foreach($messages as $message){
                    $u=Message::findOrFail($message->id);
                    $u->seen=1;
                    $u->save();

                }
                // return $messages;

    return view('back-end.viewMessages',compact('messages','sender_id'));
}

public function ReplyMessages(Request $request){
    // return $request;
    Validator::make($request->all(), [
        'message' => 'required',
        'receiver_id' => 'required',
    ])->validate();
    $message= new Message();
    $message->sender_id=  Auth::id();
    $message->receiver_id=$request->receiver_id;
    $message->message= $request->message;

    if ($request->file('image')) :

        $validation=Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,gif,png|max:2120',
        ])->validate(); 
    
            $requestImage = $request->file('image');
            $fileType = $requestImage->getClientOriginalExtension();
            $originalImageName = date('YmdHis') . rand(100, 150) . '.' . $fileType;
            $directory = 'image_gallery/';
            $originalImageUrl = $directory . $originalImageName;
            $imgOriginal=Image::make($requestImage)->stream();
            Image::make($requestImage)->save($originalImageUrl);
            $message->image = $originalImageUrl;
        endif;
    $message->save();

    return redirect()->back();

}

}
