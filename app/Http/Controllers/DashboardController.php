<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Content;
use App\Recombee;
use DB;
use Redirect;

class DashboardController extends Controller
{
    public function index() {
        $users = DB::table("users")->get();
        $contents = [];
        return view("components.dashboard")->with("users", $users)->with("contents", $contents);
    }
    public function users() {
        $users = DB::table("users")->get();
        
        return view("components.users")->with("users", $users);
    }
    public function contents() {
        $contents = DB::table("contents")->get();

        return view("components.contents")->with("contents", $contents);
    }
    public function addData() {
        $users = DB::table("users")->get();
        $contents = DB::table("contents")->get();

        return view("components.addData")->with("contents", $contents)->with("users", $users);
    }
    public function viewData() {
        $data = DB::table("recombees")->get(); 

        return view("components.viewData")->with("data", $data);
    }

    public function submitData(Request $request) {
        $data = $request->all();

        $request->validate([
            'user' => ['required',"string"],
            'content' => ['required', "string"]
        ]);

        Recombee::create([
            'user_id' => $data['user'],
            'content_id' => $data['content']
        ]);

        return Redirect::route("viewData")->with("message",$data['user'] . " Viewed " . $data['content']);
    }
    public function randAdd(Request $request) {
        $data = $request->all();

        $request->validate([
            'number' => ['required',"integer"], 
        ]);

        for($i=0;$i<$data['number'];$i++) {
            $user = DB::table("users")->inRandomOrder()->first();
            $content = DB::table("contents")->inRandomOrder()->first();

            Recombee::create([
                'user_id' => $user->id,
                'content_id' => $content->id
            ]);
        }
        return Redirect::route("viewData")->with("message", $data['number'] ." Added");
    }
    public function resetData() {
        $client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]); 
        $data = Recombee::all();
        $request = $client->post('localhost:5000/reset', ['body' => json_encode(  
            $data
        )]);
        $response = $request->getBody()->getContents();
        
        return Redirect::route("dashboard")->with("message" , $response);
    }

    public function getRecom(Request $request) {
        $data = $request->all();
        $client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]); 

        $request = $client->post('localhost:5000', ['body' => json_encode(  
            ['user' => $data['user']]
        )]);
        $response = (string) $request->getBody()->getContents();
    
        $array = json_decode($response, true);
        
        $users = DB::table("users")->get(); 
        if($array ==  null) {
            $contents = [];

            return view("components.dashboard")->with("users", $users)->with("contents", $contents)->with("message","Failed to get Recommdation");
        } else {
            $contents = Content::find($array['recomms']);

            return view("components.dashboard")->with("users", $users)->with("contents", $contents)->with("message","Failed to get Recommdation");
        }
    }
}
