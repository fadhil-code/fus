<?php

namespace App\Http\Controllers;

use App\Models\skills;
use App\Models\researches;
use App\Models\student_main_det;
use App\Models\studentcertificates;
use App\Models\superresearches;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\universities;
use App\Models\departments;
use App\Models\studies;
use App\Models\allmajors;
use App\Models\lecturerss;
use App\Models\subjects;
use App\Models\students;
use App\Models\channels;
use App\Models\studentstudy;
use App\Models\supervisors;
use App\Models\resyear;
use App\Models\restitles;
use App\Models\discussion;

class AuthManager extends Controller
{
    //
    function login(){
        if(Auth::check()){
        return redirect(route('home'));
            
        }
        return view('login');
        }
    function registration(){
        if(Auth::check()){
            return redirect(route('login'));
                
            }
        return view('registration');

           // $data10= specialties::all();
            
       // return view('registration',[
         //   'specialties'=>$data10]);
     }

    function loginPost(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        $cr=$request->only('email','password');
        if(Auth::attempt($cr)){
            $id = Auth::user()->id;
            $data= User::where('id',$id)->get();

           
            return redirect()->intended(route('home'));

              //  return  view('welcome',['Users'=>$data,
            //'specialties'=>$data10,
            //]);
        }
        $email=$request->input('email');
        $request->session()->put('email', $email);
        return redirect(route('login'))->with("error","يوجد خطأ في المعلومات يرجى التأكد من كلمة المرور او البريد الالكتروني");
        
     }
    function home(Request $request){
        if(Auth::check()){

            
            $id = Auth::user()->id;
            $users= User::count();
            $data2= universities::count();
            $departments= departments::count();
            $students= students::count();
            $subjects= subjects::count();
            return  view('welcome',['universities'=>$data2,
            'users'=>$users,
            'departments'=>$departments,
            'students'=>$students,
            'subjects'=>$subjects,
        ]);
        }
        $email=$request->input('email');
        $request->session()->put('email', $email);
        return redirect(route('login'))->with("error","يوجد خطأ في المعلومات يرجى التأكد من كلمة المرور او البريد الالكتروني");
        
     }
    function registrationPost(Request $request){
        $request->validate([
            'fullname'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:1'
        ]);
        $user_type=$request->get('user_type');
        $data['fullname']=$request->fullname;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['user_type']=$user_type;
        $data['photo']="avatar3.png";

        if ($user_type=="1"){
            $data['prev']="view,posts,courses,";
        }
        else
        {
            $data['prev']="view,";
            
        }
        $user= User::create($data);
        if (!$user){
        return redirect(route('registration'))->with("error","registration failed");
        }

           
        return redirect(route('login'))->with("success","registration success");

        }

        function accounts(){
            if(Auth::check()){
                $filter ="";
    
                $id = Auth::user()->id;
                $unid=Auth::user()->unid;
                if ($unid){
                    $data2= universities::where('id',$unid)->get();
                    $departments= departments::where('unid',$unid)->get();
                }
                else
                {
                    $data2= universities::all();
                    $departments= "";
                }
                
                $accounts= User::sortable()->paginate(5);//where('id', '!=', auth()->id())->
                return view('accounts',[
                'universities'=>$data2,
                'accounts'=>$accounts,
                'departments'=>$departments,
                'filter'=>$filter,
            ]);                                   
                }
                return view('login');                
            } 
            
            public function index_filtering_accounts(Request $request)
            {
                $filter = $request->query('filter');
                $unid=Auth::user()->unid;
                if ($unid){
                $data2= universities::where('id',$unid)->get();
                }
                else
                {
                    $data2= universities::all();
                }
    
                if (!empty($filter)) {
                    $accounts = User::sortable()
                        ->where('users.fullname', 'like', '%'.$filter.'%')
                        ->paginate(5);
                } else {
                    $accounts = User::sortable()
                        ->paginate(5);
                }
    
                return view('accounts',[
                    'accounts'=>$accounts,
                'universities'=>$data2,
                'filter'=>$filter,
                    
                ]); 
                   }
    
    function accountsPost(Request $request){
        try {
            $request->validate([
                'fullname'=> 'required',
                'email'=> 'required|email|unique:users',
                'password'=> 'required|min:1'
            ]);
            $data['fullname']=$request->fullname;
            $data['email']=$request->email;
            $data['password']=Hash::make($request->password);
            $unid=Auth::user()->unid;
            if($unid){$data['unid']=$unid;}else{$data['unid']=$request->unid;}
            $did=Auth::user()->did;
            if($did){$data['did']=$did;}else{$data['did']=$request->did;}
    
            $data['user_type']='1';
            $data['photo']="avatar3.png";
            $data['prev']="deps";
                
            $user= User::create($data);
            return back()->with("success","تم اضافة المستخدم بنجاح.");
        } catch (Throwable $e) {            
            return redirect(route('accounts'))->with("success",report($e));     
        }
    }
    public function delete_accountsPost(Request $request,$id) {
        if(Auth::check()){            
            User::where('id',$id)->delete();
                return back()->with("success","تم مسح المستخدم بنجاح.");
            }
            return view('home');
    
    }


    public function deps(Request $request) {
        if($request->unid){
        $did=Auth::user()->did;
                if ($did){
                $data2= departments::where('id',$did)->get();
                }
                else
                {
                    $data2 = DB::table('departments')
                    ->where('unid', $request->unid)
                    ->get();
                }}
        
    
    if (count($data2) > 0) {
        return response()->json($data2);
    }
        
    }

