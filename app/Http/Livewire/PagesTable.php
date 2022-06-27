<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PagesTable extends LivewireDatatable
{
    public $model = Page::class;

    public function columns()
    {
        return [
            Column::name('id')->filterable(),

            Column::name('title')->filterable()->searchable(),

            Column::name('content')->filterable()->searchable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions', ['id' => $id]);
            })->unsortable()
        ];
    }
}