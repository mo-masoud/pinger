<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "lan_ip",
        "wan_ip",
        "tunnel_ip",
        "ips",
        'isp',
    ];


    public function moreFields()
    {
        return [
            'main_order_id',
            'backup_order_id',
            'region',
            'finance_code',
            'solution_info',
            'speed',
            'notes',
            'last_update',
            'custom_field1',
            'custom_field2',
            'custom_field3',
            'custom_field4',
            'custom_field5',
            'user_id',
            'sector',	
            'zip_code',	
            'support_supervisor',	
            'phone',	
            'branch_manager',
            'manager_phone',	
            'branch_degree',	
            'work_days',	
            'work_hours',
            'branch_attitude',	
            'ups_attitude',	
            'address',	
            'telephone',
            'connectivity_type',	
            'added_ip_notes',	
            'project_name',
            'connectivity_capacity',	
            'operation_attitude',	
            'router_type',
            'postal_user_id',	
            'counter_user_id',
            'voip_no',	
            'ent_serial',	
            'ent_model',	
            'ent_device_type',	
            'ent_system_name',	
            'ent_ip'
        ];
    }
}
