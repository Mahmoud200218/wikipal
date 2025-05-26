<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class LatestNewsService
{

    public function getLatestNews()
    {
        // Latest Random News
        $tables = ['businesses', 'opinions', 'politics', 'sports', 'stories', 'styles', 'technologies', 'travel'];
        $latestNews = collect([]);

        foreach ($tables as $table) {
            $latestNews = $latestNews->merge(
                DB::table($table)
                    ->select('id', 'title', 'created_at')
                    ->addSelect(DB::raw("'$table' as table_name"))
                    ->orderByDesc('created_at')
                    ->limit(6)
                    ->get()
            );
        }
        return $latestNews->sortByDesc('created_at')->take(8);
    }
};
 