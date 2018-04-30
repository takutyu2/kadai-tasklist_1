@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスク編集ページ</h1>
    
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        
        {!! Form::label('content', 'タスク') !!}
        {!! Form::text('content') !!}
        
        {!! Form::label('status', 'ステータス') !!}
        {!! Form::select('status', [
            '完了' => '完了',
            '進捗中' => '進捗中',
            '未着手' => '未着手']) !!}
        
        {!! Form::submit('更新') !!}
        
    {!! Form::close() !!}

@endsection