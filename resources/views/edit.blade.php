@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">メモ編集</div>
    {{-- route('store') と書くと→ /store --}}
    <form class="card-body" action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="memo_id" value="{{ $edit_memo['id'] }}" />
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力">{{ $edit_memo['content'] }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
