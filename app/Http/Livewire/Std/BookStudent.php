<?php

namespace App\Http\Livewire\Std;

use App\Models\Author;
use App\Models\Book as ModelsBook;
use App\Models\BookImages as ModelsBookImages;
use App\Models\BookImages;
use App\Models\Category;
use App\Models\Publisher;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class BookStudent extends Component
{
    use WithFileUploads;
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;
    public $categorys;
    public $publishers;
    public $authors;

    public $uniques;
    public $stt = 1;

    public $category_id;
    public $author_id;
    public $publisher_id;
    public $book_name;

    public $unique_id;
    public $images = [];

    // update variable
    public $book_id;
    public $edit_category_id;
    public $edit_author_id;
    public $edit_publisher_id;
    public $edit_book_name;

    public $edit_unique_id;


    public $search;
    public $totalBook;

    use WithPagination;
    public function render()
    {
        $this->totalBook = ModelsBook::count();
        $this->publishers = Publisher::orderBy('id', 'DESC')->get();
        $this->categorys = Category::orderBy('id', 'DESC')->get();
        $this->authors = Author::orderBy('id', 'DESC')->get();
        // $this->uniques = BookImages::orderBy('unique_id', 'DESC')->get();
        if ($this->search != "") {
            $books = ModelsBook::orderBy('id', 'DESC')->where('book_name', 'LIKE', '%' . $this->search . '%')->paginate(6);
            return view('livewire.std.stdBook', compact('books'))->layout('layout.std.app');
        } else {
            $books = ModelsBook::orderBy('id', 'DESC')->paginate(6);
            return view('livewire.std.stdBook', compact('books'))->layout('layout.std.app');
        }
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function resetField()
    {
        $this->category_id = "";
        $this->author_id = "";
        $this->publisher_id = "";
        $this->book_name = "";

        // update variable
        $this->book_id = "";
        $this->edit_category_id = "";
        $this->edit_author_id = "";
        $this->edit_publisher_id = "";
        $this->edit_book_name = "";
    }
    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function store()
    {
        $validate = $this->validate([
            'category_id' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'book_name' => ['required'],
            // 'images' => ['required'],
        ]);

        $uniqID = Carbon::now()->timestamp . uniqid();

        $book = new Book();
        $book->category_id = $this->category_id;
        $book->publisher_id = $this->publisher_id;
        $book->author_id = $this->author_id;
        $book->book_name = $this->book_name;
        $book->unique_id = $uniqID;



        foreach ($this->images as $key => $image) {
            $bimage = new BookImages();
            $bimage->book_unique_id = $uniqID;
            $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);
            $bimage->image = $imageName;
            $bimage->save();
            
        }
        
        $validate['unique_id'] = $uniqID;
        unset($validate['images']);
        // dd($validate);
        // $book->save();
        // session()->flash('success', 'Book Add Successfully');

        $result = ModelsBook::create($validate);
        if ($result) {
            session()->flash('success', 'Book Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'Author Not Add Successfully');
        }
    }
    public function editBook($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $books = ModelsBook::findOrFail($id);

        $this->book_id = $books->id;
        $this->edit_category_id = $books->category_id;
        $this->edit_author_id = $books->author_id;
        $this->edit_publisher_id = $books->publisher_id;
        $this->edit_book_name = $books->book_name;
        $this->edit_unique_id = $books->unique_id;
        // dd($books->unique_id);
    }

    public function update($id)
    {
        $editUniqID = Carbon::now()->timestamp . md5(random_int(1, 10000));
        // dd($uniqID);
        $books = ModelsBook::findOrFail($id);
        $books->book_name = $this->edit_book_name;
        $books->category_id = $this->edit_category_id;
        $books->publisher_id = $this->edit_publisher_id;
        $books->author_id = $this->edit_author_id;
        $books->unique_id = $editUniqID;
        for ($i = 0 ; $i < count($this->images) ; $i++) {
            unset($this->images[$i]);
        }
        // dd($this->images);
        // $imageDelete = BookImages::where('book_unique_id', $this->edit_unique_id)->first();

        // if ($imageDelete != null) {
        //     $imageDelete->delete();
        // }
        // $imageDelete = BookImages::where('book_unique_id', $this->edit_unique_id)->first();
        // $imageDelete->delete();
        // dd($imageDelete);
        if ($this->images != '') {
            foreach ($this->images as $key => $image) {
                
                // dd($imageDelete);
                $bimage = new BookImages();                
                $bimage->book_unique_id = $books->unique_id;

                $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension() . md5(random_int(1, 10000));
                $this->images[$key]->storeAs('all', $imageName);

                $bimage->image = $imageName;
                $bimage->save();
            }
        }
        // dd($books->unique_id);
        $result = $books->save();
        if ($result) {
            session()->flash('success', 'Book Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'Book Not Update Successfully');
        }
        
        // $imageDelete = BookImages::where('book_unique_id', $this->edit_unique_id)->first();
        // $imageDelete->delete();
        // dd($imageDelete);
        
    }

    public function deleteBook($id)
    {
        $unique_id = ModelsBook::where('id', '=', $id)->first();
        // dd($unique_id->unique_id);
        $delete = ModelsBookImages::where('book_unique_id', '=', $unique_id->unique_id)->first();
        // dd($delete->id);
        ModelsBookImages::findOrFail($delete->id)->delete();
        $result = ModelsBook::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'Book Delete Successfully');
        } else {
            session()->flash('error', 'Author Not Delete Successfully');
        }
    }
}
