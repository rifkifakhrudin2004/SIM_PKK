<?php

namespace App\DataTables;

use App\Models\ArisanModel;
use Yajra\DataTables\Services\DataTable;

class ArisanDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
        ->addColumn('action', function ($arisan) {
            return '<a href="' . route('/arisan/edit', ['id' => $arisan->id_arisan]) . '" class="btn btn-primary mr-2">
                        <i class="fa fa-pencil-alt" style="color: white; font-size: 12px;"></i>
                    </a>' .
                    '<a href="' . route('/arisan/delete', ['id' => $arisan->id_arisan]) . '" class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete?\')">
                        <i class="fa fa-trash" style="color: white; font-size: 12px;"></i>
                    </a>';
        })
            ->eloquent($query)
            ->addColumn('action', 'arisan.action');
    }

    public function query(ArisanModel $model)
    {
        return $model->newQuery()->select('*');
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'buttons' => ['create', 'export', 'print', 'reset', 'reload'],
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'id_anggota',
            'id_bendahara',
            'tgl_arisan',
            'catatan_arisan',
            'setoran_arisan',
        ];
    }
}