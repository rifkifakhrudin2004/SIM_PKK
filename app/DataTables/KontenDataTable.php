<?php

namespace App\DataTables;

use App\Models\Konten;
use App\Models\KontenModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KontenDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($konten) {
                return '<a href="' . route('/users/edit', ['id' => $konten->id_konten]) . '" class="btn btn-primary mr-2">
                            <i class="fa fa-pencil-alt" style="color: white; font-size: 12px;"></i>
                        </a>' .
                        '<a href="' . route('/users/delete', ['id' => $konten->id_konten]) . '" class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete?\')">
                            <i class="fa fa-trash" style="color: white; font-size: 12px;"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KontenModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_konten'),
            Column::make('tgl_konten'),
            Column::make('foto_konten'),
            Column::make('deskripsi_konten'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the dataTable columns definition.
     */

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Konten_' . date('YmdHis');
    }
}
