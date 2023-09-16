<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleEditor = Role::create(['name' => 'editor']);

        $permissions = [
            [
                'group_name' => 'Depertment',
                'permissions' => [
                    'dashboard.depertment.index',

                ],
                'permission_menu'=>[
                      'Department Setup',

                ],
            ],
            [
                'group_name' => 'Unit',
                'permissions' => [
                    'dashboard.unit.index',

                ],
                'permission_menu'=>[
                      'Unit Setup',
                ],
            ],
            [
                'group_name' => 'Office',
                'permissions' => [
                    'dashboard.office.index',
                ],
                'permission_menu'=>[
                      'Office Setup',
                ],
            ],
            [
                'group_name' => 'User Role',
                'permissions' => [
                    'user.role.create',
                    'user.role.permission',
                ],
                'permission_menu'=>[
                      'User Role Setup',
                      'User Role Permission',
                      'Export',
                ],
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    'dashboard.user.index',
                ],
                'permission_menu'=>[
                      'User Setup',
                ],
            ],
            [
                'group_name' => 'Designation',
                'permissions' => [
                    'dashboard.designation.index',
                ],
                'permission_menu'=>[
                      'Designation Setup',
                ],
            ],
            [
                'group_name' => 'Year Setup',
                'permissions' => [
                    'dashboard.yearSetup.index',
                ],
                'permission_menu'=>[
                      'Year Setup',
                ],
            ],
            [
                'group_name' => 'Mill Year Setup',
                'permissions' => [
                    'dashboard.millYearSetup.index',
                ],
                'permission_menu'=>[
                      'Mill Year',
                ],
            ],
            [
                'group_name' => 'Mis Report',
                'permissions' => [
                    'dashboard.mis_report.index',
                ],
                'permission_menu'=>[
                      'Mis Report Setup',
                ],
            ],
            [
                'group_name' => 'Report',
                'permissions' => [
                    'dashboard.report.index',
                ],
                'permission_menu'=>[
                      'Report Setup',
                ],
            ],
            [
                'group_name' => 'gazzete',
                'permissions' => [
                    'gazzete.index',
                    'gazzeteList',
                ],
                'permission_menu'=>[
                      'Gazzete Setup',
                      'Gazzete List',
                ],
            ],
            [
                'group_name' => 'Route Setup',
                'permissions' => [
                    'route.create',
                    'route.group.create',
                    'gazzete.print',
                    'gazzete.list',
                ],
                'permission_menu'=>[
                      'Route Create',
                      'Route Group Create',
                      'Gazzet Print',
                      'Gazzet List',
                ],
            ],
            [
                'group_name' => 'Session Setup',
                'permissions' => [
                    'session.create',
                ],
                'permission_menu'=>[
                      'Session Create',
                ],
            ],
            [
                'group_name' => 'Center Setup',
                'permissions' => [
                    'dashboard.center.index',
                ],
                'permission_menu'=>[
                      'Center Setup',
                ],
            ],

            [
                'group_name' => 'Farmer',
                'permissions' => [
                    'dashboard.farmer.index',
                ],
                'permission_menu'=>[
                      'Farmer Setup',
                ],
            ],
            [
                'group_name' => 'Purjee',
                'permissions' => [
                    'dashboard.purjee.index',
                ],
                'permission_menu'=>[
                      'Purjee Setup',
                ],
            ],

            [
                'group_name' => 'Send Purjee',
                'permissions' => [
                    'dashboard.sendPurjee.index',
                ],
                'permission_menu'=>[
                      'Send Purjee Setup',
                ],
            ],

            [
                'group_name' => 'Send Payment',
                'permissions' => [
                    'dashboard.sendPayment.index',
                ],
                'permission_menu'=>[
                      'Send Payment',
                ],
            ],
            [
                'group_name' => 'SMS',
                'permissions' => [
                'dashboard.sms.index',
                ],
                'permission_menu'=>[
                      'SMS Setup',
                ],
            ],
            [
                'group_name' => 'Send SMS',
                'permissions' => [
                    'dashboard.sendSms.index',
                ],
                'permission_menu'=>[
                      'Send SMS Setup',
                ],
            ],
            [
                'group_name' => 'Production Report',
                'permissions' => [
                    'dashboard.productionReport.index',
                ],
                'permission_menu'=>[
                      'Production Report Setup',
                ],
            ],
            [
                'group_name' => 'Mils Report',
                'permissions' => [
                    'mill_list',
                ],
                'permission_menu'=>[
                      'Mill Report',
                ],
            ],
            [
                'group_name' => 'Loan Setup',
                'permissions' => [
                    'head.entry',
                    'sub.head.entry',
                    'land.loan.setup',
                    'loan.entry',
                ],
                'permission_menu'=>[
                      'Head Entry',
                      'Sub Head Entry',
                      'Land loan Setup',
                      'Loan Entry',
                ],
            ],

        ];

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j],'menu_name'=>$permissions[$i]['permission_menu'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);


            }
        }
    }
}
