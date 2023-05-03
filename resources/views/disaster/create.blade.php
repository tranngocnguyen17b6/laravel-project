@extends('layouts.app')
@section('content')
@php
    isset($disaster_title) ? $disaster_title : $disaster_title="";
    $ai1="";
    $ai0="";
    $old = session()->getOldInput();
   //d($old);
   //dd(old('checkbox_question_id')[3]);

@endphp
<div class="format-container">
    <div class="search-div mb-10">
        <h4>カテゴリー管理</h4>
    </div>
    <form action="/disaster" method="POST" id="disaster-create"> 
        @csrf
    </form>
        <div class="mb-10">
        <div class="div-input-create">
            <div class="title-div-20 inline-block"><label class="div-right" for="">タイトル</label></div>
            <div class="input-div-70 inline-block ">
                <input form="disaster-create" class="input" type="text" name="disaster_title" value="{{ old('disaster_title') }}">
                <div class="div-err-span mb-10"> @error('disaster_title') <span class="err-span err-id"> {{ $message }} </span> @enderror </div>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
    <div class="mb-10">
        <div class="div-input-create">
            <div class="title-div-20 inline-block"><label class="div-right" for="">公開状況</label></div>
            <div class="input-div-70 inline-block ">
                @switch(old('status'))
                    @case(1)
                            @php
                                $ai1="checked"
                            @endphp 
                        @break
                    @case(0)
                            @php
                                $ai0="checked"
                            @endphp 
                        @break
                @endswitch
                <input form="disaster-create" type="radio" name="status" value="1" {{ $ai1 }}> 公開 
                <input form="disaster-create" type="radio" name="status" value="0" {{ $ai0 }}> 非公開1111
                <div class="div-err-span mb-10"> @error('status') <span class="err-span err-id"> {{ $message }} </span> @enderror </div>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>

    <div class="mb-10">
        <hr >
    </div>
    <div class="div-table mb-10">
        <div class="create-btn-div mb-10">
            <h4>登録フォーマット</h4>
            <div class="clear-fix"></div>
        </div>
        <div class="">
            <table class="table" id="sortable">  
                <thead>
                    <tr>
                        <tr class="">
                        <th style="width: 7%">表示順</th>
                        <th style="width: 12%">公開設定</th>
                        <th>Q.タイトル</th>
                    </tr> 
                </thead>
                <tbody class="connectedSortable"> 
                    @php $number=1; //dd($question['question_id'])
                    @endphp
                    

                    @if (old('checkbox_question_id') ) 
                     {{-- vòng lặp show các câu hỏi dc chọn --}}
                     @foreach ($question as $values)
                     <tr class="tr" >
                        <td class="num-row text-center"></td>
                        <td class="td text-center">
                            <input form="disaster-create" name="checkbox_question_id[]" type="checkbox" value="{{ $values['question_id'] }}"
                                @for ($j=0; $j<count(old('checkbox_question_id')); $j++)
                                    @if (old('checkbox_question_id')[$j] == $values['question_id'])
                                        {{ 'checked' }}
                                    @else
                                        {{ '' }}    
                                    @endif
                                @endfor    
                            >
                        </td>
                        <td data-taskid="" class="taskSingleInline" class="td text-left">{{ $values["question_title"] }}</td>
                        @php
                            $number++;
                        @endphp
                    </tr>
                    @endforeach

                    @else
                    @foreach ($question as $values)
                        <tr class="tr" >
                            <td class="num-row text-center"></td>
                            <td class="td text-center"><input form="disaster-create" name="checkbox_question_id[]" type="checkbox" value="{{ $values['question_id'] }}"></td>
                            <td data-taskid="" class="taskSingleInline" class="td text-left">{{ $values["question_title"] }}</td>
                            @php
                                $number++;
                            @endphp
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table> 
        </div>
    </div>
    <div style="width:100%"class="mb-20 inline-block">
        <div class="div-left">
            <label>{{ $total }} 件中  </label>
        </div>
        <div class="div-right">
        </div>
    </div>
    <div class="mb-10">
        <div class="div-input-create">
            <div class="input-div-70 flex">
                <div class="div-a"><a href="/disaster" class="btn-big mr-10 gray" href="">戻る</a></div>
                <div class="div-b"><button style="width: 90px; height: 42px;"type="submit" form="disaster-create" class="btn-big gray">保存</button></div>
            </div>
        </div>
    </div>
</div>
<script language="javascript" src="{{asset('js/disaster/disaster.js') }}"></script>

@endsection