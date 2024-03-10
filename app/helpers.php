<?php

use Illuminate\Support\Facades\DB;

//  get product id and type using report id 
function getProductIdAndType($report_id) {
   return DB::table('gems')
            ->select('id', 'type')
            ->where('report_number', $report_id)
            ->union(
                DB::table('diamonds')
                    ->select('id', 'type')
                    ->where('report_number', $report_id)
            )
            ->union(
                DB::table('rudraksha')
                    ->select('id', 'type')
                    ->where('report_number', $report_id)
            )
            ->union(
                DB::table('jewellery')
                    ->select('id', 'type')
                    ->where('report_number', $report_id)
            )
            ->first();
}