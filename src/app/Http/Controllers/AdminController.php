<?php

namespace App\Http\Controllers;

use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(8);
        return view('admin.index',compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $keyWord = $request->keyword;
        $gender = $request->gender;
        $category_id = $request->category_id;
        $date = $request->date;

        $categories = Category::all();

        $contacts = Contact::with('category')
        ->keywordSearch($keyWord)
        ->genderSearch($gender)
        ->CategorySearch($category_id)
        ->DateSearch($date)
        ->paginate(10);

        return view('admin.index', compact('contacts', 'categories','keyWord','gender','category_id', 'date'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect()->route('admin.index')->with('success', '削除しました。');
    }

    public function export(Request $request)
    {
        return Excel::download(new ContactsExport($request), 'contacts.xlsx');
    }

}
