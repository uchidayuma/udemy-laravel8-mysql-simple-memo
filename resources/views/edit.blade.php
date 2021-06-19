@extends('layouts.app')

@section('javascript')
<script src="/js/confirm.js"></script>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        メモ編集
        <form id="delete-form" action="{{ route('destory') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}" />
            <i class="fas fa-trash mr-3" onclick="deleteHandle(event);"></i>
        </form>
    </div>
    {{-- route('store') と書くと→ /store --}}
    <form class="card-body my-card-body" action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}" />
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力">{{ $edit_memo[0]['content'] }}</textarea>
        </div>
    @error('content')
        <div class="alert alert-danger">メモ内容を入力してください！</div>
    @enderror
    @foreach($tags as $t)
        <div class="form-check form-check-inline mb-3">
            {{-- 3項演算子 → if文を1行で書く方法 {{ 条件 ? trueだったら : falseだったら }}--}}
            {{-- もし$include_tagsにループで回っているタグのidが含まれれば、ckeckedを書く --}}
          <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id'] }}" value="{{ $t['id'] }}" {{ in_array($t['id'], $include_tags) ? 'checked' : '' }}>
          <label class="form-check-label" for="{{ $t['id'] }}">{{ $t['name']}}</label>
        </div>
    @endforeach
        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="新しいタグを入力" />
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
