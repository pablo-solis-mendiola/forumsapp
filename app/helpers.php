<?php

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

function uuid(): string {
    return Str::uuid();
}