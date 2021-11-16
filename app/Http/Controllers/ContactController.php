<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function getContactsList(Request $request){
        //Gọi Model lấy tất cả data
        $contacts = Contact::all();
       //Truyền data vào view
        return view('contact.index')->with('contacts', $contacts);
    }


    public function deleteRecord(Request $request) {
        //Xác định ID từ request và dùng Model xóa trong database
        $id = $request ->id;
        Contact::find($id)->delete();

        return redirect()->route('contacts.show');
    }

    public function openAddForm(Request $request) {
        return view('contact.add');
    }

    public function submitAddForm(Request $request){
        
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email:rfc,dns',
            'title' => 'max:255',
            'content' => 'required'
        ]);

        $record = new Contact();

        $record->email = $request->email;
        $record->contact_name = $request->name;
        $record->title = $request->title;
        $record->content = $request->content;
        $record->save();
        
        return redirect() ->route('contacts.show');
    }

    public function openEditForm(Request $request) {
        
        $record = Contact::find($request->id);
        if ($record === null){            
            abort(404);            
        }

        $name = $record->contact_name;
        $email = $record->email;
        $title = $record->title;
        $content = $record->content;

        return view('contact.edit', ['name'=>$name, 'email' => $email, 'title'=>$title, 'content'=>$content]);

    }


    public function submitEditForm(Request $request) {
        //Check ID exist
        $id = $request->id;
        if ($id === null){
            abort(404,'ID required');            
        } 
        //Validate input
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email:rfc,dns',
            'title' => 'max:255',
            'content' => 'required'
        ]);         

        $record = Contact::find($id);
        if ($record === null){            
            abort(404,'Could not find ID in database');            
        }          

        $record->email = $request->email;
        $record->contact_name = $request->name;
        $record->title = $request->title;
        $record->content = $request->content;
        $record->save();
        

        return redirect()->route('contacts.edit',['id' => $id])->with('statusMessage','Edit successful');
    }
}
