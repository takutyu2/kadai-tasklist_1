@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
        {!! Form::label('content', 'タスク') !!}
        {!! Form::text('content') !!}
        
        {!! Form::label('status', 'ステータス') !!}
        {!! Form::select('status', [
            '完了' => '完了',
            '進捗中' => '進捗中',
            '未着手' => '未着手']) !!}

        
        {!! Form::submit('新規作成') !!}
        
    {!! Form::close() !!}

@endsection