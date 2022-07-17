@extends('layouts.app')

@section('title', 'Blog post')

@section('content')

 @foreach($posts as $key=> $post)
 <div>{{$key}}.{{ $post['title']}}</div>
 @endforeach

 {{-- @forelse ($collection as $item)
     
 @empty
     
 @endforelse  forelase = mox of foreach and if--}}  

@endsection