<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UsersModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($user) {
                return '<a href="' . route('users.edit', ['id' => $user->id_users]) . '" class="btn btn-primary mr-2">
                            <i class="fa fa-pencil-alt" style="color: white; font-size: 12px;"></i>
                        </a>' .
                        '<a href="' . route('users.delete', ['id' => $user->id_users]) . '" class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete?\')">
                            <i class="fa fa-trash" style="color: white; font-size: 12px;"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->setRowId('id_users');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UsersModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_users')->title('User ID'),
            Column::make('username'),
            Column::make('nama'),
            Column::make('level_id')->title('Level ID'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
