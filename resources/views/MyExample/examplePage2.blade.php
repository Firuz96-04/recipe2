@extends('MyExample.header')

@section('content')

    <div class="row mt-3">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Рецепты
                        <a href="{{route("create")}}" class="btn btn-sm btn-primary float-end">Добавить Рецепт</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Ид</th>
                            <th>Рецепт</th>
                            <th>Единицы измерения</th>
                            <th>Фотография</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($datas) && count($datas) >0)

                        @php $i=1 @endphp
                        @foreach($datas as $key => $value)

                            <tr style="cursor: pointer;">
                                <td>{{$i++}}</td>
                                <td>{{$value['recipe_izm']}}</td>
                                <td>{{$value['recipe_name']}}</td>
                                <td>kg gram</td>
                                <td>
                                    <div style="display: flex">
                                        <a class="btn btn-warning" href="{{route('edit',$key)}}"> Редактировать</a>
                                        <form method="POST" action="{{route('delete',$key)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="margin-left: 5px"> Удалит</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <h2>Нет записей</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
