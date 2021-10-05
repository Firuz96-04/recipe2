<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class RecipeController extends Controller
{

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->table_name = "recipe";
    }

    public function recipes()
    {


        $refeerence = $this->database->getReference($this->table_name);
        $snapshot = $refeerence->getSnapshot();
        $data_recipe = $snapshot->getValue();

        return response()->json([
            "recipe" => $data_recipe,
     //       "status" => "OK"
        ], 200);
    }


    public function store(Request $request)
    {
        $image ="";
            if ($request->recipe_img == null) {

                $image = "mydefaults.png";
            }
            else {
                $data_image = date("Y-m-d");
                $image = $request->file("recipe_img")->store("public/" . $data_image);
            }


        $recipe_data = [
            'recipe_name' => $request->recipe_name,
            'recipe_izm' => $request->recipe_izm,
            'recipe_img' => substr($image, 7)
        ];

        $postRef = $this->database->getReference($this->table_name)->push($recipe_data);

        return response()->json([
            "status" => "OK",
           // "recipe" => $postRef
        ], 201);

    }

    public function delete($id)
    {
        $ref = $this->database->getReference()->getChild($this->table_name)->getChild($id);
        $ref->remove();
        return response()->json(
            [
                "status" => "OK"
            ], 201);
    }

    public function update(Request $request, $id)
    {
        $update_data = [

            "recipe_name" => $request->recipe_name,
            "recipe_izm" => $request->recipe_izm,
        ];

      // $this->database->getReference($this->table_name)->getChild($id)->getValue();

     //   $edit_data = $this->database->getReference($this->table_name)->getChild($id)->getValue();
       $this->database->getReference($this->table_name.'/'.$id)->update($update_data);

        return response()->json([
                "recipe" => $update_data
        ], 200);

    }

}

