<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\Customers_bank;
use App\Models\RequirementDatatable;
use App\Models\Venues_include;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerbankDatatables extends DataTable
{
    private $crudName = 'customers';

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
            ->editColumn('city_id', function ($customer) {

                return $customer->city->name;
            })
            ->editColumn('customer_id', function ($customer) {

                return $customer->customer->name;
            })
            ->addColumn('action', function ($model) {
                $actions = '';

                $actions .= DTHelper::dtEditButton(route('dashboard.customers_banks.edit', $model->id), trans('site.edit'), $this->getPermissions()['update']);
                $actions .= DTHelper::dtShowButton(route('dashboard.customers_banks.show', $model->id), trans('site.edit'), $this->getPermissions()['update']);


                $actions .= DTHelper::dtDeleteButton(route('dashboard.customers_banks.destroy', $model->id), trans('site.delete'), $this->getPermissions()['delete']);


                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RequirementDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customers_bank $model)
    {
        return $model->newQuery();
    }


    public function count()
    {
        return Customers_bank::all()->count();
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
        return [
            Column::make('id'),
            Column::make('account_name')->title(trans('site.account_name')),
            Column::make('bank_name')->title(trans('site.bank_name')),
            Column::make('account_number')->title(trans('site.account_number')),
            Column::make('iban')->title(trans('site.iban')),
            Column::make('city_id')->title(trans('site.city')),
            Column::make('customer_id')->title(trans('site.customers')),
            Column::computed('action')->title(trans('site.action'))
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
