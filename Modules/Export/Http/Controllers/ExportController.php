<?php

namespace Modules\Export\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Client;
use Modules\Owner\Entities\Owner;
use Modules\Agent\Entities\Agent;
use Modules\Export\Services\ExportService;
use Carbon\Carbon;

class ExportController extends Controller
{
    protected $exportService;

    public function __construct(ExportService $exportService)
    {
        $this->exportService = $exportService;
    }

    /**
     * Display the export form
     *
     * @return Renderable
     */
    public function index()
    {
        $owners = Owner::orderBy('name')->get();
        $agents = Agent::orderBy('name')->get();

        return view('export::index', compact('owners', 'agents'));
    }

    /**
     * Export data to Excel
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'trademark_name' => 'nullable|string|max:255',
            'owner_id' => 'nullable|exists:owners,id',
            'agent_id' => 'nullable|exists:agents,id',
        ]);

        // Build query with filters
        $query = Client::with(['owner', 'agent']);

        // Apply filters
        if ($request->filled('start_date')) {
            $query->whereDate('filling_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('filling_date', '<=', $request->end_date);
        }

        if ($request->filled('trademark_name')) {
            $query->where('trademark_name', 'like', '%' . $request->trademark_name . '%');
        }

        if ($request->filled('owner_id')) {
            $query->where('owner_id', $request->owner_id);
        }

        if ($request->filled('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }

        // Get the filtered data
        $clients = $query->orderBy('filling_date', 'desc')->get();

        // Generate filename with timestamp
        $filename = 'client_export_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx';

        // Export to Excel
        return $this->exportService->exportToExcel($clients, $filename);
    }

    /**
     * Preview the export data
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function preview(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'trademark_name' => 'nullable|string|max:255',
            'owner_id' => 'nullable|exists:owners,id',
            'agent_id' => 'nullable|exists:agents,id',
        ]);

        // Build query with filters
        $query = Client::with(['owner', 'agent']);

        // Apply filters
        if ($request->filled('start_date')) {
            $query->whereDate('filling_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('filling_date', '<=', $request->end_date);
        }

        if ($request->filled('trademark_name')) {
            $query->where('trademark_name', 'like', '%' . $request->trademark_name . '%');
        }

        if ($request->filled('owner_id')) {
            $query->where('owner_id', $request->owner_id);
        }

        if ($request->filled('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }

        // Get count and limited preview data
        $totalCount = $query->count();
        $previewData = $query->orderBy('filling_date', 'desc')->limit(10)->get();

        return response()->json([
            'total_records' => $totalCount,
            'preview_data' => $previewData->map(function ($client, $index) {
                return [
                    'no' => $index + 1,
                    'main_code' => $client->main_code,
                    'sub_code' => $client->sub_code,
                    'filling_date' => $client->filling_date ? $client->filling_date->format('Y-m-d') : '',
                    'trademark_name' => $client->trademark_name,
                    'owner_name' => $client->owner->name ?? '',
                    'tm_types' => $client->tm_types_label,
                    'class' => $client->class ?? '',
                    'application_number' => $client->application_number,
                    'owner_address' => $client->owner_address ?? '',
                    'owner_phone' => $client->owner_phone ?? '',
                    'agent_name' => $client->agent->name ?? '',
                    'local_mark' => $client->local_mark,
                    'foreign_mark' => $client->foreign_mark,
                    'remark' => $client->remark ?? ''
                ];
            })
        ]);
    }
}