    public function majs(Request $request) {
        if($request->did){
        $did=$request->did;
                if ($did){
                $data2= allmajors::where('did',$did)->get();
                }
               }
        
    
    if (count($data2) > 0) {
        return response()->json($data2);
    }
        
    }
    function logout(Request $request){
            //session::flush();
            $request->session()->forget('email');
            Auth::logout();
            return redirect(route('login'));
            
    
         }


    function universities(){
            if(Auth::check()){
                $filter ="";
                $id = Auth::user()->id;
               // $data= User::where('id',$id)->get();
                $data2= universities::sortable()->paginate(5);
                return view('universities',[
                'universities'=>$data2,
                'filter'=>$filter,
                
            ]);                                   
                }
                return view('login');                
            }
    public function index_filtering(Request $request)
                {
                    $filter = $request->query('filter');

                    if (!empty($filter)) {
                        $universities = universities::sortable()
                            ->where('universities.uname', 'like', '%'.$filter.'%')
                            ->paginate(5);
                    } else {
                        $universities = universities::sortable()
                            ->paginate(5);
                    }

                    return view('universities',[
                        'universities'=>$universities,
                        'filter'=>$filter,
                        
                    ]); 
                       }   

    function universitiesPost(Request $request){
        try {
         //   $request->validate([
         //       'uname'=> 'required|uname|unique:universities'
         //   ]);
            $id = Auth::user()->id;
            $data['uname']=$request->uname;
            $data['adduid']=$id;
            $user= universities::create($data);          
            return back()->with("success","تم اضافة الجامعة بنجاح.");
         // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
        } catch (Throwable $e) {            
            return redirect(route('universities'))->with("success",report($e));     
        }
    }
    public function delete_universitiesPost(Request $request,$id) {
        if(Auth::check()){            
            universities::where('id',$id)->delete();
                return back()->with("success","تم مسح الجامعة بنجاح.");
            }
            return view('home');
    
    }
    function live(){
        if(Auth::check()){
            $filter ="";

            $unid=Auth::user()->unid;
                if ($unid){
                $data2= universities::where('id',$unid)->get();
                $data3= departments::where('unid', $unid)->sortable()->paginate(5);
                }
                else
                {
                    $data2= universities::all();
                    $data3= departments::sortable()->paginate(5);
                }
            return view('live',[
            'universities'=>$data2,
            'departments'=>$data3,
            'filter'=>$filter,
        ]);                                   
            }
            return view('login');                
        } 
    function departments(){
        if(Auth::check()){
            $filter ="";

            $unid=Auth::user()->unid;
                if ($unid){
                $data2= universities::where('id',$unid)->get();
                $data3= departments::where('unid', $unid)->sortable()->paginate(5);
                }
                else
                {
                    $data2= universities::all();
                    $data3= departments::sortable()->paginate(5);
                }
            return view('departments',[
            'universities'=>$data2,
            'departments'=>$data3,
            'filter'=>$filter,
        ]);                                   
            }
            return view('login');                
        } 
        
        public function index_filtering_deps(Request $request)
        {
            $filter = $request->query('filter');
            $unid=Auth::user()->unid;
                if ($unid){
                $data2= universities::where('id',$unid)->get();
                if (!empty($filter)) {
                    $departments= departments::where('unid', $unid)
                    ->where('departments.dname', 'like', '%'.$filter.'%')
                    ->sortable()->paginate(5);
                } else {
                    $departments= departments::where('unid', $unid)
                    ->sortable()->paginate(5);
                }
                }
                else
                {
                    $data2= universities::all();

                    if (!empty($filter)) {
                        $departments= departments::where('departments.dname', 'like', '%'.$filter.'%')
                        ->sortable()->paginate(5);
                    } else {
                        $departments= departments::sortable()->paginate(5);
                    }
                }

            return view('departments',[
                'departments'=>$departments,
            'universities'=>$data2,
            'filter'=>$filter,
                
            ]); 
               }

function departmentsPost(Request $request){
    try {
     //   $request->validate([
     //       'uname'=> 'required|uname|unique:universities'
     //   ]);
     $id = Auth::user()->id;
     $unid = Auth::user()->unid;
     $data['dname']=$request->dname;
        $data['unid']=$unid;
        $data['adduid']=$id;
        $user= departments::create($data);          
        return back()->with("success","تم اضافة القسم بنجاح.");
     // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
    } catch (Throwable $e) {            
        return redirect(route('departments'))->with("success",report($e));     
    }
}
public function delete_departmentsPost(Request $request,$id) {
    if(Auth::check()){            
        departments::where('id',$id)->delete();
            return back()->with("success","تم مسح القسم بنجاح.");
        }
        return view('home');

}
function studies(){
    if(Auth::check()){
        $filter="";
        $data2= studies::sortable()->paginate(5);
        return view('studies',[
        'studies'=>$data2,
        'filter'=>$filter,

    ]);                                   
        }
        return view('login');                
    }   
    public function index_filtering_studies(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $studies = studies::sortable()
                ->where('studies.studyname', 'like', '%'.$filter.'%')
                ->paginate(5);
        } else {
            $studies = studies::sortable()
                ->paginate(5);
        }

        return view('studies',[
            'studies'=>$studies,
            'filter'=>$filter,
            
        ]); 
           }  
function studiesPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);
    $id = Auth::user()->id;
    $data['studyname']=$request->studyname;
    $data['adduid']=$id;
    $user= studies::create($data);          
    return back()->with("success","تم اضافة الدراسة بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('studies'))->with("success",report($e));     
}
}
public function delete_studiesPost(Request $request,$id) {
if(Auth::check()){            
    studies::where('id',$id)->delete();
        return back()->with("success","تم مسح الدراسة بنجاح.");
    }
    return view('home');

}

