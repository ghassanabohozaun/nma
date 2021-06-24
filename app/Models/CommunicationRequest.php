<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunicationRequest extends Model
{
    protected $table = 'communication_requests';
    protected $fillable = [
        'communication_sender',
        'communication_email',
        'communication_mobile',
        'communication_title',
        'communication_details',
        'communication_status',
    ];
}
