<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author; 
use App\Book; 
use App\BorrowHistory;
use App\Company;
use App\Employe;

class DataController extends Controller
{
    
    public function company()
    {
         $company = Company::orderBy('nama','ASC')->get();
       
        return datatables()->of($company)
        ->editColumn('cover', function (Company $model) {
            return '<img src="' . $model->getCover() . '"height="150px">'; 
        })
        ->addColumn('action', 'admin.company.action')
        ->addIndexColumn()
        ->rawColumns(['cover','action'])
        ->toJson();
    }


    public function employe()
    {
        $employe = Employe::orderBy('nama','ASC');
        
        return datatables()->of($employe)
        ->addColumn('company', function(Employe $model) {
            return $model->company->nama;
        })
        ->addColumn('action','admin.employe.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }


    public function authors()
    {
        $author = Author::orderBy('name', 'ASC');
        
        return datatables()->of($author)
            ->addColumn('action', 'admin.author.action') 
            ->addIndexColumn() 
            ->rawColumns(['action']) 
            ->toJson(); 
    }

    public function books()
    {
          $books = Book::with('author')->orderBy('title', 'ASC')->get();

          $books->load('author');

            return datatables()->of($books)
                ->addColumn('author', function (Book $model) {
                    return $model->author->name; 
                })
                ->editColumn('cover', function (Book $model) {
                    return '<img src="' . $model->getCover() . '"height="150px">'; 
                })
                ->addColumn('action', 'admin.book.action') 
                ->addIndexColumn() 
                ->rawColumns(['cover', 'action']) 
                ->toJson(); 
    }


    public function borrows()
    {
       $borrows = BorrowHistory::isBorrowed()->latest()->get();

       $borrows->load('user','book');

        return datatables()->of($borrows)
            ->addColumn('user', function (BorrowHistory $model) {
                return $model->user->name; 
            })
            ->addColumn('book_title', function (BorrowHistory $model) {
                return $model->book->title; 
            })
            ->addColumn('action','admin.borrow.action') 
            ->addIndexColumn() 
            ->rawColumns(['action']) 
            ->toJson(); 
    }
}
