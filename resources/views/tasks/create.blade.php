@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
        {!! Form::label('task', 'タスク') !!}
        {!! Form::text('task') !!}
        
        {!! Form::submit('新規作成') !!}
        
    {!! Form::close() !!}

@endsection