<?php 
class Cms5e18cbf023872570981053_c44d8d03626dbab0c96c679848ff41c8Class extends Cms\Classes\PartialCode
{
public function onStart(){
        $data = post();
        $this['user']   =   Auth::getUser();
        if(isset($data['start']) && isset($data['end'])){


            $start   =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($this['settings']['dateformat'], $data['start']));
            $end     =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($this['settings']['dateformat'], $data['end']));


            $start          = $start->copy()->startOfDay();
            $end            = $end->copy()->endOfDay();


            $this['shipments']             =   \Spot\Shipment\Models\Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            $this['PreAlerttoApprove']      =   \Spot\Shipment\Models\Order::where('requested', 0)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            $this['delayed']                =   \Spot\Shipment\Models\Order::whereIn('requested', [0,1,3])
                                                    ->where('delivery_date', '>',\Carbon\Carbon::now())
                                                    ->where('created_at', '>=', $start)->where('created_at', '<=', $end)->where(function($q){
                                                        if(Auth::getUser()->role_id == 6){
                                                            $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                                                        }
                                                    })->count();
            $this['PickupList']             =   \Spot\Shipment\Models\Order::where('requested', 0)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            $this['Delivered']              =   \Spot\Shipment\Models\Order::whereIn('requested', [4,9])->where('created_at', '>=', $start)->where('created_at', '<=', $end)->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            if(Auth::getUser()->role_id == 1){
                $this['NewCustomers']           =   \RainLab\User\Models\User::where('created_at', '>=', $start)->where('created_at', '<=', $end)->count();
            }
        }else{
            $this['shipments']             =   \Spot\Shipment\Models\Order::where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            $this['PreAlerttoApprove']      =   \Spot\Shipment\Models\Order::where('requested', 0)->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            $this['delayed']                =   \Spot\Shipment\Models\Order::whereIn('requested', [0,1,3])
                                                    ->where('delivery_date', '<',\Carbon\Carbon::now())
                                                    ->where(function($q){
                                                        if(Auth::getUser()->role_id == 6){
                                                            $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                                                        }
                                                    })->count();
            $this['PickupList']             =   \Spot\Shipment\Models\Order::where('requested', 0)->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            $this['Delivered']              =   \Spot\Shipment\Models\Order::whereIn('requested', [4,9])->where(function($q){
                if(Auth::getUser()->role_id == 6){
                    $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                }
            })->count();
            if(Auth::getUser()->role_id == 1){
                $this['NewCustomers']           =   \RainLab\User\Models\User::count();
            }

        }

    }
}
