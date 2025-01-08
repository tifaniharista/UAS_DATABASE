@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="slug" placeholder="Slug">
        <textarea name="content" placeholder="Content"></textarea>
        <button type="submit">Save</button>
    </form>
</div>
@endsection