<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CustomPermission extends SpatiePermission
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name', 'group_name'];

    // تأكد من أن توقيع الدالة يطابق الكلاس الأساسي
    public function roles(): BelongsToMany // تحديد نوع الإرجاع
    {
        return $this->belongsToMany(SpatieRole::class, 'role_has_permissions', 'permission_id', 'role_id');
    }
}