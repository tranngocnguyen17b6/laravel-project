@extends('layouts.app')
@section('content')
@php
    $ai1="";
    $ai2="";
    $ai3="";
    //isset($question_title) ? $question_title : $question_title="";
    //isset($question_typeof) ? $question_typeof : $question_typeof="";
    $address_id=$address->pluck('address_id');
    $address_name=$address->pluck('name_address');
    //dd($address->pluck('name_address'));
@endphp
<div class="format-container">
    <div class="search-div mb-10">
        <h4>会員園一覧</h4>
    </div>
    <div class="div-from-search mb-10">
        <form action="school">
            <div class="inline-block">
                <label class="mr-10" for="">住所</label>
                <select name="address_id" class="select">
                    <option value=""></option>
                    @foreach ($address as $values )
                        <option value="{{ $values['address_id'] }}">{{ $values['name_address'] }}</option>
                    @endforeach
                    {{--@switch($question_typeof)
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
                    <option value="radio" {{ $ai3 }}>radio</option> --}}
                </select>
               </div>
               <div class="inline-block ml-45">
                <label class="mr-10" for="">キーワード</label>
                <input class="input" type="text" name="search" id="" value="">
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
                        <th>保育施設名</th>
                        <th>電話番号</th>
                        <th>Email</th>
                        <th>住所</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $school as  $values )
                    <tr>
                        <td class="text-center">{{ $values["school_id"] }}</td>
                        <td class="text-left">{{ $values["school_name"] }}</td>
                        <td class="text-center">{{ $values["school_phone"] }}</td>
                        <td class="text-left">{{ $values["school_mail"] }}</td>
                        <td class="text-left">
                           @for ($i=0;$i<count($address);$i++)
                               @if ($values['address_id']==$address_id[$i])
                                   {{ $address_name[$i] }}
                               @else
                                    {{ '' }}    
                               @endif
                           @endfor
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
            {{$school->appends(array( ))->links() }}
        </div>
    </div>
</div>

<script language="javascript" src="{{ asset('js/format/index.js') }}"
@endsection