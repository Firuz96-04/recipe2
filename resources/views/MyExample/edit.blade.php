@extends("MyExample.header")

@section("content")

<h1>EDit firebase</h1>
<div class="row mt-3">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Редактировать Рецепт
                    {{--                        <a href="{{route("create")}}" class="btn btn-sm btn-primary float-end">Добавить Рецепт</a>--}}
                </h4>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route("update",$key)}}">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="recipe_name">Рецепт</label>
                        <input type="text" value="{{$data['recipe_izm']}}" name="recipe_name" class="form-control" id="recipe_name">
                    </div>
                    <div class="form-group">
                        <label for="recipe_ingredient">Единицы измерения</label>
                        <input type="text" value="{{$data['recipe_name']}}" name="recipe_izm" class="form-control" id="recipe_ingredient">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary form-control">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
