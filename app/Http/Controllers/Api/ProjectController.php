<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Mock data for demonstration
        $projects = [
            [
                'id' => 'IREC-20230001',
                'name' => 'Benban Solar Park',
                'country' => 'Egypt',
                'type' => 'Solar',
                'commission_date' => '2020-01-01',
                'registration_date' => '2020-05-01',
                'expiry_date' => '2030-01-01',
                'capacity' => '50 MW',
                'status' => 'Active',
                'total_volume' => 5000,
                'total_available' => 3000,
                'vintage' => 2024,
                'price' => 'EGP 45.2 /MWh',
                'image' => 'https://images.pexels.com/photos/9800029/pexels-photo-9800029.jpeg'
            ],
            [
                'id' => 'IREC-20230002',
                'name' => 'Zafarana Wind',
                'country' => 'Egypt',
                'type' => 'Wind',
                'commission_date' => '2020-01-01',
                'registration_date' => '2020-05-01',
                'expiry_date' => '2030-01-01',
                'capacity' => '50 MW',
                'status' => 'Inactive',
                'total_volume' => 5000,
                'total_available' => 3000,
                'vintage' => 2025,
                'price' => 'EGP 45.2 /MWh',
                'image' => 'https://images.pexels.com/photos/433308/pexels-photo-433308.jpeg'
            ],
            [
                'id' => 'IREC-20230003',
                'name' => 'Aswan Hydro',
                'country' => 'Egypt',
                'type' => 'Hydro',
                'commission_date' => '2020-01-01',
                'registration_date' => '2020-05-01',
                'expiry_date' => '2030-01-01',
                'capacity' => '50 MW',
                'status' => 'Cancelled',
                'total_volume' => 5000,
                'total_available' => 3000,
                'vintage' => 2024,
                'price' => 'EGP 45.2 /MWh',
                'image' => 'https://images.pexels.com/photos/1591447/pexels-photo-1591447.jpeg'
            ]
        ];

        return response()->json([
            'data' => $projects,
            'total' => count($projects)
        ]);
    }

    public function show($id)
    {
        // Mock single project data
        $project = [
            'id' => $id,
            'name' => 'Benban Solar Park',
            'country' => 'Egypt',
            'type' => 'Solar',
            'commission_date' => '2020-01-01',
            'registration_date' => '2020-05-01',
            'expiry_date' => '2030-01-01',
            'capacity' => '50 MW',
            'status' => 'Active',
            'total_volume' => 5000,
            'total_available' => 3000,
            'vintage' => 2024,
            'price' => 'EGP 45.2 /MWh',
            'image' => 'https://images.pexels.com/photos/9800029/pexels-photo-9800029.jpeg'
        ];

        return response()->json($project);
    }
}