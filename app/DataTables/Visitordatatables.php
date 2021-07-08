<?php

namespace App\DataTables;

use App\Models\Usersvisitor;
use App\Models\Visitordatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Visitordatatables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($model) {
                return (!empty($model->created_at)) ? $model->created_at->diffForHumans() : '';
            })
            ->addColumn('action', 'visitordatatables.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Visitordatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Usersvisitor $model)
    {
        return $model->newQuery();
    }


    public function count()
    {
        return Usersvisitor::all()->count();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('visitordatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('csv'),
                        Button::make('excel'),

                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id'),
            Column::make('device_ip')->title(trans('site.device_ip')),

            Column::make('name')->title(trans('site.name')),
            Column::make('created_at')->title(trans('site.created_at')),
            Column::make('country')->title(trans('site.country')),
            Column::make('city')->title(trans('site.city')),
            Column::make('os')->title(trans('site.os')),
            Column::make('timezone')->title(trans('site.time')),
//            Column::computed('action')
//                ->exportable(false)
//                ->printable(false)
//                ->width(60)
//                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Visitordatatables_' . date('YmdHis');
    }
}
