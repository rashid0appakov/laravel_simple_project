<?php
namespace App\Http\LiveWire;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use App\Models\Code;

class Search extends Component
{


    public $searchTerm;
    public $users;
    public $currentPage = 1;
    
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
    
        $this->users = Code::where('name', 'like', $searchTerm)->orWhere('code', 'like', $searchTerm)->get();

        return view('livewire.search');
    }
    
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
        
    }

    
}


