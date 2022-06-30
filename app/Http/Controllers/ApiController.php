<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ApiController extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected int $perPage = 15;

    protected bool $paginate = false;

    protected string $orderBy = 'id';

    protected string $orderDir = 'desc';

    protected ?string $keywords = null;

    public function __construct(Request $request)
    {
        $request->validate([
            'per_page' => 'sometimes|required|numeric|min:1',
            'paginate' => 'sometimes|required|numeric|in:0,1',
            'order_by' => 'sometimes|required|string|max:25',
            'order_dir' => 'sometimes|required|in:asc,desc',
            'keywords' => 'sometimes|nullable|max:25'
        ]);

        $this->perPage = (int)$request->query('per_page', $this->perPage);
        $this->paginate = (bool)$request->query('paginate', $this->paginate);
        $this->orderBy = $request->query('order_by', $this->orderBy);
        $this->orderDir = $request->query('order_dir', $this->orderDir);
        $this->keywords = $request->has('keywords') ? strip_tags($request->query('keywords')) : null;
    }
}
