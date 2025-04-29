<?php

namespace App\Livewire;

use App\Models\Dvdformat;
use App\Models\Location;
use App\Models\Genre;
use App\Models\Type;

use Livewire\Component;

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
                $subcategories;
                $this->showSubc = true;
                break;
            default:
                $this->showSubc = false;
                break;
        }

        return view('livewire.search', compact('subcategories'));
    }

    public function mount() {
        $this->ratings = [1, 2, 3, 4, 5];
    }

    public function filter() {
        $this->js('alert("testing {{$this->subcategory}}")');
    }
}
