<?php

namespace App\Http\Controllers\Web;

use App\Model\Major;
use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use validate;

class StudentController extends Controller
{
    public function index(){
        $majors=Major::all();
        return view('Student.student_create',compact('majors'));
    }
    public function getData(){
        $data=Student::with('major')->get();
        return $data;
//        return response()->json($data);
    }
    public function store(Request $request){
//        return response()->json($request->email);
//        dd($request->all());
        $vd=Validator::make($request->all(),[
            'name'=>'required',
            'student_id'=>'required',
            'email'=>'required',
            'password'=>'required',
//            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
//        $vd=$this->validate($request,[
//            'name'=>'required',
//            'student_id'=>'required',
//            'email'=>'required',
//            'password'=>'required',
//            'photo'=>'required',
//            'major'=>'required',
//        ]);
        $photo=$request->file('photo');
        if($photo){
            $photoname=rand(1,6).'_'.time().'.'.$photo->getClientOriginalExtension();
            $destination_path=storage_path('/image');
            $photo->move($destination_path,$photoname);
        }
//        dd($photoname);
        if($vd->passes()){
            $st=Student::create([
                'student_id'=>$request->student_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'photo'=>$photoname,
                'major_id'=>$request->major,
                'address'=>'Mandalay/Myitenge',
            ]);
            return response()->json([
                'is_success'=>true,
            ]);
        }
        else
            return response()->json([
                'is_success'=>false,
                'errors'=>$vd->errors(),
            ]);
//

    }
    public function edit($id){
        $st=Student::find($id);
        return $st;
    }
    public function update($id,Request $request){
//        $vd=Validator::make($request->all(),[
//            'name'=>'required',
//            'student_id'=>'required|unique:students,student_id,'.$id,
//            'major'=>'required',
//        ]);
        $this->validate($request,[
            'name'=>'required',
            'student_id'=>'required|unique:students,student_id,'.$id,
            'major'=>'required',
        ]);
//        if($vd->passes()){
//            $st=Student::find($id);
//            $st->name=$request->name;
//            $st->major=$request->major;
//            $st->save();
            $student=Student::whereId($id)->update($request->all());
            return response()->json([
                'is_success'=>true,
//                'student'=>$student,
            ]);
//        }
//        else{
//            return response()->json([
//                'is_success'=>false,
//                'errors'=>$vd->errors(),
//            ]);
//        }
    }
    public function searchName(Request $request){
        $students=Student::where('name','LIKE','%'.$request->search.'%')->get();
        return $students;
    }
    public function destroy(Request $request){
        $st=Student::find($request->id);
        $st->delete();
        return response()->json([
            'is_success'=>true,

        ]);
    }
    public function getImage($name)
    {
        return response()->download(storage_path().'/image/'.$name);
    }
}
