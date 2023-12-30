<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    public function index()
    {
        //get data from table books
        $books = Books::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Buku',
            'data'    => $books
        ], 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama_book' => 'required',
            'nama_author' => 'required',
            'no_isbn' => 'required',
            'tahun_terbit' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $books = Books::create([
            'nama_book' => $request->nama_book,
            'nama_author' => $request->nama_author,
            'no_isbn' => $request->no_isbn,
            'tahun_terbit' => $request->tahun_terbit
        ]);

        //success save to database
        if($books) {

            return response()->json([
                'success' => true,
                'message' => 'Books Created',
                'data'    => $books
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }


    public function show($id)
    {
        $books = Books::find($id);
            if (!$books) {
                return response()->json([
                    'message' => 'Buku tidak ditemukan'
        ], 404);
    }
        return response()->json([
            'books' => $books
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, Books $books)
    {
         //set validation
         $validator = Validator::make($request->all(), [
            'nama_book' => 'required',
            'nama_author' => 'required',
            'no_isbn' => 'required',
            'tahun_terbit' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find books by ID
        $books = Books::findOrFail($books->id);

        if($books) {

            //update books
            $books->update([
                'nama_book' => $request->nama_book,
                'nama_author' => $request->nama_author,
                'no_isbn' => $request->no_isbn,
                'tahun_terbit' => $request->tahun_terbit
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Books Updated',
                'data'    => $books
            ], 200);

        }

        //data books not found
        return response()->json([
            'success' => false,
            'message' => 'Books Not Found',
        ], 404);

    }


    public function destroy($id)
    {
         //find books by ID
         $books = Books::findOrfail($id);

         if($books) {

             //delete books
             $books->delete();

             return response()->json([
                 'success' => true,
                 'message' => 'Books Deleted',
             ], 200);

         }

         //data post not found
         return response()->json([
             'success' => false,
             'message' => 'Books Not Found',
         ], 404);
     }
}
