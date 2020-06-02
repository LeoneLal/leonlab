<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Jeu;
use App\User;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(){
        $nb_jeux = Jeu::all()->count();
        $last_users = User::where( 'created_at', '>', Carbon::now()->subDays(2))
           ->count();
        $users = User::all()->count();
        $color = '#DD9F80';
        $chart = new SampleChart;
        $chart->title('Graphique global');
        $chart->labels(['Nouveaux membres sur les 7 derniers jours', "Global"]);
        $chart->dataset('Nb membres', 'bar', [$last_users, $users]);
       
        return view('admin.index', compact('chart'));
    }
}
