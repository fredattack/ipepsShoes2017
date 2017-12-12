<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use input;
use Illuminate\Support\Facades\DB;
use Excel;

class ExcelController extends Controller
{
    public function downloadExcel($type)
    {
//        dd($type);
        switch ($type) {
            case "shoes":
                $this->arrayOfShoes();
                break;
            case "modele":
               $this->arrayOfModeles();
                break;
            case "promo":
                $this->arrayOfModelesEnPromos();
                break;
            case "order":
                $this->arrayOfOrders();
                break;
            case "shipment":
                $this->arrayOfShipments();
                break;
           case "user":
                $this->arrayOfUsers();
                break;
        }

    }

    public function arrayOfShoes()
    {
        dd('dans les shoes');
        $sheet = Excel::create('ShoesList', function ($excel) {

            $excel->sheet('New sheet', function ($sheet) {

                $sheet->loadView('admin.excel.exportShoes');

            })->download('xlsm');

        });
    }
        public function arrayOfModeles(){
        dd('dans le modele');

            $sheet= Excel::create('ModeleList', function($excel) {

                $excel->sheet('New sheet', function($sheet) {

                    $sheet->loadView('admin.excel.exportModeles');

                })->download('xlsm');

            });
    }

    public function arrayOfModelesEnPromos(){
        dd('dans les promos');

        $sheet= Excel::create('PromoList', function($excel) {

            $excel->sheet('New sheet', function($sheet) {

                $sheet->loadView('admin.excel.exportModelesEnPromo');

            })->download('xlsm');

        });
    }

    public function arrayOfOrders(){
//        dd('dans le order');

        $sheet= Excel::create('OrdersList', function($excel) {

            $excel->sheet('New sheet', function($sheet) {

                $sheet->loadView('admin.excel.exportOrders');

            })->download('xlsm');

        });
    }

    public function arrayOfShipments(){
//        dd('dans le order');

        $sheet= Excel::create('ShipmentsList', function($excel) {

            $excel->sheet('New sheet', function($sheet) {

                $sheet->loadView('admin.excel.exportShipments');

            })->download('xlsm');

        });
    }

    public function arrayOfUsers(){
//        dd('dans le order');

        $sheet= Excel::create('UsersList', function($excel) {

            $excel->sheet('New sheet', function($sheet) {

                $sheet->loadView('admin.excel.exportUsers');

            })->download('xlsm');

        });
    }
}
