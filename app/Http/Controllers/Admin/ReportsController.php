<?php

namespace App\Http\Controllers\Admin;

use App\Floor;
use App\Installment;
use App\MonthlyRent;
use App\Project;
use App\RentalUnit;
use App\Sale;
use App\Unit;
use Carbon\Carbon;
use Carbon\Traits\Units;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use App\Faculties;
use App\DepartmentUser;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use vendor\project\StatusTest;

class ReportsController extends Controller
{

    public function ShowPendingRents()
    {
        $pending_rent_data=MonthlyRent:: join ('units','units.id','=','monthly_rents.unit_id')->select('monthly_rents.unit_id','units.unit_name',DB::raw("count('monthly_rents.unit_id') as pending_months"),DB::raw("SUM(monthly_rents.monthly_rent) as pending_rent"))->where('monthly_rents.status',2)->groupby('monthly_rents.unit_id','units.unit_name')->get();
//        dd($pending_rent_data);
        return view('admin/reports.pending-rents',compact('pending_rent_data'));
    }
    public function ShowPaidRents( Request $request)
    {


        if($request->month!=null)
        {
            $arr=explode("-",$request->month);

            $selected_month=$request->month;
            $paid_rent_data=MonthlyRent:: join ('units','units.id','=','monthly_rents.unit_id')->select('monthly_rents.unit_id','monthly_rents.monthly_rent','units.unit_name',DB::raw("count('monthly_rents.unit_id') as paid_months"),DB::raw("SUM(monthly_rents.monthly_rent) as paid_rent"))->where('monthly_rents.status',1)
                ->whereMonth('payment_date',$arr[1])->whereYear('payment_date',$arr[0])
                ->groupby('monthly_rents.unit_id','units.unit_name','monthly_rents.monthly_rent')
                ->get();
            return view('admin/reports.paid-rents',compact('paid_rent_data','selected_month'));

        }
        else
        {


            $selected_month=$request->month;
            $paid_rent_data=MonthlyRent:: join ('units','units.id','=','monthly_rents.unit_id')->select('monthly_rents.unit_id','monthly_rents.monthly_rent','units.unit_name',DB::raw("count('monthly_rents.unit_id') as paid_months"),DB::raw("SUM(monthly_rents.monthly_rent) as paid_rent"))->where('monthly_rents.status',1)
//                ->whereMonth('payment_date',$arr[1])->whereYear('payment_date',$arr[0])
                ->groupby('monthly_rents.unit_id','units.unit_name','monthly_rents.monthly_rent')
                ->get();
            return view('admin/reports.paid-rents',compact('paid_rent_data','selected_month'));

        }


    }
    public function ShowEmptyUnits()
    {
        $empty_units_data=Unit::whereraw('id not in (SELECT unit_id FROM rental_units where rental_units.status=6)')->get();
//        dd($empty_units);
        return view('admin/reports.empty-units', compact('empty_units_data'));
    }

    public function ShowRentalUnitList()
    {
        $units_data=RentalUnit::all();
        return view('admin/reports.rental-units-list', compact('units_data'));

    }
    public function ShowProjectRentSummary(Request $request)
    {
        $units=Unit::where('project_id',$request->project_id)->get();
        $summary=Floor::leftjoin('rental_units','rental_units.project_id','=','floors.project_id')->where('floors.project_id',3)->select ('floors.id','floor_name','floors.project_id',DB::raw("SUM(rental_units.monthly_rent) as rent"))->groupby('floors.id','floor_name','floors.project_id')->get();
        dd($summary);
    }
    public function ShowGeneralSummary ()
    {
        $summary=Project::join('floors','floors.project_id','=','projects.id')->join('units','units.project_id','=','projects.id')
            ->where('projects.id',3)
            ->select('project_name',DB::raw('COUNT(units.id) as units'),DB::raw('COUNT(floors.id) as floors'))
            ->groupby('project_name')
            ->get();

        dd($summary);
        return view('admin/reports.general-summary', compact('summary'));
    }
    public function Receipt($id)
    {
        $installment = Installment::where('id', $id)->first();
//        $pending_rent_data=MonthlyRent:: join ('units','units.id','=','monthly_rents.unit_id')->select('monthly_rents.unit_id','units.unit_name',DB::raw("count('monthly_rents.unit_id') as pending_months"),DB::raw("SUM(monthly_rents.monthly_rent) as pending_rent"))->where('monthly_rents.status',2)->groupby('monthly_rents.unit_id','units.unit_name')->get();
//        dd($pending_rent_data);
        return view('admin/reports.receipt',compact('installment'));
    }
    public function CashSales()
    {
        $installment = Installment::get();
        $sales=Sale::get();
//        $pending_rent_data=MonthlyRent:: join ('units','units.id','=','monthly_rents.unit_id')->select('monthly_rents.unit_id','units.unit_name',DB::raw("count('monthly_rents.unit_id') as pending_months"),DB::raw("SUM(monthly_rents.monthly_rent) as pending_rent"))->where('monthly_rents.status',2)->groupby('monthly_rents.unit_id','units.unit_name')->get();
//        dd($pending_rent_data);,
        return view('admin/reports.cash-sales',compact('installment','sales'));
    }
    public function CreditSales()
    {
        $installment = Installment::get();
        $sales=Sale::get();
//        $pending_rent_data=MonthlyRent:: join ('units','units.id','=','monthly_rents.unit_id')->select('monthly_rents.unit_id','units.unit_name',DB::raw("count('monthly_rents.unit_id') as pending_months"),DB::raw("SUM(monthly_rents.monthly_rent) as pending_rent"))->where('monthly_rents.status',2)->groupby('monthly_rents.unit_id','units.unit_name')->get();
//        dd($pending_rent_data);,
        return view('admin/reports.credit-sales',compact('installment','sales'));
    }
}

