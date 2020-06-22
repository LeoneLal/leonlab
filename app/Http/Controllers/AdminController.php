<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Jeu;
use App\Console;
use App\User;
use App\Fiche;
use App\Ligne;
use App\Comment;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(){
        $nb_sales = Ligne::all()->count();
        $nb_users = User::all()->count();
        $nb_jeux = Jeu::all()->count();
        
        $ca = Fiche::sum('prix_total');
        $month_ca = Fiche::where( 'created_at', '>', Carbon::now()->subDays(30))->sum('prix_total');
        $weeks_ca = Fiche::where( 'created_at', '>', Carbon::now()->subDays(30))->sum('prix_total');
        
        $chart = new SampleChart;
        $chart->title('Graphique global');
        $chart->labels(['Ventes totales', "Nombre de membres", 'Nombre de jeux']);
        $chart->dataset('Quantités', 'bar', [$nb_sales, $nb_users, $nb_jeux])
            ->color("#DFAEFF")
            ->backgroundcolor("rgb(171, 235, 244)");
        if( \Auth::user()->role == 1)
            return view('admin.index', compact('chart', 'ca', 'month_ca', 'weeks_ca'));
        else
            return redirect()->route('jeux.index');
        
    }

    public function games(){
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
            return view('admin.games', compact('games_chart', 'games'));
        else
            return redirect()->route('jeux.index');
    }

    public function consoles(){
        $consoles = Console::all();
        return view('admin.consoles', compact('consoles'));

    }

    public function members(){
        $members = User::all();

        $month_new_members = User::where( 'created_at', '>', Carbon::now()->subDays(30))->count();
        $member_count = User::all()->count();
        $weeks_new_members = User::where( 'created_at', '>', Carbon::now()->subDays(7))->count();

        $members_chart = new SampleChart;
        $members_chart->title('Membres');
        $members_chart->labels(['Nouveaux membres (7 jours)','Nouveaux membres (30 jours)', 'Total membres']);
        $members_chart->dataset('Quantités', 'bar', [$weeks_new_members, $month_new_members, $member_count])
            ->color("#DFAEFF")
            ->backgroundcolor("rgb(171, 235, 244)");

        if( \Auth::user()->role == 1)
            return view('admin.members', compact('members_chart', 'members'));
        else
            return redirect()->route('jeux.index', compact('games'));
    }

}