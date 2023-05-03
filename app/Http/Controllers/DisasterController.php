<?php

namespace App\Http\Controllers;
use App\models\Disaster;
use App\models\Disaster_question;
use App\models\Question;
use App\Http\Requests\DisasterValidationRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DisasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        isset($_GET['disaster_title']) ? $disaster_title= $_GET['disaster_title'] : $disaster_title="";

        $disaster=Disaster::select('*');
        if($title = request()->disaster_title){
            $disaster = $disaster->where("disater_tiltle","LIKE","%".$title."%");
            }
        $total=$disaster->count();
        $disaster = $disaster->paginate(5);
        $first= $disaster->firstItem();
        $last=$disaster->lastItem();
            
        //dd($first);
        return view('disaster.index', ['disaster'=>$disaster, 'total'=>$total, 'first'=>$first, 'last'=>$last, 'disaster_title'=>$disaster_title, ])->with('i', (request()->input('page', 1)-1)*5);//;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $question=Question::all();
        $total=$question->count();
        return view('disaster.create',['total'=>$total, 'question'=>$question, ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DisasterValidationRequest $request)
    {
        //dd($_POST['checkbox_question_id']);
        $disaster=Disaster::create([
            'disater_tiltle'=>$request->input('disaster_title'),
            'disater_status'=>$request->input('status'),
        ]); 
        $disaster->save();

        $id=$disaster['disater_id'];
       //dd($disaster['disater_id']);
       if(isset($_POST['checkbox_question_id']))
       {
        $count=count($request->input('checkbox_question_id'));
        for($i=0;$i<$count;$i++){
            $disaster_category=Disaster_question::create([
                'question_id'=>$_POST['checkbox_question_id'][$i],
                'disater_id'=>$id,
            ]); 
            $disaster_category->save();
        }
       }
        return redirect('/disaster');
   }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $disaster=Disaster::find($id);
        $question=Question::all();
        $disaster_category=Disaster_question::selectRaw('question_id')->where("disater_id",$id)->get();
        $total=$question->count();
        //dd($disaster);
        return view('disaster.edit', ['question'=>$question, 'disaster'=>$disaster, 'total'=>$total, 'disaster_category'=>$disaster_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DisasterValidationRequest $request, string $id)
    {
        //dd($_POST);
        $disaster=Disaster::where("disater_id","=",$id)
       ->update([
        'disater_tiltle'=>$request->input('disaster_title'),
        'disater_status'=>$request->input('status'),
       ]);
       $check_exist=Disaster_question::selectRaw("id_disater_question")->where("disater_id","=",$id)->get();
       $arr=$check_exist->pluck('id_disater_question');
       //dd($arr);
       if(count($arr)>0)
       {
        for($i=0;$i<count($arr);$i++)
        {
            $delete_disaster_question=Disaster_question::find($arr[$i])->delete();
        }
       }
       
       if(isset($_POST['checkbox_question_id']))
       {
        $count=count($request->input('checkbox_question_id'));
        for($i=0;$i<$count;$i++){
            $disaster_category=Disaster_question::create([
                'question_id'=>$_POST['checkbox_question_id'][$i],
                'disater_id'=>$id,
            ]); 
            $disaster_category->save();
        }
       }
        return redirect('/disaster');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disaster=Disaster::find($id)->delete();
        $check_exist=Disaster_question::selectRaw("id_disater_question")->where('disater_id',"=","$id")->get();
        $arr=$check_exist->pluck('id_disater_question');
        //dd($arr);
        if(count($arr)>0)
        {
            for($i=0;$i<count($arr);$i++)
            {
                $disaster_question=Disaster_question::find($arr[$i])->delete();
            }
        }
        
        return redirect('disaster');
    }

    public function coppy(string $id)
    {
       // dd($_GET);
        $disaster=Disaster::create([
            'disater_tiltle'=>$_GET['disaster_title'],
            'disater_status'=>$_GET['disater_status'],
        ]);
        $disaster->save();
        $id_disaster=$disaster['disater_id'];
        $disaster_category=Disaster_question::selectRaw('question_id')->where("disater_id",$id)->pluck("question_id");
        
        //$answer_title=Answer::select()->where('question_id',$question_id)->pluck("answer_title");
        //dd($disaster_category);
            for($i=0;$i<count($disaster_category);$i++)
            {
                $save_disater_question=Disaster_question::create([
                    'disater_id'=>$id_disaster,
                    'question_id'=>$disaster_category[$i],
                ]);
                $save_disater_question->save();
            } 
            return redirect('/disaster');
    }
}



