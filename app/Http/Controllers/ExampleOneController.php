<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Kreait\Firebase\Database;
use Kreait\Firebase\Storage;

class ExampleOneController extends Controller
{
    public function __construct(Database $database,Storage $storage)
    {
        $this->database = $database;
        $this->ref_table_name = "recipe";
        $this->storage = $storage;

    }

    public function showPage()
    {

        return view("MyExample.mainPage");
    }

    public function showPage2()
    {
        $reference = $this->database->getReference($this->ref_table_name);
        $snapshot = $reference->getSnapshot();
        $datas = $snapshot->getValue();



           return view("MyExample.examplePage2", compact(['datas']));
    }

    public function create()
    {
        return view("MyExample.create");
    }

    public function store(Request $request)
    {

        $postData = [
            'recipe_name' => $request->recipe_name,
            'recipe_izm' => $request->recipe_izm
        ];
        $postRef = $this->database->getReference($this->ref_table_name)->push($postData);

        if ($postRef) {
            return redirect('example2');
        }

    }

    public function delete($id)
    {
        $ref = $this->database->getReference()->getChild("recipe")->getChild($id);
        $ref->remove();

        return redirect('example2');
        // dd($id);
    }

    public function edit($id) {
        $key =$id;
        $data = $this->database->getReference($this->ref_table_name)->getChild($id)->getValue();
         return view("MyExample.edit",compact(['data','key']));
    }

    public function update(Request $request,$id){
            $post_data = [
                'recipe_name' => $request->recipe_name,
                'recipe_izm' => $request->recipe_izm
            ];
        $get_old = $this->database->getReference($this->ref_table_name)->getChild($id)->getValue();

     $ref_upd =  $this->database->getReference($this->ref_table_name)->update($post_data);
       return response()->json([
           "update"=>$ref_upd
       ]);

    }

    public function show() {
        $article = Artisan::all();
        dd($article);
    }


    public function myImage(){
         return view("MyExample.myImage");
    }

    public function getImage(Request $request) {
        $sana = date("Y-m-d");

 dd($request->file("human_image")->store("public/{$sana}/"));

        $files = fopen($request->file("human_image"),'r');

       $path =  $request->file("human_image");
     $image = $request->file("human_image")->getClientOriginalName();
     $bucket_name = "recipeapi-7bb9f.appspot.com";
        $storageClient = $this->storage->getStorageClient();

        $bucket =$storageClient->bucket($bucket_name);
        $bucket->upload($files,
            [
         "name"=> $image
            ]
        );
    }
}
