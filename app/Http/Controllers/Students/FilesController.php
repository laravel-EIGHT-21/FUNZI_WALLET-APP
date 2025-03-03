<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\studentfiles;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\academic_folders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;


use Dcblogdev\Dropbox\Facades\Dropbox;
use Exception;

class FilesController extends Controller
{
    



    

    ///All My Files New LayOut

    
 
    public function ViewMyFiles(){

        $student_id = Auth::user()->id;

        $data['folders'] = academic_folders::where('student_id',$student_id)->get();
        $data['files'] = studentfiles::where('student_id',$student_id)->latest()->get();
        $data['files_links'] = studentfiles::where('student_id',$student_id)->latest()->paginate(18);


        return view('students.files.my_files',$data);
    }





    
    public function ViewFiles(){

        $student_id = Auth::user()->id;

        $data['folders'] = academic_folders::where('student_id',$student_id)->get();
        $data['allData'] = studentfiles::where('student_id',$student_id)->latest()->get();

        return view('students.files.acadermics.acadermics_files',$data);
    }



    
             
    public function ViewFilesBoard(){

        $student_id = Auth::user()->id;
        $data['folders'] = academic_folders::where('student_id',$student_id)->get();

        $data['allData'] = studentfiles::where('student_id',$student_id)->latest()->paginate(9);
  
        return view('students.files.acadermics.acadermics_files_details',$data);
    }
  


    public function StoreFile(Request $request){
            

        $student_id = Auth::user()->id;

        $request->validate([
         'files' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png,jpeg|max:2048',
     ]);

    
         $files = $request->file('files');
         $file_name = $files->hashName();

         //$path = Storage::disk('s3')->putFile('/', $files, 'public');

    //$file = $request->file('files')->storeAS('files_folder',$files,'s3');
    $path = $files->storeAs('files_folder/' , $file_name , 's3');

     $save_file = basename($path);
     $url = Storage::url($path);

     $new_file = new studentfiles();
     $new_file->student_id = $student_id;
     $new_file->title = $request->title;
     $new_file->description = $request->description;
     $new_file->folder_id = $request->folder_id;
     $new_file->date = Carbon::now()->format('d F Y');
     $new_file->month = Carbon::now()->format('F Y');
     $new_file->year = Carbon::now()->format('Y');
     $new_file->file_url = $url;
     $new_file->file_name = $file_name;

     $new_file->save();       

     return ($new_file->file_name);

       


        
    }



    
    public function EditFile($id){



        $student_id = Auth::user()->id;

        $student = studentfiles::where('student_id',$student_id)->where('id',$id)->first();

        if($student == true){

            $folders = academic_folders::where('student_id',$student_id)->get();
            $editFile = studentfiles::where('student_id',$student_id)->findOrFail($id);

            return view('students.files.acadermics.acadermics_file_edit', compact('folders','editFile'));
            

        }

        else{
            abort(code:403);
        }

    }




        
    public function UpdateFile(Request $request, $id){

   
        $request->validate([
            'files' => 'required|mimes:csv,txt,xlx,xls,pdf|max:1024',
        ]);


            $update_file = studentfiles::findOrFail($id);
            $file_path = $update_file->file_name; 
            Storage::disk('s3')->delete('FunziWallet/'.$file_path);

            $file = $request->file('files')->store(path:'FunziWallet', options:'s3');
            $new_file_name = basename($file);
            $new_url = Storage::url($file);

            $update_file->title = $request->title;
            $update_file->description = $request->description;
            $update_file->folder_id = $request->folder_id; 
            $update_file->file_url = $new_url;
            $update_file->file_name = $new_file_name;
             
            if($update_file->file_name == null){

            return back()->with('error','File Upload Unsuccessfully...');


            }

            else{

            $update_file->save();
            return back()->with('warning','File Information Updated Successfully');

            }
                       
          

          
    }





    

  public function DeleteFile($id)
  {


    $file = studentfiles::findOrFail($id);
    $file_path = $file->file_name;
    Storage::disk('s3')->delete('FunziWallet/'.$file_path);
    $file->delete();
    
    return back()->with('error','File Information Has Been Permanently Deleted !');


  }






}
