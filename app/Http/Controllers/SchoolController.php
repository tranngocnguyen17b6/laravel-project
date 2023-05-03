<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Address;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($_GET);
        isset($_GET['address_id']) ? $address_id= $_GET['address_id'] : $address_id="";
        isset($_GET['search']) ? $search= $_GET['search'] : $search="";
         $school=School::select('*');
         if($title = request()->$search){
             $school = $school->where("school_name","LIKE","%".$title."%")
             ->where("school_phone","LIKE","%".$title."%")
             ->where("school_mail","LIKE","%".$title."%");
             }
        // if($typeOf =  request()->$school_typeof)
        //  {
        //      $school = $school->where("$school_typeof", $typeOf);
        //  }
        $total=$school->count();
        $school = $school->paginate(5);
        $first= $school->firstItem();
        $last=$school->lastItem();

        $address=Address::all();
        
             
        return view('school.index',['school'=>$school, 'total'=>$total, 'first'=>$first, 'last'=>$last, 'address'=>$address]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
