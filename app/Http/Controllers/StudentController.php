<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $students = new Student;
        $students->name = $request->name;
        $students->roll = $request->roll;
        $students->mobile = $request->mobile;
        return view('student.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Student;

        $this->validate($request, [
            'name' => 'required|max:25',
            'roll' => 'required|max:2',
            'mobile' => 'required|max:11'
        ]);

        $students->name = $request->name;
        $students->roll = $request->roll;
        $students->mobile = $request->mobile;
       
        
        

        if($students->save())
        {
            return redirect('student')->with('insertmessage','Data Inserted Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {   
        $students = Student::find($id);
        return view('student.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = Student::find($id);
        $students->name = $request->get('name');
        $students->roll = $request->get('roll');
        $students->mobile = $request->get('mobile');

     

        $students->save();
        return redirect('student')->with('updatemessage', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::find($id);

        $students->delete();

        return redirect('student')->with('deletemessage', 'Delete Successfully');
    }
}
return redirect();