<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\IssueBook;
use App\Models\Publisher;
use App\Models\Student;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalAuthor;
    public $totalPublisher;
    public $totalCategory;
    public $totalBooks;
    public $totalStudent;
    public $totalIssueBook;
    public $dateReport;
    public $A = [];
    public $B = [];
    public function render()
    {
        
        $this->totalAuthor = Author::count();
        $this->totalPublisher = Publisher::count();
        $this->totalCategory = Category::count();
        $this->totalBooks = Book::count();
        $this->totalStudent = Student::count();
        $this->totalIssueBook = IssueBook::where('issue_status', 'N')->count();

        $date = date('Y-m-j');
        $newdate = strtotime ( $date );

        for ($a = 6; $a >= 0; $a--) {
            $d = 6 - $a;            
            $b = '-' . $a . ' day';
            $c = strtotime($b, $newdate);
            $A[$d] = date('Y-m-j', $c);
        }    
        for ($a = 0; $a < 7; $a++) {
            $this->dateReport = $A[$a];
            $issueBook = IssueBook::whereDate('created_at', $this->dateReport)->orderBy('id', 'DESC')->get();
            $B[$a] = $issueBook->count();
        }
        $labels = $A;
        $data = $B;
        return view('livewire.dashboard',  compact('labels', 'data'))->layout('layout.app');
    }
}
