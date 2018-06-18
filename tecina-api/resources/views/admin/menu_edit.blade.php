@extends('layouts.app')

@section('content')
  @foreach($dishes as $dish)
    @foreach (prettyTranslate($dish->getTranslate()) as $id => $translation)
      ID{{$id}}

    @endforeach
  @endforeach

@endsection
