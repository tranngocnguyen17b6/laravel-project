@extends('layouts.app')
@section('content')
@php
    $ai1="";
    $ai2="";
    $ai3="";
    isset($question_title) ? $question_title : $question_title="";
    isset($question_typeof) ? $question_typeof : $question_typeof="";
@endphp
<div class="format-container">
    <div class="search-div mb-10">
        <h4>フォーマット一覧</h4>
    </div>
    <div class="div-from-search mb-10">
        <form action="format">
            <div class="inline-block">
                <label class="mr-10" for="">入力形式</label>
                <select name="question_typeof" class="select">
                    @switch($question_typeof)
                        @case('form')
                            @php
                                $ai1="selected"
                            @endphp
                            @break
                        @case('checkbox')
                            @php
                                $ai2="selected"
                            @endphp
                            @break
                        @case('radio')
                            @php
                                $ai3="selected"
                            @endphp
                            @break
                    @endswitch
                    <option value="form" {{ $ai1 }}>Form</option>
                    <option value="checkbox" {{ $ai2 }}>Checkbox</option>
                    <option value="radio" {{ $ai3 }}>radio</option>
                </select>
               </div>
               <div class="inline-block ml-45">
                <label class="mr-10" for="">キーワード</label>
                <input class="input" type="text" name="question_title" id="" value="{{ $question_title }}">
               </div>
               <div class="inline-block ml-45">
                <button type="submit" class="btn blue"> 検索 </button>
               </div>
        </form>
    </div>

    <div class="mb-10">
        <hr class="line">
    </div>

    <div class="div-table mb-10">
        <div class="create-btn-div mb-10">
            <a href="/format/create" class="btn green create-btn">新規登録</a>
            <div class="clear-fix"></div>
        </div>
        <div class="">
            <table class="table">
                <thead>
                    <tr class="">
                        <th>ID</th>
                        <th>入力形式</th>
                        <th>タイトル</th>
                        <th>複製</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $question as  $values )
                    <tr>
                        <td class="text-center">{{ $values["question_id"] }}</td>
                        <td class="text-left">{{ $values["question_typeof"] }}</td>
                        <td class="text-left">{{ $values["question_title"] }}</td>
                        <td class="text-center" style="width: 5%">
                            <form action="/format/coppy/{{ $values['question_id'] }}" method="get">
                                @csrf
                                <input type="hidden" value="{{ $values["question_typeof"] }}" name="question_typeof">
                                <input type="hidden" value="{{ $values["question_title"] }}" name="question_title">
                                <button class="btn green" style="width: 44px; height:30px">複製</button>
                            </form>
                        </td>
                        <td class="text-center" style="width: 5%"><a class="btn yellow" href="/format/{{ $values["question_id"] }}/edit">編集</a></td>
                        <td class="text-center" style="width: 5%">
                            @php 
                                $idDelete = 'div-delete-'. $values["question_id"] ;
                                $idForm = "my-form-".$values["question_id"];
                            @endphp
                            <form id="{{ $idForm }}" method="post" action="/format/{{ $values["question_id"] }}">
                                @method('delete')
                                @csrf
                               
                                <button onclick="document.getElementById('{{ $idDelete }}').style.display='block'" style="width: 44px; height:30px" id="btn-delete" type="button" class="btn red">削除</button>
                                <div id='{{ $idDelete }}' class="mb-10 div-delete">
                                    <h5>削除しますか？</h5>
                                    <div class="inline-block">
                                        <button form="{{ $idForm }}" type="submit"  class="btn">はい</button>
                                        <button type="button" onclick="document.getElementById('{{ $idDelete }}').style.display='none'" class="btn">いいえ</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    <div style="width:100%"class="mb-20 inline-block">
        <div class="div-left">
            <label>{{ $total }} 件中 {{ $first }} から {{ $last }} </label>
        </div>
        <div class="div-right">
            {{$question->appends(array("question_typeof"=>$question_typeof, "question_title"=>$question_title ))->links() }}
        </div>
    </div>
</div>

<script language="javascript" src="{{ asset('js/format/index.js') }}"
@endsection