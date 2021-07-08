<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\customer;
use App\Models\Service;
use App\Models\ServiceDatatable;
use App\Models\Slider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDatatables extends DataTable
{

    private $crudName = 'sliders';

    private function getRoutes()
    {
        return [
            'update' => "dashboard.$this->crudName.edit",
            'delete' => "dashboard.$this->crudName.destroy",
            'block' => "dashboard.$this->crudName.block",
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
            ->editColumn('title_ar', function ($model) {
                return $model->title;
            })->editColumn('title_en', function ($model) {
                return $model->title;
            })->editColumn('created_at', function ($model) {
                return (!empty($model->created_at)) ? $model->created_at->diffForHumans() : '';
            })


            ->addColumn('image', function ($user) {
                $url=asset("uploads/$user->image");
                return "<img alt='' src='{$url}' width='100' class='img-rounded'/>";
            })

            ->addColumn('action', function ($model) {
                $actions = '';

                $actions .= DTHelper::dtEditButton(route($this->getRoutes()['update'], $model->id), trans('site.edit'), $this->getPermissions()['update']);
                $actions .= DTHelper::dtDeleteButton(route($this->getRoutes()['delete'], $model->id), trans('site.delete'), $this->getPermissions()['delete']);

                return $actions;
            })->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CustomerDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slider $model)
    {
        return $model->newQuery();
    }

    public function count()
    {
        return Slider::all()->count();
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
            array_unshift($buttons, Button::make('create')->text('<i class="fa fa-plus"></i> ' . trans('site.add')));
        }
        return $this->builder()
            ->setTableId($this->crudName . '_datatables-table')
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
        if (app()->getLocale() == 'en') {
            return [
                Column::make('id'),
                Column::make('title_en')->title(trans('site.title_en')),
                Column::make('created_at')->title(trans('site.created_at')),
            Column::make('image')->title(trans('site.image')),

                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(120)
                    ->addClass('text-center')
                    ->title(trans('site.action')),
            ];
        } else {

            return [
                Column::make('id'),
                Column::make('title_ar')->title(trans('site.title_ar')),
                Column::make('created_at')->title(trans('site.created_at')),
            Column::make('image')->title(trans('site.image')),

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
        return ucfirst($this->crudName) . 'Datatables_' . date('YmdHis');
    }
}
