<?php

namespace Logistic\Modules\Domain\Assignment\src\Models;

use Illuminate\Database\Eloquent\Model;
use Logistic\Modules\Domain\Assignment\src\Constants\AssignmentConstants;

class Assignment extends Model
{
    protected $table = AssignmentConstants::TABLE;
    protected $fillable = AssignmentConstants::FILLABLE;
}
