<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\TypeHallDatatable;
use App\Models\Typevenue;
use App\Models\Venues_dates_price;
use App\Models\Venues_days_price;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DateHallDatatables extends DataTable
{


    private $crudName = 'halls';

    private function getRoutes() {
        return [
            'update' => "dashboard.$this->crudName.edit",
            'show' => "dashboard.$this->crudName.show",
            'delete' => "dashboard.$this->crudName.destroy",
            'block' =>  "dashboard.$this->crudName.block",
        ];
    }

    private function getPermissions()
    {
        return [
            'update' => 'update_' . $this->crudName,
            'delete' => 'delete_' . $this->crudName,
            'create' => 'create_' . $this->crudName
        ];
    }
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
            })->editColumn('venue_id', function ($model) {
                return $model->venue->name;
            })


            ->addColumn('action', function ($model) {
                $actions = '';

                $actions .= DTHelper::dtEditButton(route('dashboard.venuesdate.edit', $model->id), trans('site.edit'), $this->getPermissions()['update']);

                $actions .= DTHelper::dtShowButton(route('dashboard.venuesdate.show', $model->id), trans('site.edit'), $this->getPermissions()['update']);

                $actions .= DTHelper::dtDeleteButton(route('dashboard.venuesdate.destroy', $model->id), trans('site.delete'), $this->getPermissions()['delete']);

                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TypeHallDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Venues_dates_price $model)
    {
        return $model->newQuery();
    }

    public function count()
    {
        return Venues_dates_price::all()->count();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [Button::make('csv'),
            Button::make('excel'),

            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')];
        if (auth()->user()->hasPermission($this->getPermissions()['create'])) {
            array_unshift($buttons, Button::make('create')->text('<i class="fa fa-plus"></i> '.trans('site.add')));
        }
        return $this->builder()
            ->setTableId($this->crudName.'_datatables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'drawCallback' => 'function(e) { drawTableCallback(e) }',
            ])
            ->buttons(
                $buttons
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
            Column::make('price')->title(trans('site.price')),
            Column::make('venue_id')->title(trans('site.halls')),
            Column::make('created_at')->title(trans('site.created_at')),

            Column::make('date')->title(trans('site.time')),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center')
                ->title(trans('site.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return ucfirst($this->crudName).'Datatables_' . date('YmdHis');
    }
}
