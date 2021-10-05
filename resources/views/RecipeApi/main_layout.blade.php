<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div style="display: flex">
        <div class="col-md-7">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Ид</th>
                    <th>Рецепт</th>
                    <th>Единица измерения</th>
                    <th>Картинка</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody id="columns" style="cursor: pointer">
                </tbody>
            </table>
        </div>
        <div style="margin-left: 20px">
            <form method="post" enctype="multipart/form-data" id="imageuloadFiles">
                @csrf
                <div>
                    <label for="recipe_name" class="form-label">Рецепт</label>
                    <input type="text" class="form-control" name="recipe_name" id="recipe_name">
                </div>
                <div>
                    <label for="recipe_name" class="form-label">Единица измерения</label>
                    <input type="text" class="form-control" name="recipe_izm" id="recipe_ing">
                </div>
                <div>
                    <input type="file" name="recipe_img" class="form-control mt-2">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control mt-2">Добавить Рецепт</button>
                </div>
            </form>
            <button class="btn btn-warning form-control mt-2" id="edit_recipe"> Редактироват </button>
        </div>
    </div>
    <div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let i = 1;

    function loadRecipe() {
        $('#columns').html('');
        $.ajax({
            url: "http://127.0.0.1:8000/api/recipe",
            method: "GET",
            type: "json",
            success(data) {
                $("#recipe_name").val("")
                $("#recipe_ing").val("")
                for (item in data) {
                    console.log(data[item])
                    let elems = data[item]
                    for (datas in elems) {
                        let getElems = elems[datas]
                        $("#columns").append(`
                  <tr>
        <td>${i++}</td>
        <td>${getElems.recipe_name}</td>
        <td>${getElems.recipe_izm}</td>
                       <td><img src="{{asset("storage/")}}/${getElems.recipe_img}" with="100" height="100"></td>
                    <td>
                        <button  class="btn btn-warning" onclick="editRecipe('${getElems.recipe_name}','${getElems.recipe_izm}','${datas}')">Редактировать</button>
                        <button  class="btn btn-danger btndels" onclick="delete_recipe('${datas}')" data-del='${datas}' >Удалить</button>
                    </td>
    </tr>
                  `)
                    }
                }
            }

        })
    }
    function delete_recipe(id) {
        console.log(id)
        $.ajax({
            url: `http://127.0.0.1:8000/api/delete/${id}`,
            method: "DELETE",
            type: "json",
            cache: false,
            success(data) {
                loadRecipe()
                console.log(data)
            }
        })
    }

    $("#imageuloadFiles").on("submit", function (e) {
        e.preventDefault()
        let formData = new FormData(this)
        $.ajax({
            url: "http://127.0.0.1:8000/api/recipe",
            method: "POST",
            type: "json",
            data: formData,
            contentType: false,
            processData: false,
            success(data) {
              console.log(data)
                  loadRecipe()
            },
            error: function (data) {
                console.log(data)
            }
        })
    })
let kodse=""
    function editRecipe(item, item2,kod) {
        $("#recipe_name").val(item)
        $("#recipe_ing").val(item2)
        console.log(item)
        kodse =kod
        console.log(kod)
    }
    $("#edit_recipe").click(function () {
        recipe_name = $("#recipe_name").val()
        recipe_izm = $("#recipe_ing").val()
        console.log(kodse)

       $.ajax({
           url:`http://127.0.0.1:8000/api/recipe_update/${kodse}`,
           method:"POST",
           type:"json",
           data:{
                 "recipe_name": recipe_name,
                 "recipe_izm" :recipe_izm
           },
           success(data){
               console.log(data)
           }
       })
    })

    loadRecipe()
</script>
</body>
</html>
