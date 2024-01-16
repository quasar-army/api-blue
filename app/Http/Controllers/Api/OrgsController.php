<?php

namespace App\Http\Controllers\Api;

use App\Models\Org;
use Illuminate\Database\Eloquent\Model;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class OrgsController extends Controller
{
    use DisableAuthorization;

    protected $model = Org::class;

    public function filterableBy(): array
    {
        return ['*'];
    }

    public function includes(): array
    {
        return ['*'];
    }

    public function sortableBy(): array
    {
        return ['*'];
    }

    public function aggregates(): array
    {
        return ['*'];
    }

    protected function performStore(
        Request $request,
        Model $post,
        array $attributes
    ): void {
        $this->performFill($request, $post, $attributes);
        $post->save();
        $post->users()->attach($request->user()->id);
    }
}
