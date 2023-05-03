<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\models\Question;
use App\models\Answer;
use App\Http\Requests\FormatValidationRequest;
use Illuminate\Support\Facades\DB;

class FormatController extends Controller
{
    public function index()
    {   
        //dd($_GET);
        isset($_GET['question_typeof']) ? $question_typeof= $_GET['question_typeof'] : $question_typeof="";
        isset($_GET['question_title']) ? $question_title= $_GET['question_title'] : $question_title="";
        $question=Question::select('*');
        if($title = request()->question_title){
            $question = $question->where("question_title","LIKE","%".$title."%");
            }
            if($typeOf =  request()->question_typeof)
        {
            $question = $question->where("question_typeof", $typeOf);
        }
            $total=$question->count();
            $question = $question->paginate(5);
            $first= $question->firstItem();
            $last=$question->lastItem();
            
        //dd($first);
        return view('format.index', ['question'=>$question, 'total'=>$total, 'first'=>$first, 'last'=>$last, 'question_title'=>$question_title, 'question_typeof'=>$question_typeof])->with('i', (request()->input('page', 1)-1)*5);//;
    }


    public function create()
    {
        return view('format.create');
    }


    public function store(FormatValidationRequest $request)
    {
       //dd(count($_POST));
        $question=Question::create([
            'question_title'=>$request->input('question_title'),
            'question_typeof'=>$request->input('question_typeof'),
            'question_duress'=>$request->input('duress'),
            'question_status'=>$request->input('other_radio'),
        ]); 
        $question->save();

        $id=$question['question_id'];
            if($request->input('question_typeof')=='radio' ||$request->input('question_typeof')=='checkbox')
            {
                for($i=0;$i<count($_POST['answer_title']);$i++)
                {
                    //$_POST["answer_title_$i"]
                    $answer=Answer::create([
                        'question_id'=>$id,
                        'answer_title'=>$_POST["answer_title"][$i],
                    ]);
                    $answer->save();
                } 
            }
            else{
                $answer=Answer::create([
                    'question_id'=>$id
                ]);
                $answer->save();
            }
            
        
      
        return redirect('/format');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question=Question::find($id);
        $answer=Answer::select()->where('question_id',"=","$id")->get();
        //dd($answer);
        return view('format.edit', ['question'=>$question, 'answer'=>$answer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormatValidationRequest $request, string $id)
    {
        //dd($_POST["answer_title"]);
       $question=Question::where("question_id","=",$id)
       ->update([
            'question_title'=>$request->input('question_title'),
            'question_typeof'=>$request->input('question_typeof'),
            'question_duress'=>$request->input('duress'), 
            'question_status'=>$request->input('other_radio'),
       ]);
       $check_exist=Answer::selectRaw("answer_id")->where('question_id',"=","$id")->get();
       $arr=$check_exist->pluck('answer_id');
       //dd($arr[0]);
       for($i=0;$i<count($arr);$i++)
       {
           $answer=Answer::find($arr[$i])->delete();
       }
       if($request->input('question_typeof')=='radio' ||$request->input('question_typeof')=='checkbox')
            {
                for($i=0;$i<count($_POST['answer_title']);$i++)
                {
                    //$_POST["answer_title_$i"]
                    $answer=Answer::create([
                        'question_id'=>$id,
                        'answer_title'=>$_POST["answer_title"][$i],
                    ]);
                    $answer->save();
                } 
            }
       return redirect('format');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question=Question::find($id)->delete();
        $check_exist=Answer::selectRaw("answer_id")->where('question_id',"=","$id")->get();
        $arr=$check_exist->pluck('answer_id');
        //dd($arr[0]);
        for($i=0;$i<count($arr);$i++)
        {
            $answer=Answer::find($arr[$i])->delete();
        }
        return redirect('format');
        
    }
        

    public function coppy(string $question_id)
    {
        $ques=Question::select()->where("question_id",$question_id);
        //$duress=$ques->pluck("question_duress");
        $duress=$ques->pluck("question_duress");
        //dd($ques->pluck("question_duress"));
        $question=Question::create([
            'question_title'=>$_GET['question_title'],
            'question_typeof'=>$_GET['question_typeof'],
            'question_duress'=>$duress[0],
        ]);
        $question->save();
        $id=$question['question_id'];
        //dd($id);
        
        $answer_title=Answer::select()->where('question_id',$question_id)->pluck("answer_title");
        //dd(count($answer_title));
            for($i=0;$i<count($answer_title);$i++)
            {
               
                $answer=Answer::create([
                    'question_id'=>$id,
                    'answer_title'=>$answer_title[$i],
                ]);
                $answer->save();
            } 
        return redirect('/format');
    }
}
