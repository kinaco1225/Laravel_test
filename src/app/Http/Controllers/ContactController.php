<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request) 
    {
        $contact = $request->only(['last_name', 'first_name','gender','email','tel1', 'tel2', 'tel3', 'address','building', 'category_id', 'detail']);

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category->content;

        $gender_raw = $contact['gender']; 

        $gender_jp = match ($contact['gender']) {
            'male' => '男性',
            'female' => '女性',
            'other' => 'その他',
        };

        $contact['gender_raw'] = $gender_raw;
        $contact['gender'] = $gender_jp;

        return view('confirm',compact('contact'));
    }

    public function store(ContactRequest $request) 
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1',
        'tel2','tel3','address', 'building', 'category_id', 'detail']);

        $contact['tel'] = $contact['tel1'].'-'. $contact['tel2'] . '-' . $contact['tel3'];
        
        $gender_map = [
            'male' => '1',
            'female' => '2',
            'other' => '3',
        ];

        $contact['gender'] = $gender_map[$contact['gender']];

        $data = [
            'last_name' => $contact['last_name'],
            'first_name' => $contact['first_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tel' => $contact['tel'],
            'address' => $contact['address'],
            'building' => $contact['building'],
            'category_id' => $contact['category_id'],
            'detail' => $contact['detail'],
        ];

        Contact::create($data);
        /* return $data;  */

        return view('thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')->withInput($request->all());
    }
}
