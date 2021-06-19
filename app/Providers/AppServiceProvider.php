<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Memo;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 全てのメソッドが呼ばれる前に先に呼ばれるメソッド
        view()->composer('*', function ($view) {
            $query_tag = \Request::query('tag');
            // もしクエリパラメータtagがあれば
            if( !empty($query_tag) ){
                // タグで絞り込み
                $memos = Memo::select('memos.*')
                    ->leftJoin('memo_tags', 'memo_tags.memo_id', '=', 'memos.id')
                    ->where('memo_tags.tag_id', '=', $query_tag)
                    ->where('user_id', '=', \Auth::id())
                    ->whereNull('deleted_at')
                    ->orderBy('updated_at', 'DESC')// ASC＝小さい順、DESC=大きい順
                    ->get();

            }else{
            // タグが無ければ全て取得
                $memos = Memo::select('memos.*')
                    ->where('user_id', '=', \Auth::id())
                    ->whereNull('deleted_at')
                    ->orderBy('updated_at', 'DESC')// ASC＝小さい順、DESC=大きい順
                    ->get();
            }

            $tags = Tag::where('user_id', '=', \Auth::id())
                ->whereNull('deleted_at')
                ->orderBy('id', 'DESC')// ASC＝小さい順、DESC=大きい順
                ->get();

            $view->with('memos', $memos)->with('tags', $tags);
        });
    }
}