function majors(){
    if(Auth::check()){
        $filter = "";

        $unid=Auth::user()->unid;
        if ($unid){
        $universities= universities::where('id',$unid)->get();
        $did=Auth::user()->did;
            if($did){
                $data2= allmajors::where('did', $did)->sortable()->paginate(5);
            }
            else
            {
                $universities1= universities::find($unid);
                $data2=$universities1->allmajors()->sortable()->paginate(5);
            }
        }
        else
        {
            $universities= universities::all();
            $data2= allmajors::sortable()->paginate(5);
        }
        $studies= studies::all();
        return view('majors',[
            'universities'=>$universities,
            'allmajors'=>$data2,
            'studies'=>$studies,
            'filter'=>$filter,
        ]);                                   
        }
        return view('login');                
    }   

function majorsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);
    $id = Auth::user()->id;
    $data['mname']=$request->mname;
    $data['mname2']=$request->mname2;
    $data['did']=$request->did;
    $data['stdid']=$request->stdid;
    $data['adduid']=$id;
    $user= allmajors::create($data);          
    return back()->with("success","تم اضافة التخصص بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('departments'))->with("success",report($e));     
}
}
public function delete_majorsPost(Request $request,$id) {
if(Auth::check()){            
    allmajors::where('id',$id)->delete();
        return back()->with("success","تم مسح التخصص بنجاح.");
    }
    return view('home');

}

function depmajors(){
    if(Auth::check()){
        $filter = "";
        $unid=Auth::user()->unid;
        if ($unid){
        $did=Auth::user()->did;
            if($did){
                $data2= allmajors::where('did', $did)->sortable()->paginate(5);
            } 
        $studies= studies::all();
        return view('depmajors',[
            'allmajors'=>$data2,
            'studies'=>$studies,
            'filter'=>$filter,
        ]);                                   
        }
    }
        return view('login');                
    }
       

function depmajorsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);
    $id = Auth::user()->id;
    $did=Auth::user()->did;
     $data['mname']=$request->mname;
    $data['mname2']=$request->mname2;
    $data['did']=$did;
    $data['stdid']=$request->stdid;
    $data['adduid']=$id;
    $user= allmajors::create($data);          
    return back()->with("success","تم اضافة التخصص بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('departments'))->with("success",report($e));     
}
}
public function delete_depmajorsPost(Request $request,$id) {
if(Auth::check()){            
    allmajors::where('id',$id)->delete();
        return back()->with("success","تم مسح التخصص بنجاح.");
    }
    return view('home');

}
function lecturerss(){
    if(Auth::check()){
        $filter = "";

        $unid=Auth::user()->unid;
        if ($unid){
        $universities= universities::where('id',$unid)->get();
        $did=Auth::user()->did;
            if($did){
                $data222= lecturerss::where('did', $did)->sortable()->paginate(5);
            }
            else
            {
                $universities1= universities::find($unid);
                $data222=$universities1->lecturerss()->sortable()->paginate(5);
            }
        }
        else
        {
            $universities= universities::all();
            $data222= lecturerss::sortable()->paginate(5);
        }
        return view('lecturerss',[
            'universities'=>$universities,
            'lecturerss'=>$data222,
            'filter'=>$filter,
    ]);                                   
        }
        return view('login');                
    }   
public function index_filtering_lecturerss(Request $request){
            $filter = $request->query('filter');

            $unid=Auth::user()->unid;
            if ($unid){
            $universities= universities::where('id',$unid)->get();
            $did=Auth::user()->did;
                if($did){
                    if (!empty($filter)) {
                        $data2 = lecturerss::sortable()
                            ->where('did', $did)
                            ->where('lecname', 'like', '%'.$filter.'%')
                            ->paginate(5);
                    } else {
                        $data2= lecturerss::where('did', $did)->sortable()->paginate(5);
                    }
                }
                else
                {
                    
                if (!empty($filter)) {
                    $universities1= universities::find($unid);
                    $data2=$universities1->lecturerss()->sortable()->where('lecname', 'like', '%'.$filter.'%')->paginate(5);
                } else {
                    $universities1= universities::find($unid);
                    $data2=$universities1->lecturerss()->sortable()->paginate(5);
                }            
                }
            }
            else
            {
                $universities= universities::all();
                if (!empty($filter)) {
                    $data2 = lecturerss::sortable()
                        ->where('lecname', 'like', '%'.$filter.'%')
                        ->paginate(5);
                } else {
                    $data2= lecturerss::sortable()->paginate(5);
                }
            }

            return view('lecturerss',[
                'universities'=>$universities,
                'lecturerss'=>$data2,
                'filter'=>$filter,
            ]); 
        }
function lecturerssPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);
    $id = Auth::user()->id;
    $data['lecname']=$request->lecname;
    $data['leclakab']=$request->leclakab;
    $data['did']=$request->did;
    $data['adduid']=$id;

    $randomId       =   rand(2,50);


    $fileName = $randomId.time().$id  . '.' . $request->file('photo')->extension();
    $request->photo->storeAs('public/images', $fileName);   
    $data['photo']=$fileName;

    $user= lecturerss::create($data);          
    return back()->with("success","تم اضافة التدريسي بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_lecturerssPost(Request $request,$id) {
if(Auth::check()){            
    lecturerss::where('id',$id)->delete();
        return back()->with("success","تم مسح التدريسي بنجاح.");
    }
    return view('home');

}

