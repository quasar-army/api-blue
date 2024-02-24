<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PermissionsSeeder extends Seeder
{
    public $actions = [
        'index',
        'find',
        'create',
        'update',
        'delete'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstWhere('name', 'Global Admin');

        // Get a list of all the entities (models)
        $entities = collect(File::allFiles(app_path()))
            ->map(function ($item) {
                $path = $item->getRelativePathName();
                $class = sprintf(
                    '\%s%s',
                    Container::getInstance()->getNamespace(),
                    strtr(substr($path, 0, strrpos($path, '.')), '/', '\\')
                );
                return $class;
            })
            ->filter(function ($class) {
                $valid = false;

                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid =
                        $reflection->isSubclassOf(Model::class) && !$reflection->isAbstract();
                }

                return $valid;
            })->map(function ($class) {
                return with(new $class)->getTable();
            });

        // Create a CRUD permission for every entity
        DB::transaction(function () use ($entities, $adminRole) {
            $entities->each(function ($entity) use ($adminRole) {
                collect($this->actions)->each(function ($action) use ($entity, $adminRole) {
                    $permissionName = $action . ' ' . $entity;
                    Permission::findOrCreate($permissionName);
                    $adminRole->givePermissionTo($permissionName);
                });
            });
        });

        /**
         * Additional permissions
         */
        Permission::findOrCreate('access horizon');
        Permission::findOrCreate('access telescope');
        // Permission::findOrCreate('manage passwords');
        // Permission::findOrCreate("create personal_access_tokens");

        /**
         * Assign additional permissions
         */
        $adminRole->givePermissionTo('access horizon');
        $adminRole->givePermissionTo('access telescope');
    }
}
