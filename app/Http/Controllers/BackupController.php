<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\DbDumper\DumperFactory;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        $backups = Storage::disk('backups')->files();
        return view('admin.backups.index', compact('backups'));
    }

    public function create()
    {
        $dumper = DumperFactory::create();
        $dumper->dump()->toDatabase('mysql', [
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
        ]);

        $filename = now()->format('Y-m-d_H-i-s') . '_database_backup.sql';
        $dumper->save($filename);

        return redirect()->route('admin.backups.index')->with('message', 'Backup created successfully!');
    }

    public function download($filename)
    {
        return response()->download(storage_path('app/backups/' . $filename));
    }

    public function delete($filename)
    {
        Storage::disk('backups')->delete($filename);
        return redirect()->route('admin.backups.index')->with('message', 'Backup deleted successfully!');
    }
}