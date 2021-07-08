<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\Payment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentDatatables extends DataTable
{
    private $crudName = 'paymentss';

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
            ->editColumn('datetime', function ($model) {
                return (!empty($model->datetime)) ? $model->datetime->diffForHumans() : '';
            })

          ->editColumn('customer_id', function ($cust) {

                return $cust->customer->name;
            })

            ->addColumn('action', function ($model) {
                $actions = '';

                $actions .= DTHelper::dtEditButton(route('dashboard.paymentss.edit', $model->id), trans('site.edit'), $this->getPermissions()['update']);

                $actions .= DTHelper::dtShowButton(route('dashboard.paymentss.show', $model->id), trans('site.show'), $this->getPermissions()['update']);

                $actions .= DTHelper::dtDeleteButton(route('dashboard.paymentss.destroy', $model->id), trans('site.delete'), $this->getPermissions()['update']);

                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HallDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        return $model->newQuery();
    }
    public function count()
    {
        return Payment::all()->count();
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
            Column::make('payment_type')->title(trans('site.type')),
            Column::make('payment_id')->title(trans('site.id')),
            Column::make('customer_id')->title(trans('site.customers')),
            Column::make('amount')->title(trans('site.amount')),
            Column::make('currency')->title(trans('site.currency')),
            Column::make('payment_brand')->title(trans('site.payment_brand')),
            Column::make('card_number')->title(trans('site.number')),
            Column::make('datetime')->title(trans('site.created_at')),

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
