<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index(Request $request)
    {   
        $search = $request->input('search', '');

        if ($search !== "") {
            $data = Student::where('name','LIKE', "%$search%")->orWhere('email','LIKE',"%$search%")->orWhere('salary','LIKE',"%$search%")->orderBy('id', 'DESC')->paginate(10)->withQueryString();
        } else {
            $data = Student::orderBy('id', 'DESC')->paginate(10);
        }

        $noResults = empty($data->items());

        if($request->ajax()){
            return view('pagination_data', compact('search','data','noResults'));
        }

        return view('home', compact('search', 'data','noResults'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:students,email',
            'salary' => 'required|numeric',
        ]);

        //  dd($request->all());
        $data = new Student;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->salary = $request->salary;
        $data->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Student::where('id', $id)->first();
        return view('show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Student $student)
    // {
    //     //return view()
    // }
    public function edit($id)
    {
        $data = Student::where('id', $id)->first();
        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]+$/','min:3','max:25'],
            'email' => ['required','email','unique:students,email,' . $id],
            'salary' => ['required','numeric'],
        ]);


        $data = Student::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->salary = $request->salary;
        $data->save();


        return redirect()->route('home')->with('successful', 'Details edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $data = Student::where('id', $id)->first();
        $data->delete();

        return redirect()->route('home')->with('success', 'Data deleted successfully');
    }
}
