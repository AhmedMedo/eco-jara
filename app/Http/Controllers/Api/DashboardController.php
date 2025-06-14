<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'kpis' => [
                'total_certificates' => [
                    'value' => 3500,
                    'unit' => 'MW',
                    'change' => '+12.5%',
                    'change_type' => 'positive'
                ],
                'revenue_generated' => [
                    'value' => 175000,
                    'unit' => 'EGP',
                    'change' => '-3.2%',
                    'change_type' => 'negative'
                ],
                'market_share' => [
                    'value' => 28.4,
                    'unit' => '%'
                ],
                'approval_rate' => [
                    'value' => 83.3,
                    'unit' => '%'
                ]
            ],
            'energy_distribution' => [
                'wind' => ['value' => 5000, 'percentage' => 11],
                'solar' => ['value' => 25000, 'percentage' => 24],
                'hydro' => ['value' => 30000, 'percentage' => 26],
                'bio' => ['value' => 25000, 'percentage' => 39]
            ],
            'monthly_activity' => [
                'Jan' => 3, 'Feb' => 4, 'Mar' => 3.5, 'Apr' => 5,
                'May' => 4.5, 'Jun' => 4, 'Jul' => 4.5, 'Aug' => 5.5,
                'Sep' => 4, 'Oct' => 3.5, 'Nov' => 4, 'Dec' => 5
            ]
        ];

        return response()->json($data);
    }
}