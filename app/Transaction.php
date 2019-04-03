<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Transaction extends Model
{

    const SEARCH_WHITE_LIST = [
        'amount',
        'customerId',
        'from',
        'to',
        'offset'
    ];

    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transactionId', 'customerId', 'amount', 'date'
    ];
    protected $primaryKey = 'transactionId';
    protected $appends = [
        'date'
    ];
    public $timestamps = false;

    public function scopeFrom(Builder $query, $date): Builder
    {
        return $query->where('date', '>=', Carbon::parse($date));
    }

    public function scopeTo(Builder $query, $date): Builder
    {
        return $query->where('date', '<=', Carbon::parse($date));
    }

    public function scopeAmount(Builder $query, $amount): Builder
    {
        return $query->where('amount', $amount);
    }
    public function scopeCustomerId(Builder $query, $customerId): Builder
    {
        return $query->where('customerId', $customerId);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'foreing-key-transactions-customer-id');
    }

    /**
     * Prepare date to format
     * @param string $value
     * @return strint
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

}