function deplecturerss(){
    if(Auth::check()){
        $unid=Auth::user()->unid;
        if ($unid){
               $did=Auth::user()->did;
            if($did){
                $data222= lecturerss::where('did', $did)->sortable()->paginate(5);
            }          
        }
        
        return view('deplecturerss',[
            'lecturerss'=>$data222,

    ]);                                   
        }
        return view('login');                
    }   

function deplecturerssPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);
    $id = Auth::user()->id;
    $did = Auth::user()->did;
    $data['lecname']=$request->lecname;
    $data['leclakab']=$request->leclakab;
    $data['did']=$did;
    $data['adduid']=$id;
    $randomId       =   rand(2,50);
    $fileName = $randomId.time().$id  . '.' . $request->file('photo')->extension();
    $request->photo->storeAs('public/images', $fileName);   
    $data['photo']=$fileName;
    $user= lecturerss::create($data);          
    return back()->with("success","تم اضافة التدريسي بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_deplecturerssPost(Request $request,$id) {
if(Auth::check()){            
    lecturerss::where('id',$id)->delete();
        return back()->with("success","تم مسح التدريسي بنجاح.");
    }
    return view('home');

}
function subjects(){
    if(Auth::check()){
        $filter = "";

        $unid=Auth::user()->unid;
        if ($unid){
        $universities= universities::where('id',$unid)->get();
        $did=Auth::user()->did;
            if($did){
                $universities1= universities::find($unid);
                $data2=$universities1->subjects()->sortable()->paginate(5);
               // $data2 = universities::with('deps.allmajors.subjects')->sortable()->paginate(5);

                $data22 = subjects::sortable()
                ->join('allmajors', 'subjects.spid', '=', 'allmajors.id')
                ->join('departments', 'allmajors.did', '=', 'departments.id')
                ->where('departments.unid', '=', $unid)
                ->where('departments.id', '=', $did)
                ->paginate(5);
            }
            else
            {
                $data2 = subjects::sortable()
                ->join('allmajors', 'subjects.spid', '=', 'allmajors.id')
                ->join('departments', 'allmajors.did', '=', 'departments.id')
                ->where('departments.unid', '=', $unid)
                ->paginate(5);
            }
        }
        else
        {
            $universities= universities::all();
            $data2= subjects::sortable()->paginate(5);
        }
        return view('subjects',[
            'universities'=>$universities,
            'subjects'=>$data2,
            'filter'=>$filter,
    ]);
                                   
        }
        return view('login');                
    }   
    public function index_filtering_subjects(Request $request)
    {
        $filter = $request->query('filter');
        $unid=Auth::user()->unid;
        if ($unid){
        $universities= universities::where('id',$unid)->get();
        $did=Auth::user()->did;
            if($did){
                if (!empty($filter)) {
                $data2 = subjects::sortable()
                ->join('allmajors', 'subjects.spid', '=', 'allmajors.id')
                ->join('departments', 'allmajors.did', '=', 'departments.id')
                ->where('departments.unid', '=', $unid)
                ->where('departments.id', '=', $did)
                ->where('subjects.subname', 'like', '%'.$filter.'%')
                ->paginate(5);
                } else {
                    $data2 = subjects::sortable()
                    ->join('allmajors', 'subjects.spid', '=', 'allmajors.id')
                    ->join('departments', 'allmajors.did', '=', 'departments.id')
                    ->where('departments.unid', '=', $unid)
                    ->where('departments.id', '=', $did)
                    ->paginate(5);
                }
                
            }
            else
            {
                if (!empty($filter)) { 
                    $data2 = subjects::sortable()
                ->join('allmajors', 'subjects.spid', '=', 'allmajors.id')
                ->join('departments', 'allmajors.did', '=', 'departments.id')
                ->where('departments.unid', '=', $unid)
                ->where('subjects.subname', 'like', '%'.$filter.'%')
                ->paginate(5);
                }
                else{
                    $data2 = subjects::sortable()
                    ->join('allmajors', 'subjects.spid', '=', 'allmajors.id')
                    ->join('departments', 'allmajors.did', '=', 'departments.id')
                    ->where('departments.unid', '=', $unid)
                    ->paginate(5);
                }
            }
        }
        else
        {
            if (!empty($filter)) { 

                $data2 = subjects::sortable()
                    ->where('subjects.subname', 'like', '%'.$filter.'%')
                    ->paginate(5);
            }
            else
            {
                $data2= subjects::sortable()->paginate(5);  
            }
            $universities= universities::all();

        }
        return view('subjects',[
            'universities'=>$universities,
            'subjects'=>$data2,
            'filter'=>$filter,
    ]);

        
    }
function subjectsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $data['subname']=$request->subname;
    $data['units']=$request->units;
    $data['spid']=$request->spid;
    $data['adduid']=$id;
    $user= subjects::create($data);          
    return back()->with("success","تم اضافة المادة بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_subjectsPost(Request $request,$id) {
if(Auth::check()){            
    subjects::where('id',$id)->delete();
        return back()->with("success","تم مسح المادة بنجاح.");
    }
    return view('home');

}
function depsubjects(){
    if(Auth::check()){
        $unid=Auth::user()->unid;
        if ($unid){
        $did=Auth::user()->did;
            if($did){
            $allmajors= allmajors::where('did',$did)->get();
            $departments= departments::find($did);
            $subjects=$departments->subjects()->sortable();

        return view('depsubjects',[
            'allmajors'=>$allmajors,
            'subjects'=>$subjects,
    ]);
              
        }
    }                       
        }
        return view('login');                
    }   

function depsubjectsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $data['subname']=$request->subname;
    $data['units']=$request->units;
    $data['spid']=$request->spid; //here
    $data['adduid']=$id;
    $user= subjects::create($data);          
    return back()->with("success","تم اضافة المادة بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_depsubjectsPost(Request $request,$id) {
if(Auth::check()){            
    subjects::where('id',$id)->delete();
        return back()->with("success","تم مسح المادة بنجاح.");
    }
    return view('home');

}
function students(){
    if(Auth::check()){
        $id = Auth::user()->id;
        $data2= students::all();
        $data3= departments::all();
        return view('students',[
        'students'=>$data2,
        'departments'=>$data3,
    ]);                                   
        }
        return view('login');                
    }   

function studentsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $data['stname']=$request->stname;
    $data['did']=$request->did;
    $data['adduid']=$id;
    $user= students::create($data);          
    return back()->with("success","تم اضافة الطالب بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_studentsPost(Request $request,$id) {
if(Auth::check()){            
    students::where('id',$id)->delete();
    studentstudy::where('stid',$id)->delete();
        return back()->with("success","تم مسح الطالب بنجاح.");
    }
    return view('home');

}
function depstudents(){
    if(Auth::check()){
        $did = Auth::user()->did;
        $students= students::where('did',$did)->get();

        return view('depstudents',[
        'students'=>$students,
    ]);                                   
        }
        return view('login');                
    }   

function depstudentsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $did = Auth::user()->did;
    $data['stname']=$request->stname;
    $data['did']=$did;
    $data['adduid']=$id;
    $user= students::create($data);          
    return back()->with("success","تم اضافة الطالب بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_depstudentsPost(Request $request,$id) {
if(Auth::check()){            
    students::where('id',$id)->delete();
    studentstudy::where('stid',$id)->delete();
        return back()->with("success","تم مسح الطالب بنجاح.");
    }
    return view('home');

}

function channels(){
    if(Auth::check()){
            $filter="";
        $data2= channels::sortable()->paginate(5);

        return view('channels',[
        'channels'=>$data2,
        'filter'=>$filter,

    ]);                                   
        }
        return view('login');                
    }   
    public function index_filtering_channels(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $channels = channels::sortable()
                ->where('channels.chname', 'like', '%'.$filter.'%')
                ->paginate(5);
        } else {
            $channels = channels::sortable()
                ->paginate(5);
        }

        return view('channels',[
            'channels'=>$channels,
            'filter'=>$filter,
            
        ]); 
           }  
function channelsPost(Request $request){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);
    $id = Auth::user()->id;
    $data['chname']=$request->chname;
    $data['adduid']=$id;
    $user= channels::create($data);          
    return back()->with("success","تم اضافة ألقناة بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('universities'))->with("success",report($e));     
}
}
public function delete_channelsPost(Request $request,$id) {
if(Auth::check()){            
    channels::where('id',$id)->delete();
        return back()->with("success","تم مسح القناة بنجاح.");
    }
    return view('home');

}
function studentstudy(Request $request,$stid){
    if(Auth::check()){
        $id = Auth::user()->id;
        $data2= studentstudy::where('stid',$stid)->get();
        $data3= channels::all();
        $students= students::where('id',$stid)->get();
        $allmajors= allmajors::all();

        return view('ststudy',[
        'studentstudy'=>$data2,
        'channels'=>$data3,
        'students'=>$students,
        'stid'=>$stid,
        'allmajors'=>$allmajors,
    ]);                                   
        }
        return view('login');                
    }   

