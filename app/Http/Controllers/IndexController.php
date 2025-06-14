<?php

namespace App\Http\Controllers;

use App\Models\CategoryMenu;
use App\Models\Menu;
use App\Models\Program;
use App\Models\Question;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function beranda()
    {
        $programs = Program::orderByDesc('is_popular')->get();
        $menus = Menu::all();
        $questions = Question::all();
        $categoryMenus = CategoryMenu::all();

        return view('beranda', compact('programs', 'menus', 'questions', 'categoryMenus'));
    }
    
    public function menu()
    {
        $categories = CategoryMenu::with('menus')->get(); 
        return view('menu', compact('categories'));
    }
    
    public function program()
    {
        $programs = Program::orderByDesc('is_popular')->get();

        return view('program', compact('programs'));
    }
}
