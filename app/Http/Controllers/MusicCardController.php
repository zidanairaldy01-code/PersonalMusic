<?php

namespace App\Http\Controllers;

use App\Models\MusicCard;
use Illuminate\Http\Request;

class MusicCardController extends Controller
{
    /**
     * Display the music cards page
     */
    public function index()
    {
        $musicCards = MusicCard::orderBy('order')->get();
        return view('music-cards.index', compact('musicCards'));
    }

    /**
     * Get all music cards as JSON
     */
    public function getCards()
    {
        $musicCards = MusicCard::orderBy('order')->get();
        return response()->json($musicCards);
    }
}
