<?php

namespace App\Http\Controllers;

use Statamic\Facades\Entry;

class ArtPriceListController extends Controller
{
    public function __invoke(string $slug)
    {
        $entry = Entry::query()
            ->where('collection', 'art')
            ->where('slug', $slug)
            ->first();

        abort_unless($entry && $entry->published(), 404);

        $asset = $entry->augmentedValue('pricelist')->value();

        abort_unless($asset && $asset->exists() && $asset->extension() === 'pdf', 404);

        return $asset->disk()->filesystem()->response($asset->path(), 'pl.pdf', [
            'Content-Type' => 'application/pdf',
        ], 'inline');
    }
}
