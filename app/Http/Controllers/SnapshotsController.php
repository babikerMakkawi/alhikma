<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\DbSnapshots\SnapshotFactory;
use Spatie\DbSnapshots\SnapshotRepository;

class SnapshotsController extends Controller
{
    protected SnapshotRepository $repository;
    protected SnapshotFactory $factory;

    public function __construct()
    {
        $disk = Storage::disk(config('db-snapshots.disk'));
        $this->repository = new SnapshotRepository($disk);
        $this->factory = app(SnapshotFactory::class);
    }

    public function index()
    {
        $snapshots = $this->repository->getAll()->map(function ($snapshot) {
            return [
                'name' => $snapshot->name,
                'fileName' => $snapshot->fileName,
                'size' => $this->formatBytes($snapshot->disk->size($snapshot->fileName)),
                'createdAt' => $snapshot->createdAt()->format('Y-m-d H:i:s'),
                'createdAtDiff' => $snapshot->createdAt()->diffForHumans(),
            ];
        });

        return view('dashboard.snapshots.index', compact('snapshots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9_-]+$/',
                'min:1',
            ],
        ], [
            'name.required' => 'اسم اللقطة مطلوب',
            'name.string' => 'اسم اللقطة يجب أن يكون نصاً',
            'name.max' => 'اسم اللقطة يجب ألا يتجاوز 255 حرفاً',
            'name.min' => 'اسم اللقطة يجب أن يكون حرفاً واحداً على الأقل',
            'name.regex' => 'اسم اللقطة يجب أن يحتوي فقط على أحرف إنجليزية وأرقام وشرطة سفلية (_) وشرطة (-)',
        ]);

        try {
            $diskName = config('db-snapshots.disk', 'snapshots');
            $connectionName = config('db-snapshots.default_connection') ?? config('database.default');
            $compress = config('db-snapshots.compress', false);

            // Validate that connection exists
            if (!config("database.connections.{$connectionName}")) {
                throw new \Exception("اتصال قاعدة البيانات '{$connectionName}' غير موجود");
            }

            // Check if mysqldump path is configured
            $mysqlDumpPath = config("database.connections.{$connectionName}.dump.dumpBinaryPath");
            if (!$mysqlDumpPath) {
                return redirect()->route('snapshots.index')
                    ->with('error', 'مسار mysqldump غير محدد. يرجى إضافة MYSQL_DUMP_PATH في ملف .env (مثال: MYSQL_DUMP_PATH=C:\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\)');
            }

            // Check if snapshot with this name already exists
            $existingSnapshot = $this->repository->findByName($request->name);
            if ($existingSnapshot) {
                return redirect()->route('snapshots.index')
                    ->with('error', 'يوجد لقطة بنفس الاسم بالفعل: ' . $request->name);
            }

            $snapshot = $this->factory->create(
                $request->name,
                $diskName,
                $connectionName,
                $compress
            );

            Log::warning('Snapshot created', ['user_id' => optional($request->user())->id, 'snapshot' => $snapshot->name]);

            return redirect()->route('snapshots.index')
                ->with('success', 'تم إنشاء اللقطة بنجاح: ' . $snapshot->name);
        } catch (\Exception $e) {
            Log::error('Snapshot create failed', ['user_id' => optional($request->user())->id, 'error' => $e->getMessage(), 'exception' => $e]);

            return redirect()->route('snapshots.index')
                ->with('error', 'حدث خطأ أثناء إنشاء اللقطة: ' . $e->getMessage());
        }
    }

    public function load(Request $request, string $name)
    {
        $request->validate([
            'confirm' => 'required|accepted',
        ], [
            'confirm.required' => 'يجب تأكيد عملية التحميل',
            'confirm.accepted' => 'يجب الموافقة على عملية التحميل',
        ]);

        // Validate snapshot name format
        if (!preg_match('/^[a-zA-Z0-9_-]+$/', $name)) {
            return redirect()->route('snapshots.index')
                ->with('error', 'اسم اللقطة غير صحيح');
        }

        try {
            $snapshot = $this->repository->findByName($name);

            if (!$snapshot) {
                return redirect()->route('snapshots.index')
                    ->with('error', 'اللقطة غير موجودة: ' . $name);
            }

            $connectionName = config('db-snapshots.default_connection') ?? config('database.default');
            
            // Validate that connection exists
            if (!config("database.connections.{$connectionName}")) {
                throw new \Exception("اتصال قاعدة البيانات '{$connectionName}' غير موجود");
            }

            $snapshot->load($connectionName, true);

            Log::warning('Snapshot loaded (database restored)', ['user_id' => optional($request->user())->id, 'snapshot' => $snapshot->name]);

            return redirect()->route('snapshots.index')
                ->with('success', 'تم تحميل اللقطة بنجاح: ' . $snapshot->name);
        } catch (\Exception $e) {
            Log::error('Snapshot load failed', ['user_id' => optional($request->user())->id, 'error' => $e->getMessage(), 'exception' => $e]);

            return redirect()->route('snapshots.index')
                ->with('error', 'حدث خطأ أثناء تحميل اللقطة: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, string $snapshot)
    {
        $request->validate([
            'confirm' => 'required|accepted',
        ], [
            'confirm.required' => 'يجب تأكيد عملية الحذف',
            'confirm.accepted' => 'يجب الموافقة على عملية الحذف',
        ]);

        // Validate snapshot name format
        if (!preg_match('/^[a-zA-Z0-9_-]+$/', $snapshot)) {
            return redirect()->route('snapshots.index')
                ->with('error', 'اسم اللقطة غير صحيح');
        }

        try {
            $snapshotObj = $this->repository->findByName($snapshot);

            if (!$snapshotObj) {
                return redirect()->route('snapshots.index')
                    ->with('error', 'اللقطة غير موجودة: ' . $snapshot);
            }

            $snapshotObj->delete();

            Log::warning('Snapshot deleted', ['user_id' => optional($request->user())->id, 'snapshot' => $snapshot]);

            return redirect()->route('snapshots.index')
                ->with('success', 'تم حذف اللقطة بنجاح: ' . $snapshot);
        } catch (\Exception $e) {
            Log::error('Snapshot delete failed', ['user_id' => optional($request->user())->id, 'error' => $e->getMessage(), 'exception' => $e]);

            return redirect()->route('snapshots.index')
                ->with('error', 'حدث خطأ أثناء حذف اللقطة: ' . $e->getMessage());
        }
    }

    protected function formatBytes($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }

        return round($size, $precision) . ' ' . $units[$i];
    }
}
