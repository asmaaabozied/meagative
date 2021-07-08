<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\HallDatatable;
use App\Models\Venue;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HallDatatables extends DataTable
{

    private $crudName = 'halls';

    private function getRoutes() {
        return [
            'update' => "dashboard.$this->crudName.edit",
            'delete' => "dashboard.$this->crudName.destroy",
            'block' =>  "dashboard.$this->crudName.block",
            'show' => "dashboard.$this->crudName.show",
        ];
    }

    private function getPermissions() {
        return [
            'update' => 'update_'.$this->crudName,
            'delete' => 'delete_'.$this->crudName,
            'create' => 'create_'.$this->crudName
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
            })
            ->editColumn('name_en', function ($model) {
                return $model->name;
            })
            ->editColumn('name_ar', function ($model) {
                return $model->name;
            })
            ->editColumn('active', function ($status) {

                if ($status->active == 1) {


                    return "active";
                } elseif($status->active == 0) {

                    return "block";
                }

            }) ->editColumn('country_id', function ($customer) {

                return $customer->country->name;
            })->editColumn('customer_id', function ($cust) {

                return $cust->customer->name;
            })->editColumn('venue_type_id', function ($c) {

                return $c->type->name;
            })

            ->addColumn('action', function ($model) {
                $actions = '';
                $actions .= DTHelper::dtEditButton(route($this->getRoutes()['update'], $model->id), trans('site.edit'), $this->getPermissions()['update']);
                $actions .= DTHelper::dtShowButton(route($this->getRoutes()['show'], $model->id), trans('site.show'), $this->getPermissions()['update']);

                $actions .= DTHelper::dtDeleteButton(route($this->getRoutes()['delete'], $model->id), trans('site.delete'), $this->getPermissions()['delete']);
                $actions .= DTHelper::dtBlockActivateButton(route($this->getRoutes()['block'], $model->id), $model->active, $this->getPermissions()['update']);

                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HallDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Venue $model)
    {
        if ($this->request()->has('active')) {
            if ($this->request()->get('active') == 4) {
                return $model->newQuery();
            }
            return $model->newQuery()->where('active', $this->request()->get('active'));
        }
        return $model->newQuery();
    }

    public function count()
    {
        return Venue::all()->count();
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $currentUrl = url()->full();
        if ($this->request()->has('active')) {
            $currentUrl = $currentUrl . "?active=" . $this->request()->get('active');
        }


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
            ->ajax($currentUrl)
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
        if (app()->getLocale() == 'en') {
        return [
            Column::make('id'),
            Column::make('name_en')->title(trans('site.name')),

            Column::make('capacity')->title(trans('site.capacity')),
            Column::make('price')->title(trans('site.price')),
            Column::make('venue_type_id')->title(trans('site.typevenues')),
            Column::make('customer_id')->title(trans('site.customers')),
            Column::make('time_open')->title(trans('site.start_at')),
            Column::make('created_at')->title(trans('site.created_at')),
            Column::make('country_id')->title(trans('site.country')),
            Column::make('active')->title(trans('site.status')),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center')
                ->title(trans('site.action')),
        ];
        }else{
            return [
                Column::make('id'),
                Column::make('name_ar')->title(trans('site.name')),

                Column::make('capacity')->title(trans('site.capacity')),
                Column::make('price')->title(trans('site.price')),
                Column::make('venue_type_id')->title(trans('site.typevenues')),
                Column::make('customer_id')->title(trans('site.customers')),
                Column::make('time_open')->title(trans('site.start_at')),
                Column::make('created_at')->title(trans('site.created_at')),
                Column::make('country_id')->title(trans('site.country')),
                Column::make('active')->title(trans('site.status')),

                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(120)
                    ->addClass('text-center')
                    ->title(trans('site.action')),
            ];

        }
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
