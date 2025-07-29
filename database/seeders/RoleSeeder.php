<?php
use App\Models\User;
namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$user = User::find(1);
$role = Role::firstOrCreate(['name' => 'Admin']);
$user->assignRole($role);

    Role::create(['name' => 'Admin']);
    Role::create(['name' => 'Vendor']);
    Role::create(['name' => 'Funeral Home']);
    Role::create(['name' => 'Customer']);
    }
}
