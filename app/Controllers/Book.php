<?php

namespace App\Controllers;
use Config\Services;
use App\Models\BookModel;

class Book extends BaseController
{
    public function index()
    {
        $session = Services::session();
        $data['session']    =   $session;

        $model = new BookModel();
        $booksArray = $model->getRecords();

        $data['books'] = $booksArray;

        return view('books/list',$data);
    }

    public function create()
    {
        $session = Services::session();
        helper('form');

        $data = [];

        if($this->request->getMethod() == 'post')
        {
            $input = $this->validate([
                'title' => 'required|min_length[5]',
                'author' => 'required|min_length[5]',
            ]);

            if($input == true)
            {
                // Form validated successfully, we can save values to database.

                $model = new BookModel();

                $model->save([
                    'title' => $this->request->getPost('title'),
                    'author' => $this->request->getPost('author'),
                    'isbn_no' => $this->request->getPost('isbn_no'),
                ]);

                $session->setFlashdata('success','Created Successfully');

                return redirect()->to('/books');

            }else{
                // Form not validated successfully
                $data['validation'] = $this->validator;
            }

        }

        return view('books/create',$data);
    }

    public function edit($id)
    {
        $session = Services::session();
        helper('form');

        $model = new BookModel();
        $book = $model->getRow($id);
        
        if(empty($book))
        {
            $session->setFlashdata('error','Record not found!');
            return redirect()->to('/books');
        }

        $data = [];
        $data['book'] = $book;

        if($this->request->getMethod() == 'post')
        {
            $input = $this->validate([
                'title' => 'required|min_length[5]',
                'author' => 'required|min_length[5]',
            ]);

            if($input == true)
            {
                // Form validated successfully, we can save values to database.

                $model = new BookModel();

                $model->update($id, [
                    'title' => $this->request->getPost('title'),
                    'author' => $this->request->getPost('author'),
                    'isbn_no' => $this->request->getPost('isbn_no'),
                ]);

                $session->setFlashdata('success','Updated Successfully');

                return redirect()->to('/books');

            }else{
                // Form not validated successfully
                $data['validation'] = $this->validator;
            }

        }

        return view('books/edit',$data);
    }

    public function delete($id)
    {
        $session = Services::session();

        $model = new BookModel();
        $book = $model->getRow($id);
        
        if(empty($book))
        {
            $session->setFlashdata('error','Record not found!');
            return redirect()->to('/books');
        }

        $model = new BookModel();
        $model->delete($id);

        $session->setFlashdata('success','Deleted successfully!');
        return redirect()->to('/books');
    }
}