<?php

// app/Console/Commands/RestoreDatabase.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\Storage;

class RestoreDatabase extends Command
{
    protected $signature = 'db:restore {file}';
    protected $description = 'Restore the database from a backup file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = $this->argument('file');

        if (!Storage::disk('local')->exists($file)) {
            $this->error("Backup file not found: {$file}");
            return 1;
        }

        $filePath = Storage::disk('local')->path($file);

        MySql::create()
            ->setDbName(config('database.connections.mysql.database'))
            ->setUserName(config('database.connections.mysql.username'))
            ->setPassword(config('database.connections.mysql.password'))
            ->importFromFile($filePath);

        $this->info("Database restored successfully from {$file}");
        return 0;
    }
}
