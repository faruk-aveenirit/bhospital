<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function mainIndex()
    {
        return view('frontend.main_index');
    }

    public function storeRegistration(StoreAppointmentRequest $request)
    {

        DB::beginTransaction();
        try {
           $appointment = Appointment::create($request->all());
           if (!empty($appointment)){
               flash()
                   ->success('Successfully registration completed!')
                   ->flash();
           }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            flash()
                ->error('Something want wrong!')
                ->flash();
        }
        return redirect()->back();
    }
}
