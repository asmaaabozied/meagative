<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\Planerratedatatable;
use App\Models\Planners_rating;
use App\Models\Venues_rating;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Planerratedatatables extends DataTable
{

    private $crudName = 'planers';

    private function getRoutes() {
        return [
            'update' => "dashboard.$this->crudName.edit",
            'show' => "dashboard.$this->crudName.show",
            'delete' => "dashboard.$this->crudName.destroy",
            'block' =>  "dashboard.$this->crudName.block",
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
            ->editColumn('customer_id', function ($custom) {

                return $custom->customer->name;

            })
            ->editColumn('planner_id', function ($customer) {

                return $customer->planner->name;

            })->editColumn('active', function ($status) {

                if ($status->active == 1) {


                    return "active";
                } else {

                    return "block";
                }

            })
            ->editColumn('created_at', function ($model) {
                return (!empty($model->created_at)) ? $model->created_at->diffForHumans() : '';
            })
            ->addColumn('action', function ($model) {
                $actions = '';

                $actions .= DTHelper::dtEditButton(route('dashboard.planners_ratings.edit', $model->id), trans('site.edit'), $this->getPermissions()['update']);
                $actions .= DTHelper::dtShowButton(route('dashboard.planners_ratings.show', $model->id), trans('site.show'), $this->getPermissions()['update']);


                $actions .= DTHelper::dtDeleteButton(route('dashboard.planners_ratings.destroy', $model->id), trans('site.delete'), $this->getPermissions()['delete']);
                $actions .= DTHelper::dtBlockActivateButton(route('dashboard.planners_ratings.block', $model->id), $model->active, $this->getPermissions()['update']);

                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CustomerDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Planners_rating $model)
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
        return Planners_rating::all()->count();
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
            ->ajax($currentUrl)
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
            Column::make('planner_id')->title(trans('site.planers')),
            Column::make('customer_id')->title(trans('site.customers')),
            Column::make('created_at')->title(trans('site.created_at')),
            Column::make('rate')->title(trans('site.number')),
            Column::make('datetime')->title(trans('site.start_at')),

            Column::make('active')->title(trans('site.status')),

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
