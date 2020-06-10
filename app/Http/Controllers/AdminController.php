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
        if( \Auth::user()->role == 1)
            return view('admin.index', compact('chart'));
        else
            return redirect()->route('jeux.index');
        
    }

    public function game(){
        $games = Jeu::all();

        $month_sales = Ligne::where( 'created_at', '>', Carbon::now()->subDays(30))->count();
        $sales = Ligne::all()->count();
        $weeks_sales = Ligne::where( 'created_at', '>', Carbon::now()->subDays(7))->count();
        
        
        $games_chart = new SampleChart;
        $games_chart->title('Ventes');
        $games_chart->labels(['Ventes des 7 derniers jours', 'Ventes des 30 derniers jours', 'Ventes totales']);
        $games_chart->dataset('Quantités', 'bar', [$weeks_sales, $month_sales, $sales])
            ->color("#DFAEFF")
            ->backgroundcolor("rgb(171, 235, 244)");

        if( \Auth::user()->role == 1)
            return view('admin.game', compact('games_chart', 'games'));
        else
            return redirect()->route('jeux.index');
    }

}