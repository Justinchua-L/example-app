@extends('layouts.app')

@section('title', $post['title'])

@section('content')

@if($post['is_new'])
<div>A new blog post ! using IF</div>
@else
<div>Blog post is old! using else</div>
@endif


@unless($post['is_new']) <!-- unless is for 1.Condition has to be flase , and no  alternative-->

<div>It is an old post using unless</div>
@endunless



<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content']}}</p>

{{-- 
isset()- is variable or array key defined
empty() is false, 0, empty array --}}

@isset($postp['has_comments'])
<div>The post has some comments.... using isset</div>
@endisset
@endsection