@extends('layouts.app')
@section('content')

    <div class="container">
        <div>
            <h2 class="text-center">Selectionner les categories ou vos souhaitez recevoir des
                notifications à propos des emplois disponibles</h2>
        </div>

        <div class="row p-3" style="background: rgb(236, 229, 187); border-radius:10px ">
            <ul>
                @foreach ($categories as $category)
                    <li class="mb-2 mx-2"><input type="checkbox" name="category" value="{{ $category->id }}" id=""> 
                        <span style="font-size: 17px; color:goldenrod">{{ $category->name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
