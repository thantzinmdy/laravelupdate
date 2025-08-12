<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use Modules\Student\Entities\Student;
use Modules\Instructor\Entities\Instructor;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    
    /**
     * @return mixed
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    /**
     * @return mixed
     */
    public function instructor()
    {
        return $this->hasOne(Instructor::class, 'user_id', 'id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }
}
