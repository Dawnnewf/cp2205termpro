<?php

namespace App\Livewire;

use App\Models\Dvdformat;
use App\Models\Location;
use App\Models\Genre;
use App\Models\Type;

use Livewire\Component;
use Illuminate\Support\Str;

class Search extends Component
{
    public $showSubc;
    public $dvdFormats;
    public $types;
    public $genres;
    public $locations;
    public $ratings;
    public $category = "";
    public $subcategory = "";
    public $filterValue;
    public $sortValue;

    public function render()
    {
        $subcategories = [];
        switch ($this->category) {
            case 'dvdformat':
                $subcategories = Dvdformat::all()->pluck( 'dvdFormat', 'id' );
                $this->showSubc = true;
                break;
            case 'type':
                $subcategories = Type::all()->pluck( 'type', 'id' );
                $this->showSubc = true;
                break;
            case 'location':
                $subcategories = Location::all()->pluck( 'location', 'id' );
                $this->showSubc = true;
                break;
            case 'genre':
                $subcategories = Genre::all()->pluck( 'genre', 'id' );
                $this->showSubc = true;
                break;
            case 'rating':
                $subcategories = $this->ratings;
                $this->showSubc = true;
                break;
            default:
                $this->showSubc = false;
                break;
        }

        return view('livewire.search', compact('subcategories'));
    }

    public function mount() {
        $this->ratings = [ '0.5'=>'0.5', '1.0'=>'1.0', '1.5'=>'1.5', '2.0'=>'2.0', '2.5'=>'2.5', '3.0'=>'3.0', '3.5'=>'3.5', '4.0'=>'4', '4.5'=>'4.5', '5.0'=>'5.0' ];
    }

    public function filter($url) {
        $base = Str::before($url, '?');

        $this->js('filterByCategory("'. $base . '", "'. $this->category . '", "'. $this->filterValue . '" )');
    }

    public function orderBy($url) {
        $base = Str::before($url, '?');

        $this->js('filterBySort("'. $base . '", "'. $this->category . '", "'. $this->sortValue . '" )');
    }
}