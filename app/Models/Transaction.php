<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperTransaction
 */
class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const GATEWAYS = [
        'kapitalbank' => 1,
        'pashabank' => 2,
        'fake' => 3
    ];

    public const STATUS = [
        'pending' => 1,
        'approved' => 2,
        'canceled' => 3,
        'declined' => 4,
        'reversed' => 5,
        'refunded' => 6
    ];

    protected $casts = [
        'gateway' => 'integer',
        'status' => 'integer',
        'transaction_id' => 'string',
        'meta' => 'object',
        'amount' => 'double',
        'currency' => 'integer'
    ];

    public function makeChecksum(): string
    {
        return hash('sha256', $this->gateway . '/'
            . $this->transaction_id . '/'
            . ($this->amount * 100)
            . $this->currency . '/'
            . hash('sha256', json_encode($this->meta)));
    }
}
