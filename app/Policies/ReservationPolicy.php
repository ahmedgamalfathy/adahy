<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reservation;

class ReservationPolicy
{
    /**
     * عرض جميع الحجوزات
     */
    public function viewAny(User $user)
    {
        // يمكن تخصيص هذا حسب نظام الصلاحيات لديك
        return true;
    }

    /**
     * عرض حجز معين
     */
    public function view(User $user, reservation $reservation)
    {
        // المستخدم يمكنه رؤية حجزه الخاص أو لديه صلاحية
        return $reservation->agent === $user->email || $user->status == 1;
    }

    /**
     * إنشاء حجز جديد
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * تعديل حجز
     */
    public function update(User $user, reservation $reservation)
    {
        // يمكن التعديل خلال 24 ساعة من الإنشاء أو لديه صلاحية admin
        $canEditOwn = $reservation->agent === $user->email 
            && $reservation->created_at->diffInHours(now()) < 24;
            
        return $user->status == 1 || $canEditOwn;
    }

    /**
     * حذف حجز
     */
    public function delete(User $user, reservation $reservation)
    {
        // فقط Admin يمكنه الحذف
        return $user->status == 1;
    }
}
