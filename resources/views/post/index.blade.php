@extends('layouts.app')

@section('title', 'Blog post')

@section('content')


 @forelse($posts as $key=> $posts)
{{-- @break($key =2) stop if key == 2 --}} 

@include('post.partials.post')
@empty
 <div>no post Found!</div>

@endforelse
 {{-- @forelse ($collection as $item)
     
 @empty
     
 @endforelse  forelase = mox of foreach and if--}}  

@endsection     