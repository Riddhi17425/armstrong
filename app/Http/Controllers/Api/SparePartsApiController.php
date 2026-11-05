<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SparePartsApiController extends Controller
{
    // API 1: Get Machine Catalog List
    public function machines(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 10), 1), 50);
        $search  = trim((string) $request->query('search', ''));

        $paginator = DB::table('product_masters as p')
            ->leftJoin('product_categories as c', 'c.id', '=', 'p.category_id')
            ->whereNull('p.deleted_at')
            ->where('p.product_status', 'Active')
            // ->where('p.is_live', 1)   // uncomment if only live products should show
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('p.product_name', 'like', "%{$search}%")
                      ->orWhere('p.model_name', 'like', "%{$search}%")
                      ->orWhere('c.name', 'like', "%{$search}%");   // also match category, e.g. "FIBC"
                });
            })
            ->select([
                'p.id',
                'p.model_name',
                'p.product_name',
                'p.product_short_desc',
                'p.product_desc',
                'p.front_image',
                'c.name as category_name',
            ])
            ->orderBy('p.id')
            ->paginate($perPage);

        // Load specifications for all machines on this page in ONE query
        $ids   = collect($paginator->items())->pluck('id')->all();
        $specs = DB::table('product_specifications')
            ->whereIn('product_id', $ids)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('product_id');

        $defaultSpecs = $this->defaultSpecifications();
        $data = collect($paginator->items())->map(function ($m) use ($specs, $defaultSpecs) {
            $desc = $m->product_short_desc ?: $m->product_desc;

            return [
                'id'                      => (int) $m->id,
                'model_number'            => $m->model_name,
                'title'                   => $m->model_name,
                'subtitle'                => $m->product_name,
                'category'                => $m->category_name,
                'image_url'               => $this->imageUrl($m->front_image),
                'total_parts_count'       => self::STATIC_PARTS_COUNT,
                'description'             => trim(strip_tags(html_entity_decode((string) $desc))),
                'overview_specifications' => isset($specs[$m->id])
                    ? $specs[$m->id]->map(fn ($s) => [
                        'attribute' => $s->attribute,
                        'value_1'   => $s->value_1,
                        'value_2'   => $s->value_2,
                    ])->values()->all()
                    : $defaultSpecs,
            ];
        })->values()->all();

        return response()->json([
            'status'     => true,
            'message'    => 'Spare parts machines fetched successfully',
            'data'       => $data,
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'last_page'    => $paginator->lastPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
            ],
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    // front_image may hold one path or a JSON list of paths; return the first as a full URL
    private function imageUrl($value, string $baseFolder = 'admin/product/front_image/'): ?string
    {
        if (empty($value)) {
            return null;
        }

        // value may be a JSON list of images; take the first
        $decoded = json_decode($value, true);
        if (is_array($decoded)) {
            $value = $decoded[0] ?? null;
            if (is_array($value)) {
                $value = reset($value);
            }
        }

        if (empty($value)) {
            return null;
        }

        // already a full URL
        if (preg_match('#^https?://#i', $value)) {
            return $value;
        }

        $value = ltrim(str_replace('\\', '/', $value), '/');

        // if the stored value already contains a folder, keep it as is
        $path = str_contains($value, '/') ? $value : $baseFolder . $value;

        // encode each part so spaces and brackets work in URLs ("BaffTek 3.png" -> "BaffTek%203.png")
        $encoded = implode('/', array_map('rawurlencode', explode('/', $path)));

        return url($encoded);
    }

    private function defaultSpecifications(): array
    {
        return [
            ['attribute' => 'Max Speed',     'value_1' => '2800',                        'value_2' => '2400'],
            ['attribute' => 'Stitch Range',  'value_1' => '11-16 / 100 MM',              'value_2' => '8-14/100 MM'],
            ['attribute' => 'Seam',          'value_1' => 'Double Thread',               'value_2' => 'Chain Stitch'],
            ['attribute' => 'No. of Needle', 'value_1' => '2 Needle',                    'value_2' => '2 Needle'],
            ['attribute' => 'No. of Thread', 'value_1' => '4 Thread',                    'value_2' => '4 Thread'],
            ['attribute' => 'Needle Size',   'value_1' => 'DN X 1#25',                   'value_2' => 'DR X 2 # 26'],
            ['attribute' => 'Lubrication',   'value_1' => '(Automatic oil bath system)', 'value_2' => '(Automatic oil bath system)'],
            ['attribute' => 'Fabric',        'value_1' => 'For HDPE/PP',                 'value_2' => 'For Hessian/Tar laminated/Jute Bag'],
        ];
    }

    // API 2: Get Paginated Spare Parts List for a Machine

        private const STATIC_PARTS_COUNT = 45;

    // Static parts list (same for every machine). Replace with DB data later.
    private function staticParts(int $machineId): array
    {
        $base = [
            ['Miscellaneous Cover',            'misc_cover.png'],
            ['Thread Eyelet',                  'thread_eyelet.png'],
            ['Miscellaneous Cover & Base',     'misc_cover_base.png'],
            ['Miscellaneous Bushings',         'misc_bushings.png'],
            ['Looper Thread Eyelet',           'looper_thread_eyelet.png'],
            ['Needle Bar Mechanism',           'needle_bar.png'],
            ['Main Driving Shaft Mechanism',   'main_driving_shaft.png'],
            ['Looper Driving Mechanism',       'looper_driving.png'],
            ['Feed Driving Mechanism',         'feed_driving.png'],
            ['Feed Driving Mechanism',         'feed_driving_2.png'],
            ['Pressure Foot Lifter Mechanism', 'pressure_foot_lifter.png'],
            ['Oil Lubricating System',         'oil_lubricating.png'],
        ];

        $parts = [];
        for ($n = 1; $n <= self::STATIC_PARTS_COUNT; $n++) {
            [$title, $image] = $base[($n - 1) % count($base)];
            $parts[] = [
                'id'          => $machineId * 1000 + $n,
                'machine_id'  => $machineId,
                'part_number' => 'SP-' . (50290 + $n),
                'title'       => $title,
                'image_url'   => $this->imageUrl('front/images/spare_parts/' . $image),
            ];
        }

        return $parts;
    }

    // API 2: Get Paginated Spare Parts List for a Machine (static data)
    public function machineParts(Request $request, $machineId)
    {
        $machine = DB::table('product_masters')
            ->where('id', $machineId)
            ->whereNull('deleted_at')
            ->where('product_status', 'Active')
            ->first();

        if (!$machine) {
            return response()->json([
                'status'  => false,
                'message' => 'Machine not found',
                'data'    => [],
            ], 404);
        }

        $perPage = min(max((int) $request->query('per_page', 20), 1), 100);
        $page    = max((int) $request->query('page', 1), 1);
        $search  = trim((string) $request->query('search', ''));

        $parts = $this->staticParts((int) $machine->id);

        if ($search !== '') {
            $parts = array_filter($parts, fn ($p) =>
                stripos($p['title'], $search) !== false ||
                stripos($p['part_number'], $search) !== false
            );
        }

        $parts    = array_values($parts);
        $total    = count($parts);
        $lastPage = max((int) ceil($total / $perPage), 1);
        $data     = array_slice($parts, ($page - 1) * $perPage, $perPage);

        return response()->json([
            'status'     => true,
            'message'    => 'Spare parts fetched successfully',
            'data'       => $data,
            'pagination' => [
                'current_page' => $page,
                'last_page'    => $lastPage,
                'per_page'     => $perPage,
                'total'        => $total,
            ],
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    // API 3: Get Single Spare Part Detail
    public function partDetails($partId)
    {
        $partId    = (int) $partId;
        $machineId = intdiv($partId, 1000);

        $machine = DB::table('product_masters')
            ->where('id', $machineId)
            ->whereNull('deleted_at')
            ->first();

        $part = null;
        if ($machine) {
            foreach ($this->staticParts($machineId) as $p) {
                if ($p['id'] === $partId) {
                    $part = $p;
                    break;
                }
            }
        }

        if (!$part) {
            return response()->json([
                'status'  => false,
                'message' => 'Part not found',
                'data'    => (object) [],
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Part details fetched successfully',
            'data'    => [
                'id'             => $part['id'],
                'machine_id'     => $part['machine_id'],
                'machine_name'   => $machine->model_name,
                'part_number'    => $part['part_number'],
                'title'          => $part['title'],
                'image_url'      => $part['image_url'],
                'description'    => $this->defaultPartDescription(),
                'specifications' => $this->defaultPartSpecifications(),
            ],
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }
    
    // Temporary static data, used until real data exists for a part
    private function defaultPartSpecifications(): array
    {
        return [
            ['attribute' => 'Title',       'value' => 'Title'],
            ['attribute' => 'Lorem Ipsum', 'value' => 'Lorem Ipsum'],
            ['attribute' => 'Lorem Ipsum', 'value' => 'Lorem Ipsum'],
        ];
    }

    private function defaultPartDescription(): string
    {
        return 'Lorem ipsum dolor sit amet consectetur. Arcu cursus euismod eleifend iaculis scelerisque vitae. Dolor sed amet mollis viverra sit. Sit scelerisque et augue ac diam pulvinar purus at fringilla.';
    }

    // API 4: Submit Inquiry
    public function submitInquiry(Request $request)
    {
        $input = $request->all();

        // accept "email" as an alias of "email_id"
        if (empty($input['email_id']) && !empty($input['email'])) {
            $input['email_id'] = $input['email'];
        }

        // clean the mobile number (remove spaces and dashes)
        if (isset($input['mobile_number'])) {
            $input['mobile_number'] = preg_replace('/[\s\-]/', '', (string) $input['mobile_number']);
        }

        $validator = Validator::make($input, [
            'purpose_of_inquiry'    => 'required|in:New Setup,Replace Existing Machine,Seeking Automation,Just Exploring',
            'full_name'             => 'required|string|max:255',
            'mobile_number'         => ['required', 'regex:/^[0-9]{10}$/'],
            'email_id'              => 'nullable|email|max:255',
            'company_name'          => 'nullable|string|max:255',
            'inquiry_type'          => 'nullable|string|max:50',
            'machine_id'            => 'nullable|integer',
            'machine_name'          => 'nullable|string|max:255',
            'part_id'               => 'nullable|integer',
            'part_number'           => 'nullable|string|max:255',
            'part_name'             => 'nullable|string|max:255',
            'interested_spareParts' => 'nullable|array',
        ], [
            'mobile_number.regex' => 'Mobile number must be exactly 10 digits.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // accept different spellings of the parts list
        $list = $input['interested_spareParts']
            ?? $input['interested_spare_parts']
            ?? $input['interestedSpareParts']
            ?? [];
        $first = (is_array($list) && isset($list[0]) && is_array($list[0])) ? $list[0] : [];

        // 1) values sent by the app always win
        $partId      = $input['part_id']      ?? ($first['id'] ?? null);
        $machineId   = $input['machine_id']   ?? null;
        $machineName = $input['machine_name'] ?? null;
        $partNumber  = $input['part_number']  ?? ($first['name'] ?? null);
        $partName    = $input['part_name']    ?? null;

        // 2) only fill what is still missing, using our own data
        if ($partId && (!$machineId || !$machineName || !$partNumber || !$partName)) {
            $mId = intdiv((int) $partId, 1000);
            $m   = DB::table('product_masters')->where('id', $mId)->first();

            if ($m) {
                foreach ($this->staticParts($mId) as $p) {
                    if ($p['id'] === (int) $partId) {
                        $machineId   = $machineId   ?: $mId;
                        $machineName = $machineName ?: $m->model_name;
                        $partNumber  = $partNumber  ?: $p['part_number'];
                        $partName    = $partName    ?: $p['title'];
                        break;
                    }
                }
            }
        }

        if ($machineId && !$machineName) {
            $machineName = DB::table('product_masters')->where('id', $machineId)->value('model_name');
        }

        $id = DB::table('spare_part_inquiries')->insertGetId([
            'purpose_of_inquiry' => $input['purpose_of_inquiry'],
            'full_name'          => trim($input['full_name']),
            'mobile_number'      => $input['mobile_number'],
            'email_id'           => $input['email_id'] ?? null,
            'company_name'       => $input['company_name'] ?? null,
            'inquiry_type'       => $input['inquiry_type'] ?? 'spare_part',
            'machine_id'         => $machineId,
            'machine_name'       => $machineName,
            'part_id'            => $partId,
            'part_number'        => $partNumber,
            'part_name'          => $partName,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        // INQ-2026-0001 style code
        $code = 'INQ-' . now()->year . '-' . str_pad($id, 4, '0', STR_PAD_LEFT);
        DB::table('spare_part_inquiries')->where('id', $id)->update(['inquiry_code' => $code]);

        return response()->json([
            'status'     => true,
            'message'    => 'Inquiry submitted successfully',
            'inquiry_id' => $code,
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }
}