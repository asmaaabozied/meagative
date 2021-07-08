<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\Booking;
use App\Models\BookingDatatable;
use App\Models\Inquiry;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookingDatatables extends DataTable
{
    private $crudName = 'booking';

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
            ->editColumn('created_at', function ($model) {
                return (!empty($model->created_at)) ? $model->created_at->diffForHumans() : '';
            })->editColumn('status', function ($status) {

                if ($status->status == 0) {


                    return "News";
                } elseif ($status->status == 2) {

                    return "Reject";
                } elseif ($status->status == 1) {
                    return "Accept";

                }

            })
            ->editColumn('event_id', function ($customer) {

                return $customer->event->name;
            })->editColumn('customer_id', function ($cust) {

                return $cust->customer->name;
            })->editColumn('venue_id', function ($c) {

                return $c->venue->name;
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
    public function query(Booking $model)
    {
        if ($this->request()->has('status')) {
            if ($this->request()->get('status') == 4) {
                return $model->newQuery();
            }
            return $model->newQuery()->where('status', $this->request()->get('status'));
        }
        return $model->newQuery();
    }

    public function count()
    {
        return Booking::all()->count();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $currentUrl = url()->full();
        if ($this->request()->has('status')) {
            $currentUrl = $currentUrl . "?status=" . $this->request()->get('status');
        }
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
        return [
            Column::make('id'),
            Column::make('start_date')->title(trans('site.start_at')),
            Column::make('end_date')->title(trans('site.end_at')),
            Column::make('customer_id')->title(trans('site.customers')),
            Column::make('venue_id')->title(trans('site.planers')),
            Column::make('event_id')->title(trans('site.events')),
            Column::make('guests_male')->title(trans('site.male')),
            Column::make('guests_female')->title(trans('site.female')),
            Column::make('created_at')->title(trans('site.created_at')),
            Column::make('status')->title(trans('site.status')),

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
        return ucfirst($this->crudName) . 'Datatables_' . date('YmdHis');

    }
}
