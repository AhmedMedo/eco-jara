<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyerDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'kpis' => [
                'total_irecs' => [
                    'value' => 3500,
                    'unit' => 'MWh',
                    'change' => '+12.5%',
                    'change_type' => 'positive'
                ],
                'energy_consumption' => [
                    'value' => 4200,
                    'unit' => 'MWh',
                    'percentage' => 83.3
                ],
                'renewable_energy' => [
                    'value' => 83,
                    'unit' => '%'
                ]
            ],
            'vintage_activity' => [
                'Jan' => 20, 'Feb' => 35, 'Mar' => 25, 'Apr' => 45,
                'May' => 55, 'Jun' => 40, 'Jul' => 35, 'Aug' => 50,
                'Sep' => 45, 'Oct' => 40, 'Nov' => 55, 'Dec' => 60
            ],
            'monthly_activity' => [
                'wind' => ['value' => 5000, 'percentage' => 11],
                'solar' => ['value' => 25000, 'percentage' => 24],
                'hydro' => ['value' => 30000, 'percentage' => 26],
                'bio' => ['value' => 25000, 'percentage' => 39]
            ],
            'bid_data' => [
                'approved' => [60, 55, 65, 70, 75, 80, 85, 80, 75, 70, 75, 80],
                'pending' => [40, 45, 35, 50, 45, 40, 35, 45, 50, 55, 50, 45],
                'cancelled' => [20, 25, 30, 25, 20, 15, 20, 25, 20, 15, 20, 25]
            ]
        ];

        return response()->json($data);
    }
}