<?php


trait TableComment
{

    public function comment($table, $comment)
    {
        $driver = \Illuminate\Support\Facades\DB::getDriverName();
        switch ($driver) {
            case "pgsql":
                \Illuminate\Support\Facades\DB::statement("comment on table {$table} is '{$comment}'");
                break;
            case "mysql":
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE {$table} COMMENT = '{$comment}'");
                break;
            default:
                \Illuminate\Support\Facades\DB::statement("comment on table {$table} is '{$comment}'");
        }
    }
}