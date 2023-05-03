@extends('layouts.app')
@section('content')
{{ $ai1=""}}
{{ $ai2=""}}
{{ $ai3=""}}
@php
     $ai_duress1="";
     $ai_duress2= "";
     $ai_other1="";
     $ai_other0="";
     $i=0;
    $old = session()->getOldInput();
    $answer_title=$answer->pluck('answer_title');
@endphp
<div class="format-container">
    <div class="title mb-20">
        <h4>フォーマット新規登録</h4>
    </div>
    <form id="my-form" action="/format/{{ $question->question_id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-10">
        <div class="div-input-create">
            <div class="title-div-20 inline-block"><label class="div-right" for="">タイトル</label></div>
            <div class="input-div-70 inline-block ">
                <textarea class="textarea" name="question_title"  id="" >{{ old('question_title', $question->question_title)}}</textarea>
                <div class="div-err-span mb-10"> @error('question_title') <span class="err-span err-id"> {{ $message }} </span> @enderror </div>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
    <div class="mb-10">
        <div class="div-input-create">
            <div class="title-div-20 inline-block"><label class="div-right" for="">入力形式</label></div>
            <div class="input-div-70 inline-block ">

                @switch(old('question_typeof', $question->question_typeof))
                    @case('form')
                        @php $ai1="selected"  @endphp
                        @break
                    @case('checkbox')
                        @php $ai2="selected"  @endphp  
                        @break
                    @case('radio')
                        @php $ai3="selected"  @endphp  
                        @break    
                @endswitch
                <select name="question_typeof" id="select-answer"class="select">
                    <option value="form" {{ $ai1 }}>Form</option>
                    <option value="checkbox" {{ $ai2 }}>Check box</option>
                    <option value="radio" {{ $ai3 }}>Radio</option>
                </select>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>



    <div id="create-radio" class="mb-10">
        <div class="div-input-create">
            <div class="title-div-20 inline-block"><label class="div-right" for="">選択項目</label></div>
            <div class="input-div-70 inline-block ">

                <div class="mb-10"><button id="add-input" type="button" class="btn blue">追加</button></div>

                <div class="mb-10" id="notification-limit"><span class="err-span">10 行までしか入力できません</span></div>
                @if(!old('question_typeof') && count($answer) == 0)
                    <div class="mb-10"><input name="answer_title[]" value="" class="input count-input" type="text"></div>
                    <div class="mb-10"><input name="answer_title[]" value="" class="input count-input" type="text"></div>
                @endif
               
                <div id="create-input" class="mb-10">
                    @switch(old('question_typeof', $question->question_typeof))
                        @case('form')
                            @break
                        @case('checkbox')
                                @if (old('answer_title') && count(old('answer_title')) > 0)
                                    @php $count= count(old('answer_title'));@endphp 
                                    @for( $i=0; $i<$count; $i++)
                                        <div class="mb-10" number='stt-{{ $i }}'>
                                            <input name="answer_title[]" value="{{ $old['answer_title'][$i] }}" class="input count-input" type="text">  
                                            @php
                                            if($i>1)
                                            {
                                                $btn="<button style='background-color: #e884f8' id='remove-input' type='submit' class='btn'>削除</button>" ;
                                            }
                                            else {
                                                $btn="" ;
                                            }
                                        @endphp
                                        @php
                                            echo $btn;
                                        @endphp
                                        <div class=""><div class="div-err-span mb-10"> @error('answer_title.'.$i) <span class="err-span err-id"> {{ $message }} </span> @enderror </div></div>
                                        </div>
                                    @endfor
                                @else
                                   @php
                                       $count= count($answer);
                                   @endphp 
                                    @for( $i=0; $i<$count; $i++)
                                    <div class="mb-10" number='stt-{{ $i }}'>
                                        <input name="answer_title[]" value="{{ $answer_title[$i] }}" class="input count-input" type="text">
                                        @php
                                            if($i>1)
                                            {
                                                $btn="<button style='background-color: #e884f8' id='remove-input' type='submit' class='btn'>削除</button>" ;
                                            }
                                            else {
                                                $btn="" ;
                                            }
                                        @endphp
                                        @php
                                            echo $btn;
                                        @endphp
                                        <div class=""><div class="div-err-span mb-10"> @error('answer_title.'.$i) <span class="err-span err-id"> {{ $message }} </span> @enderror </div></div>
                                    </div>
                                    @endfor
                                @endif
                            @break
                        @case('radio')
                        @if (old('answer_title') && count(old('answer_title')) > 0)
                                    @php $count= count(old('answer_title'));@endphp 
                                    @for( $i=0; $i<$count; $i++)
                                        <div class="mb-10" number='stt-{{ $i }}'>
                                            <input name="answer_title[]" value="{{ $old['answer_title'][$i] }}" class="input count-input" type="text">  
                                            @php
                                            if($i>1)
                                            {
                                                $btn="<button style='background-color: #e884f8' id='remove-input' type='submit' class='btn'>削除</button>" ;
                                            }
                                            else {
                                                $btn="" ;
                                            }
                                        @endphp
                                        @php
                                            echo $btn;
                                        @endphp
                                        <div class=""><div class="div-err-span mb-10"> @error('answer_title.'.$i) <span class="err-span err-id"> {{ $message }} </span> @enderror </div></div>
                                        </div>
                                    @endfor
                                @else
                                   @php
                                       $count= count($answer);
                                   @endphp 
                                    @for( $i=0; $i<$count; $i++)
                                    <div class="mb-10" number='stt-{{ $i }}'>
                                        <input name="answer_title[]" value="{{ $answer_title[$i] }}" class="input count-input" type="text">
                                        @php
                                            if($i>1)
                                            {
                                                $btn="<button style='background-color: #e884f8' id='remove-input' type='submit' class='btn'>削除</button>" ;
                                            }
                                            else {
                                                $btn="" ;
                                            }
                                        @endphp
                                        @php
                                            echo $btn;
                                        @endphp
                                        <div class=""><div class="div-err-span mb-10"> @error('answer_title.'.$i) <span class="err-span err-id"> {{ $message }} </span> @enderror </div></div>
                                    </div>
                                    @endfor
                                @endif
                            @break
                    @endswitch
                </div>
                <div class="clear-fix"></div>
            </div>
        </div>
    </div>
    <div id="other-input" class="mb-10">
        <div class="div-input-create">
            {{-- <div class="title-div-20 inline-block"><label class="div-right" for="">その他の項目</label></div> --}}
            <div class="input-div-70 inline-block ">
                @switch(old('other_radio', $question->question_status))
                    @case(0)
                        @php $ai_other0="checked"  @endphp
                        @break
                    @case(1)
                        @php $ai_other1="checked"  @endphp  
                        @break   
                @endswitch
                <div class="mb-10"><input type="radio" name="other_radio" value="1" {{ $ai_other1 }}> その他＋入力フォームを表示する</div>
                <div class="mb-10"><input type="radio" name="other_radio" value="0" {{ $ai_other0 }}> その他＋入力フォームを表示する</div>
            </div>
            {{-- <div class="clear-fix"></div> --}}
        </div>
    </div>
    <div class="mb-10">
        <div class="div-input-create">
            <div class="title-div-20 inline-block"><label class="div-right" for="">その他の項目</label></div>
            <div class="input-div-70 inline-block ">
              
                @switch(old('duress', $question->question_duress))
                    @case(0)
                        @php $ai_duress1="checked"  @endphp
                        @break
                    @case(1)
                        @php $ai_duress2="checked"  @endphp  
                        @break   
                @endswitch
                <input type="radio" name="duress" value="0" {{ $ai_duress1 }}> 無し
                <input type="radio" name="duress" value="1" {{ $ai_duress2 }}> 有り
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
    <div id="fix" class="mb-10">
            <div  style="margin-top: -36px;" class="title-div-20 inline-block"><label class="div-right" for="">必須処理</label></div>
           
        </div>
</div>
    
    
    <div class="mb-10">
        <div class="div-input-create">
            <div class="input-div-70 flex">
                <div class="div-a"><a href="/format" class="btn-big mr-10 gray" href="">戻る</a></div>
                <div class="div-b"><button style="width: 90px; height: 42px;"type="submit" form="my-form" class="btn-big gray">保存</button></div>
            </div>
        </div>
    </div>
    </form>
    
</div>


<script language="javascript" src="{{asset('js/format/format.js') }}"></script>
@endsection
