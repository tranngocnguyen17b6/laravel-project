@extends('layouts.app')
@section('content')
@php
    isset($disaster_title) ? $disaster_title : $disaster_title="";
@endphp
<div class="format-container">
    <div class="search-div mb-10">
        <h4>カテゴリー管理</h4>
    </div>
    <div class="div-from-search mb-10">
        <form action="disaster">
               <div class="inline-block ml-45">
                <label class="mr-10" for="">カテゴリー名</label>
                <input class="input" type="text" name="disaster_title" id="" value="{{ $disaster_title }}">
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
            <a href="/disaster/create" class="btn green create-btn">新規登録</a>
            <div class="clear-fix"></div>
        </div>
        <div class="">
            <table class="table">
                <thead>
                    <tr class="">
                        <th>ID</th>
                        <th>カテゴリー名</th>
                        <th style="width: 7%">公開状況</th>
                        <th>複製</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $disaster as  $values )
                    <tr>
                        <td class="text-center">{{ $values["disater_id"] }}</td>
                        <td class="text-left">{{ $values["disater_tiltle"] }}</td>
                        @php
                            if($values["disater_status"]==1)
                            {
                                $status="public";
                            }
                            else {
                                $status="private";
                            }
                        @endphp
                        <td style="width: 7%" class="text-center">{{ $status }}</td>
                        <td class="text-center" style="width: 7%">
                            <form action="/disaster/coppy/{{ $values['disater_id'] }}" method="get">
                                @csrf
                                <input type="hidden" value="{{ $values["disater_tiltle"] }}" name="disaster_title">
                                <input type="hidden" value="{{ $values["disater_status"] }}" name="disater_status">
                                <button class="btn green" style="width: 44px; height:30px">複製</button>
                            </form>
                        </td>
                        <td class="text-center" style="width: 7%"><a class="btn yellow" href="/disaster/{{ $values["disater_id"] }}/edit">編集</a></td>
                        <td class="text-center" style="width: 7%">
                            @php 
                                $idDelete = 'div-delete-'. $values["disater_id"] ;
                                $idForm = "my-form-".$values["disater_id"];
                            @endphp
                            <form id="{{ $idForm }}" method="post" action="/disaster/{{ $values["disater_id"] }}">
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
            {{$disaster->appends(array("disaster_title"=>$disaster_title ))->links() }}
        </div>
    </div>
</div>

<script language="javascript" src="{{ asset('js/format/index.js') }}"
@endsection