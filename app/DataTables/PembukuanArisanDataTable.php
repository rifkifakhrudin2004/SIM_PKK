<?php


namespace App\DataTables;

use App\Models\PembukuanArisanModel;
use Yajra\DataTables\Services\DataTable;

class PembukuanArisanDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($row) {
                $editUrl = route('pembukuan_arisan.edit', $row->id);
                $deleteUrl = route('pembukuan_arisan.destroy', $row->id);
                $csrf = csrf_field();
                $method = method_field('DELETE');
                return "
                    <a href='{$editUrl}' class='btn btn-primary'>Edit</a>
                    <form action='{$deleteUrl}' method='POST' style='display:inline-block;'>
                        {$csrf} {$method}
                        <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</button>
                    </form>
                ";
            });
    }

    public function query(PembukuanArisanModel $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('pembukuan-arisan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1);
    }

    protected function getColumns()
    {
        return [
            'id',
            'id_arisan',
            'tanggal',
            'pemasukan',
            'pengeluaran',
            'saldo',
            'keterangan',
            'action'
        ];
    }
}