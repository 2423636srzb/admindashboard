<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Str;
class FileController extends Controller
{
    private function token(){
        $client_id =\Config('services.google.client_id');
        $client_secret =\Config('services.google.client_secret');
        $refresh_token =\Config('services.google.refresh_token');
        $response = Http::post('https://oauth2.googleapis.com/token', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'refresh_token' => $refresh_token,
            'grant_type' => 'refresh_token',
        ]);
        
        $accessToken = json_decode((string)$response->getBody(),true)['access_token'];

        return $accessToken;
    }
    public function index(){
        $files  =File::all();

        return view('admin.file_management.index',compact('files'));
    }

    public function store(Request $request){

        $validation = $request->validate([
            'file' =>'file|required',
            'file_name' =>'required'
        ]);
        $accessToken = $this->token();
        // dd($accessToken);
        $name =$request->file->getClientOriginalName();

        // $mime = $request->file->getClientMimeType();

        $path = $request->file->getRealPath();

        // $response = Http::withHeaders([
        //     'Authorization'=>'Bearer '.$accessToken,
        //     'Content-Type'=>'Application/json'
        // ])->post('https://www.googleapis.com/drive/v3/files',[
        //     'data' =>$name,
        //     // 'mimeType'=>$mime,
        //     'uploadType' =>'resumable',
        //     'parents' => [\Config('services.google.folder_id')],
        // ]);

        $response = Http::withToken($accessToken)->attach('data',file_get_contents($path),$name)
        ->post('https://www.googleapis.com/upload/drive/v3/files',
        [
            'name'=>$name
        ]
        ,
        [
           'Content-Type'=>'application/octet-stream',
        ] 
           );

        if($response->successful()){
            $file_id = json_decode($response->body())->id;
            $uploadedFile = New File;
            $uploadedFile->file_name=$request->file_name;
            $uploadedFile->name=$name;
            $uploadedFile->file_id=$file_id;
            $uploadedFile->save();
            return redirect()->back()->with('message','file Uploaded Successfully');
        }else{
            dd(  $response );
            return redirect()->back()->with('message','file Upload Failed');


        }

    }

    public function show(File $file){
         $ext = pathinfo($file->name,PATHINFO_EXTENSION);
         $accessToken = $this->token();

         $response=Http::withHeaders([
            'Authorization'=>'Bearer '.$accessToken,
         ])->get("https://www.googleapis.com/drive/v3/files/{$file->file_id}?alt=media");

         if($response->successful()){
            $filePath = '/downloads/'.$file->file_name.'.'.$ext;

            Storage::put($filePath,$response->body());
            return Storage::download($filePath);
         }
    }

    public function destroy(File $file)
{
    $accessToken = $this->token();

    $response = Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$file->file_id}");

    if ($response->successful()) {
        $file->delete();
        return redirect()->back()->with('message','File Deleted Successfully');
    } else {
        dd($response->body());
        return redirect()->back()->with('message','File Deletion Failed');
    }
}
}
