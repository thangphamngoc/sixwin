<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tasks;

class TasksController extends Controller
{
	// function __construct()
	// {
	// 	$this->middleware('auth:api');
	// }
    public function index()
    {
        $list = Tasks::paginate(5);
        return $list;
    }

    public function store(Request $request)
    {
        
        dd($request);
        $request->validate([
            // 'Ten' => 'required|unique:LoaiTin,Ten|min:3|max:15',
            // 'name' => ['required', 'string', 'min:3|max:255'],
            'name' => ['required','min:3','max:255'],
            'content' => ['required','min:3','max:5000'],
            'link_sound' => ['required','min:3','max:255'],
        ],
        [
            'name.required'=>'Bạn chưa nhập tên task',
            'name.min'=>'Bạn nhập quá ít ký tự',
            'name.max'=>'Bạn nhập vượt quá số ký tự',
            'content.required'=>'Bạn chưa nhập nội dung task',
            'content.min'=>'Bạn nhập quá ít ký tự',
            'content.max'=>'Bạn nhập vượt quá số ký tự',
            'link_sound.required'=>'Bạn chưa nhập link âm thanh',
            'link_sound.min'=>'Bạn nhập quá ít ký tự',
            'link_sound.max'=>'Bạn nhập vượt quá số ký tự',
        ]);
        $task = new Tasks;
        $task->name = $request->name;
        $task->content = $request->content;
        $task->link_sound = $request->link_sound;
        $task->status =0;
        $task->save();
        return $task;

}


    public function show($id)
    {
        //
        // dd($id);
        // return view('/detail-task',['id' => $id]);
       // return view('/detail-task');
        // return View('/detail-task');
        // return redirect('/detail-task');
        $list = Tasks::findOrFail($id);
        return $list;
    }

    public function edit(Tasks $tasks)
    {
        //
    }


    public function update(Request $request,$id)
    {
        dd($request);
        //
        // $user = auth('api')->user();
        // dd($request);

        // $role_id = \DB::table('roles')->whereIn('name',$request->roles)->pluck('id');
        $request->validate([
            // 'Ten' => 'required|unique:LoaiTin,Ten|min:3|max:15',
            // 'name' => ['required', 'string', 'min:3|max:255'],
            'name' => ['required','min:3','max:255'],
            'content' => ['required','min:3','max:5000'],
            'link_sound' => ['required','min:3','max:255'],
        ],
        [
            'name.required'=>'Bạn chưa nhập tên task',
            'name.min'=>'Bạn nhập quá ít ký tự',
            'name.max'=>'Bạn nhập vượt quá số ký tự',
            'content.required'=>'Bạn chưa nhập nội dung task',
            'content.min'=>'Bạn nhập quá ít ký tự',
            'content.max'=>'Bạn nhập vượt quá số ký tự',
            'link_sound.required'=>'Bạn chưa nhập link âm thanh',
            'link_sound.min'=>'Bạn nhập quá ít ký tự',
            'link_sound.max'=>'Bạn nhập vượt quá số ký tự',
        ]);
        $task = Tasks::findOrFail($id);
        $task->name = $request->name;
        $task->content = $request->content;
        $task->link_sound = $request->link_sound;
        $task->save();
        return $task;
    }


    public function destroy($id)
    {
        //
        $task = Tasks::where('id',$id)->delete();

    }
    public function xuly(){
    $data= Tasks::all();
    dd($data)
;   $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.fpt.ai/hmi/tts/v5',
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'a hi hi',
      CURLOPT_HTTPHEADER => array(
        'api-key: rGYRC6j4IJVCtO6wgIOkgyFUrr6TBVUS',
        'speed: ',
        'voice: male'
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo 'cURL Error #:' . $err;
    } else {
      echo $response;
    }
    }
}
