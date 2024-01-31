<?php

namespace App\Repositories\Eloquent;


use App\Models\Invoice;
use App\Models\User;
use App\Repositories\Interfaces\InvoiceRepositoryInterface as InvoiceRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;
class InvoiceRepository implements InvoiceRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.invoices.index', [
            'title' => trans('site.invoices'),
            'model' => 'invoices',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $users = User::all();
        return view('dashboard.invoices.create', compact('users'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $invoice = Invoice::find($Id);
        $users = User::all();

        return view('dashboard.invoices.edit', compact('invoice', 'users'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $invoice = Invoice::find($Id);
        $users = User::all();

        return view('dashboard.invoices.show', compact('invoice', 'users'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $invoice = Invoice::create($request_data);

        if ($invoice) {
           Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.invoices.index');

        }
    }

    public function update($invoice, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();
        $invoice->update($request_data);

        if ($invoice) {
           Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.invoices.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
           Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.invoices.index');

        }
    }


    public function destroy($invoice)
    {
        // TODO: Implement destroy() method.
//        $result=DB::table('categories')->where('id',$category->id)->delete();
        $result = $invoice->delete();
        if ($result) {
               Alert::toast('Success', __('site.deleted_successfully'));
        } else {
               Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
