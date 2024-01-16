<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Laravel\Nova\Nova;

class ScopeToOrg implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (!app()->runningInConsole()) {
            $builder->whereHas('org', function (Builder $query) use ($model) {
                $orgId = request()->header('org-id');
                $tableName = $model->getTable();
                if ($orgId) {
                    $query->where("$tableName.org_id", $orgId);
                } else {
                    $orgIds = request()->user()->orgs->pluck('id');
                    $query->whereIn("$tableName.org_id", $orgIds);
                }
            });
        }
    }
}
