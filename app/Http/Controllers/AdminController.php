<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Jeu;
use App\User;
use App\Ligne;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(){
        $nb_sales = Ligne::all()->count();
        $nb_users = User::all()->count();
        $nb_jeux = Jeu::all()->count();
        /**
         * Data sur les 7 derniers jours
         
        $last_users = User::where( 'created_at', '>', Carbon::now()->subDays(7))
           ->count();
        */
        
        $chart = new SampleChart;
        $chart->title('Graphique global');
        $chart->labels(['Ventes totales', "Nombre de membres", 'Nombre de jeux']);
        $chart->dataset('Quantités', 'bar', [$nb_sales, $nb_users, $nb_jeux])
            ->color("#DFAEFF")
            ->backgroundcolor("rgb(171, 235, 244)");

        return view('admin.index', compact('chart'));
    }
}