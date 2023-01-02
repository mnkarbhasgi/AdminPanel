<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Contactus;

class ProgramController extends Controller
{
    //get all data
    public function index(){
        $contact = Contactus::get()->toJson(JSON_PRETTY_PRINT);
        return view('contactuslist', ['data' => $contact]);
   // return response($contact, 200);
    }

    //get particular id data
    public function getcontact($id)
    {
        if (Contactus::where('id', $id)->exists()) {
            $contact = Contactus::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($contact, 200);
        } else {
            return response()->json([
                "message" => "Respected Contact Detail is not found"
            ], 404);
        }
    }
    //insert data
    public function stacreatecontact(Request $request)
    {
        $contact = new Contactus();
        $contact->name          = $request->name;
        $contact->email         = $request->email ;
        $contact->phone         = $request->phone;
        $contact->subject       = $request->subject;
        $contact->subject       = $request->subject;  
        $contact->message       = $request->message;
        $contact->ticketid       =substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10);
        $contact->status         ='new';
        $contact->priority       ='low';
        $contact->save();

        return response()->json([
            "message" => "New Contact inserted successfully"
        ], 201);
    }
}
