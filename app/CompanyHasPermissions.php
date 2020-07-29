<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyHasPermissions extends Model
{
    protected $connection = "mysql_base";

    protected $table = "company_has_user_has_permissions";
}
