<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\Notification;
use App\Models\TypeHallDatatable;
use App\Models\Typevenue;
use App\Models\Venue_decoration;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NotificationDatatables extends DataTable
{


    private $crudName = 'halls';

    private function getRoutes()
    {
        return [
            'update' => "dashboard.$this->crudName.edit",
            'show' => "dashboard.$this->crudName.show",
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
            })
            ->editColumn('title_en', function ($model) {
                return $model->title;
            })
            ->editColumn('customer_ids', function ($customer) {

                return $customer->customer->name;
            })
            ->editColumn('content_en', function ($model) {
                return $model->content;
            })
            ->editColumn('content_ar', function ($model) {
                return $model->content;
            });

//            ->addColumn('action', function ($model) {
//                $actions = '';
//
//                $actions .= DTHelper::dtEditButton(route('dashboard.venues_decoration.edit', $model->id), trans('site.edit'), $this->getPermissions()['update']);
//
//                $actions .= DTHelper::dtShowButton(route('dashboard.venues_decoration.show', $model->id), trans('site.show'), $this->getPermissions()['update']);
//
//                $actions .= DTHelper::dtDeleteButton(route('dashboard.venues_decoration.destroy', $model->id), trans('site.delete'), $this->getPermissions()['delete']);
//                $actions .= DTHelper::dtBlockActivateButton(route('dashboard.venues_decoration.block', $model->id), $model->active, $this->getPermissions()['update']);
//
//                return $actions;
//            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TypeHallDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Notification $model)
    {
        return $model->newQuery();
    }

    public function count()
    {
        return Notification::all()->count();
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
        if (app()->getLocale() == 'ar') {
            return [
                Column::make('id'),
                Column::make('title_ar')->title(trans('site.title1')),

                Column::make('content_ar')->title(trans('site.descrption')),

                Column::make('type')->title(trans('site.type')),
                Column::make('customer_ids')->title(trans('site.customers')),

            ];
        } else {

            return [
                Column::make('id'),
                Column::make('title_en')->title(trans('site.title1')),

                Column::make('content_en')->title(trans('site.descrption')),

                Column::make('type')->title(trans('site.type')),
                Column::make('customer_ids')->title(trans('site.customers')),

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