function studentstudyPost(Request $request,$stid){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $data['stid']=$stid;
    $data['spid']=$request->spid;
    $data['chid']=$request->chid;
    $data['mobashara']=$request->mobashara;
    $data['adduid']=$id;
    $user= studentstudy::create($data);          
    return back()->with("success","تم اضافة الدراسة بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_studentstudyPost(Request $request,$id) {
if(Auth::check()){            
    studentstudy::where('id',$id)->delete();
        return back()->with("success","تم مسح الدراسة بنجاح.");
    }
    return view('home');

}

function depstudentstudy(Request $request,$stid){
    if(Auth::check()){
        $id = Auth::user()->id;
        $did = Auth::user()->did;
        $data2= studentstudy::where('stid',$stid)->get();
        $data3= channels::all();
        $students= students::where('id',$stid)->get();
        foreach($students as $student)
        {$stname=$student->stname;}
        $allmajors= allmajors::where('did',$did)->get();

        return view('depststudy',[
        'studentstudy'=>$data2,
        'channels'=>$data3,
        'stname'=>$stname,
        'stid'=>$stid,
        'allmajors'=>$allmajors,
    ]);                                   
        }
        return view('login');                
    }   

function depstudentstudyPost(Request $request,$stid){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $data['stid']=$stid;
    $data['spid']=$request->spid;
    $data['chid']=$request->chid;
    $data['mobashara']=$request->mobashara;
    $data['state']=0;
    $data['position']=0;
    $data['adduid']=$id;
    $user= studentstudy::create($data);          
    return back()->with("success","تم اضافة الدراسة بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_depstudentstudyPost(Request $request,$id) {
if(Auth::check()){            
    studentstudy::where('id',$id)->delete();
        return back()->with("success","تم مسح الدراسة بنجاح.");
    }
    return view('home');

}
function ststate(Request $request,$ststudyid){
    if(Auth::check()){
        $data2= studentstudy::where('id',$ststudyid)->get();
        $syeardate='';
        $restitles='';
        $rsid='';
        foreach($data2 as $st)
        {$stname=$st->students->stname;
        $state=$st->state;}
        try { $resyear= resyear::where('ssid',$ststudyid)->get();
            foreach($resyear as $resyea)
            {$syeardate=$resyea->syeardate;
                $rsid=$resyea->id;}

        } catch (Throwable $e) {            
        }

        return view('ststate',[
        'ststudyid'=>$ststudyid,
        'stname'=>$stname,
        'state'=>$state,
        'syeardate'=>$syeardate,
        'rsid'=>$rsid,
    ]);                                   
        }
        return view('login');                
    }   

function getrestitles(Request $request,$ststudyid){
        if(Auth::check()){
            $data2= studentstudy::where('id',$ststudyid)->get();
            $syeardate='';
            $restitles='';
            $rsid='';
            foreach($data2 as $st)
            {$stname=$st->students->stname;
            $state=$st->state;}
            try { $resyear= resyear::where('ssid',$ststudyid)->get();
                foreach($resyear as $resyea)
                {$syeardate=$resyea->syeardate;
                    $rsid=$resyea->id;}
            $restitles= restitles::where('rsid',$rsid)->sortable()->get();
    
            } catch (Throwable $e) {            
            }
    
            return view('getrestitles',[
            'ststudyid'=>$ststudyid,
            'stname'=>$stname,
            'state'=>$state,
            'syeardate'=>$syeardate,
            'restitles'=>$restitles,
            'rsid'=>$rsid,
        ]);                                   
            }
            return view('login');                
        }   

function getdiscussion(Request $request,$ststudyid){
        if(Auth::check()){
            $data2= studentstudy::where('id',$ststudyid)->get();
            $syeardate='';
            $restitles='';
            $edits='';
            $editdone='';
            $dicdate='';
            $dicid='-1';
            $rsid='';
            foreach($data2 as $st)
            {$stname=$st->students->stname;
            $state=$st->state;}
            try { $resyear= resyear::where('ssid',$ststudyid)->get();
                foreach($resyear as $resyea)
                {$syeardate=$resyea->syeardate;
                    $rsid=$resyea->id;}
            $discussion= discussion::where('rsid',$rsid)->get();
            foreach($discussion as $discussio)
            {$dicdate=$discussio->dicdate;
                $edits=$discussio->edits;
                $dicid=$discussio->id;
                $editdone=$discussio->editdone;}
            } catch (Throwable $e) {            
            }
    
            return view('discussion',[
            'ststudyid'=>$ststudyid,
            'stname'=>$stname,
            'state'=>$state,
            'syeardate'=>$syeardate,
            'discussion'=>$discussion,
            'dicdate'=>$dicdate,
            'edits'=>$edits,
            'editdone'=>$editdone,
            'dicid'=>$dicid,
            'rsid'=>$rsid,
        ]);                                   
            }
            return view('login');                
        }   

        function discussionpost(Request $request,$rsid,$dicid){
            try {
             //   $request->validate([
             //       'uname'=> 'required|uname|unique:universities'
             //   ]);
           $id = Auth::user()->id;
                
                if ($dicid !='-1'){
                    discussion::where('id',$dicid)->update([
                    'dicdate'=>$request->dicdate,
                    'edits'=>$request->edits,
                    'editdone'=>$request->editdone
                ]);
                return back()->with("success","تم تحديث المناقشة بنجاح.");

                }
                else
                {
                $data['rsid']=$rsid;
                $data['dicdate']=$request->dicdate;
                $data['edits']=$request->edits;
                $data['editdone']=$request->editdone;
                $data['adduid']=$id;
                $discussion= discussion::create($data);          
                return back()->with("success","تم اضافة المناقشة بنجاح.");
                }
            } catch (Throwable $e) {            
                return redirect(route('home'))->with("success",report($e));     
            }
            }
public function state_studentstudy(Request $request,$id) {
    if(Auth::check()){            

        $state=$request->state;
        studentstudy::where('id',$id)->update(['state'=>$state]);
        if($state==0)
        {
            $resyear= resyear::where('ssid',$id)->get();
            foreach($resyear as $resyea)
            {
                $rsid=$resyea->id;}
                restitles::where('rsid',$rsid)->delete();}
                resyear::where('ssid',$id)->delete();
            return back()->with("success","تم تحديث المرحلة بنجاح.");
        }
        return view('home');
    
    }

    function studentMainDet(Request $request,$stid){
        if(Auth::check()){
            $data2= students::where('id',$stid)->get();
            foreach($data2 as $st)
            {$stname=$st->stname;}
            $sex='';
            $bd='';
            $photo='';
            try {   
       
                $studentMainDet= student_main_det::where('stid',$stid)->get();
                   foreach($studentMainDet as $studentMainDe)
               {$bd=$studentMainDe->bd;
                   $sex=$studentMainDe->sex;
                   $photo=$studentMainDe->photo;
               }
    
            } catch (Throwable $e) {            
            }
    
            return view('studentMainDet',[
            'stid'=>$stid,
            'stname'=>$stname,
            'bd'=>$bd,
            'sex'=>$sex,
            'photo'=>$photo,
        ]);                                   
            }
            return view('login');
        }
        function studentMainDetPost(Request $request,$stid){
            try {
             $bd='';
             $studentMainDet= student_main_det::where('stid',$stid)->get();

                foreach($studentMainDet as $studentMainDe)
            {$bd=$studentMainDe->bd;}
                if($bd){
                    if ($request->hasFile('photo')){
                    $randomId       =   rand(2,50);
                    $fileName = $randomId.time().$stid  . '.' . $request->file('photo')->extension();
                    $request->photo->storeAs('public/sts', $fileName); 
                    $student_main_det= student_main_det::where('stid',$stid)->update([
                        'bd'=>$request->bd,
                        'sex'=>$request->sex,
                        'photo'=>$fileName
                    ]); }
                    else
                    {    $student_main_det= student_main_det::where('stid',$stid)->update([
                        'bd'=>$request->bd,
                        'sex'=>$request->sex
                    ]);}         
                    return back()->with("success","تم تحديث المعلومات الشخصية بنجاح.");
                }
                else
    {            $id = Auth::user()->id;
                $data['stid']=$stid;
                $data['sex']=$request->sex;
                $data['bd']=$request->bd;
                $randomId       =   rand(2,50);
                $fileName = $randomId.time().$stid  . '.' . $request->file('photo')->extension();
                $request->photo->storeAs('public/sts', $fileName);   
                $data['photo']=$fileName;
                $data['adduid']=$id;
                $student_main_det= student_main_det::create($data);  
              
    
                return back()->with("success","تم اضافة المعلومات بنجاح.");}
            } catch (Throwable $e) {            
                return redirect(route('home'))->with("success",report($e));     
            }
            }
function studentcertificates(Request $request,$stid){
                if(Auth::check()){
                    $data2= students::where('id',$stid)->get();
                    foreach($data2 as $st)
                    {$stname=$st->stname;}
                    $studentcertificates="";
                    try {   
               
                        $studentcertificates= studentcertificates::where('stid',$stid)->get();

            
                    } catch (Throwable $e) {            
                    }
            
                    return view('studentcertificates',[
                    'stid'=>$stid,
                    'stname'=>$stname,
                    'studentcertificates'=>$studentcertificates
                ]);                                   
                    }
                    return view('login');
                }
function studentcertificatesPost(Request $request,$stid){
                    try {

                        $id = Auth::user()->id;
                        $data['stid']=$stid;
                        $data['title']=$request->title;
                        $data['inside']=$request->inside;
                        $data['taeed']=$request->taeed;
                        $data['taeeddate']=$request->taeeddate;
                        $data['av']=$request->av;
                        $data['qu']=$request->qu;
                        $data['karar']=$request->karar;
                        $data['karardate']=$request->karardate;
                        $data['adduid']=$id;
                        $studentcertificate= studentcertificates::create($data);  
                      
            
                        return back()->with("success","تم اضافة الشهادة بنجاح.");
                    } catch (Throwable $e) {            
                        return redirect(route('home'))->with("success",report($e));     
                    }
                    }
function resyear(Request $request,$ssid){
        try {
         //   $request->validate([
         //       'uname'=> 'required|uname|unique:universities'
         //   ]);
         
         $syeardate='';
            $resyear= resyear::where('ssid',$ssid)->get();
            foreach($resyear as $resyea)
        {$syeardate=$resyea->syeardate;
            $rsid=$resyea->id;}
            if($syeardate){
                $restitles= restitles::where('rsid',$rsid)->get();

                $resyear= resyear::where('ssid',$ssid)->update(['syeardate'=>$request->syeardate]);          
                return back()->with("success","تم تحديث تاريخ التسليم بنجاح.");
            }
            else
{            $id = Auth::user()->id;
            $data['ssid']=$ssid;
            $data['syeardate']=$request->syeardate;
            $data['adduid']=$id;
            $resyear= resyear::create($data);  
            $rsid=$resyear->id;
            $restitles= restitles::where('rsid',$rsid)->get();

            return back()->with(["success","تم اضافة تاريخ التسليم بنجاح.",'restitles'=>$restitles]);}
        } catch (Throwable $e) {            
            return redirect(route('home'))->with("success",report($e));     
        }
        }
function restitles(Request $request,$rsid){
            try {
             //   $request->validate([
             //       'uname'=> 'required|uname|unique:universities'
             //   ]);
        if($rsid!='')
          { $id = Auth::user()->id;
                $data['rsid']=$rsid;
                $data['stitle']=$request->stitle;
                $data['titledate']=$request->titledate;
                $data['adduid']=$id;
                $restitles= restitles::create($data);          
                
                return back()->with("success","تم اضافة العنوان بنجاح.");}
                else
                {return back()->with("error","يجب اضافة تاريخ تسليم البحث اولاً.");}
            } catch (Throwable $e) {            
                return redirect(route('home'))->with("success",report($e));     
            }
            }
        
public function delete_restitlesPost(Request $request,$id) {
if(Auth::check()){            
    restitles::where('id',$id)->delete();
        return back()->with("success","تم مسح العنوان بنجاح.");
    }
    return view('home');
}  

function getskills(Request $request,$ststudyid){
    if(Auth::check()){
        $data2= studentstudy::where('id',$ststudyid)->get();
        $syeardate='';
        $restitles='';
        $rsid='';
        foreach($data2 as $st)
        {$stname=$st->students->stname;
        $state=$st->state;}
        try { $resyear= resyear::where('ssid',$ststudyid)->get();
            foreach($resyear as $resyea)
            {$syeardate=$resyea->syeardate;
                $rsid=$resyea->id;}
        $skills= skills::where('rsid',$rsid)->sortable()->get();

        } catch (Throwable $e) {            
        }

        return view('getskills',[
        'ststudyid'=>$ststudyid,
        'stname'=>$stname,
        'state'=>$state,
        'syeardate'=>$syeardate,
        'skills'=>$skills,
        'rsid'=>$rsid,
    ]);                                   
        }
        return view('login');                
    } 

    function skills(Request $request,$rsid){
        try {
         //   $request->validate([
         //       'uname'=> 'required|uname|unique:universities'
         //   ]);
  
    if($rsid!='')
      { $id = Auth::user()->id;
            $data['rsid']=$rsid;
            $data['skname']=$request->skname;
            $data['skdate']=$request->skdate;
            $data['points']=$request->points;
            $data['sknotes']=$request->sknotes;
            $data['adduid']=$id;
            $skills= skills::create($data);          
            
            return back()->with("success","تم اضافة المهارة بنجاح.");}
            else
            {return back()->with("error","يجب اضافة تاريخ تسليم البحث اولاً.");}
        } catch (Throwable $e) {            
            return redirect(route('home'))->with("success",report($e));     
        }
        }
    
public function delete_skillsPost(Request $request,$id) {
if(Auth::check()){            
skills::where('id',$id)->delete();
    return back()->with("success","تم مسح المهارة بنجاح.");
}
return view('home');
} 
function getsresearches(Request $request,$ststudyid){
    if(Auth::check()){
        $data2= studentstudy::where('id',$ststudyid)->get();
        $supervisors1= supervisors::where('ststudyid',$ststudyid)->get();
        $syeardate='';
        $researches='';
        $supervisors='';
        $rsid='';
        foreach($data2 as $st)
        {$stname=$st->students->stname;
        $state=$st->state;}
        try { $resyear= resyear::where('ssid',$ststudyid)->get();
            foreach($resyear as $resyea)
            {$syeardate=$resyea->syeardate;
                $rsid=$resyea->id;}
                $researches= researches::where('rsid',$rsid)->sortable()->get();

        } catch (Throwable $e) {            
        }

        return view('getsresearches',[
        'ststudyid'=>$ststudyid,
        'stname'=>$stname,
        'state'=>$state,
        'syeardate'=>$syeardate,
        'researches'=>$researches,
        'supervisors1'=>$supervisors1,
        'rsid'=>$rsid,
    ]);                                   
        }
        return view('login');                
    } 

    function researches(Request $request,$rsid){
        try {
         //   $request->validate([
         //       'uname'=> 'required|uname|unique:universities'
         //   ]);

    if($rsid!='')
      { $id = Auth::user()->id;
            $data['rsid']=$rsid;
            $data['rtitle']=$request->rtitle;
            $data['rtstae']=$request->rtstae;
            $data['uploadhdate']=$request->uploadhdate;
            $data['publishdate']=$request->publishdate;
            $data['etemad']=$request->etemad;
            $data['adduid']=$id;
            $supers=$request->super;
            $researches= researches::create($data);          
            
            foreach($supers as $super)
            {
                $data2['researchid']=$researches->id;
                $data2['superid']=$super;
                $data2['adduid']=$id;
            $superresearches= superresearches::create($data2);          
                
            }
            //اضافة المشرفين
            
            return back()->with("success","تم اضافة البحث بنجاح.");}
            else
            {return back()->with("error","يجب اضافة تاريخ تسليم البحث اولاً.");}
        } catch (Throwable $e) {            
            return redirect(route('home'))->with("success",report($e));     
        }
        }
    
public function delete_researchesPost(Request $request,$id) {
if(Auth::check()){            
    superresearches::where('researchid',$id)->delete();
    researches::where('id',$id)->delete();
    return back()->with("success","تم مسح البحث بنجاح.");
}
return view('home');
} 
    function stposition(Request $request,$ststudyid){
        if(Auth::check()){
            $data2= studentstudy::where('id',$ststudyid)->get();
            foreach($data2 as $st)
            {$stname=$st->students->stname;
            $position=$st->position;}
            return view('stposition',[
            'ststudyid'=>$ststudyid,
            'stname'=>$stname,
            'position'=>$position,
        ]);                                   
            }
            return view('login');                
        }   

    public function position_studentstudy(Request $request,$id) {
        if(Auth::check()){            
    
            $position=$request->position;
            studentstudy::where('id',$id)->update(['position'=>$position]);
                return back()->with("success","تم تحديث الحالة بنجاح.");
            }
            return view('home');
        
        }
function supervisors(Request $request,$ststudyid){
    if(Auth::check()){
        $did = Auth::user()->did;
        $data2= studentstudy::where('id',$ststudyid)->get();
        $data3= supervisors::where('ststudyid',$ststudyid)->get();
        $lecturerss= lecturerss::where('did',$did)->get();

        return view('supervisors',[
        'studentstudy'=>$data2,
        'supervisors'=>$data3,
        'ststudyid'=>$ststudyid,
        'lecturerss'=>$lecturerss,
    ]);                                   
        }
        return view('login');                
    }   

function supervisorsPost(Request $request,$ststudyid){
try {
 //   $request->validate([
 //       'uname'=> 'required|uname|unique:universities'
 //   ]);

    $id = Auth::user()->id;
    $data['ststudyid']=$ststudyid;
    $data['lecid']=$request->lecid;
    $data['supdate']=$request->supdate;
    $data['active']='1';
    $data['adduid']=$id;
    $user= supervisors::create($data);          
    return back()->with("success","تم اضافة المشرف بنجاح.");
 // return redirect(route('home'))->with("success","تم اضافة الجامعة بنجاح.");
} catch (Throwable $e) {            
    return redirect(route('lecturerss'))->with("success",report($e));     
}
}
public function delete_supervisorsPost(Request $request,$id) {
if(Auth::check()){            
    supervisors::where('id',$id)->delete();
        return back()->with("success","تم مسح المشرف بنجاح.");
    }
    return view('home');

}

public function active_supervisors(Request $request,$id) {
    if(Auth::check()){            
        supervisors::where('id',$id)->update(['active'=>'0']);
            return back()->with("success","تم الغاء تفعيل الاشراف بنجاح.");
        }
        return view('home');
    
    }
}
