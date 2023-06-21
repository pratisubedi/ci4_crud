<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
    public function index()
    {
        $session = \config\Services::session();
        $data['session'] = $session;

        // Fetch data from the database
        $model = new BookModel();
        $booksArray = $model->getRecords();
        $data['books'] = $booksArray;

        return view('books/list', $data);
    }

    public function create()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $file = $this->request->getFile('image');
        $imageName = ''; // Initialize $imageName variable with an empty string
        $imageType = ''; // Initialize $imageType variable with an empty string

        if ($file !== null && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('./public/uploads/', $imageName);
            $imageType = $file->getClientMimeType(); // Get the image MIME type
        }

        $check = $this->validate([
            'name' => 'required',
            'author' => 'required',
            'isbn_no' => 'required|integer'
        ]);

        if (!$check) {
            return view('books/create', ['validation' => $validation]);
        } else {
            $model = new BookModel();
            $model->save([
                'title' => $this->request->getPost('name'),
                'author' => $this->request->getPost('author'),
                'isbn_no' => $this->request->getPost('isbn_no'),
                'image' => $imageName,
                //'image_type' => $imageType, // Save the image type in the database
            ]);

            $session->setFlashdata('success', 'Record created successfully');
            return redirect()->to('books');
        }
    }

    public function edit($id)
    {
        $model = new BookModel();
        $data['books'] = $model->find($id);
        return view('books/edit', $data);
    }

    public function update($id)
    {
        $model = new BookModel();
        $data = [
            'title' => $this->request->getPost('name'),
            'author' => $this->request->getPost('author'),
            'isbn_no' => $this->request->getPost('isbn_no')
        ];
        $session = \config\Services::session();
        $model->update($id, $data);
        $session->setFlashdata('update', 'Record updated successfully');
        return redirect()->to('books');
    }

    public function delete($id)
    {
        $model = new BookModel();
        $model->delete($id);
        $session = \config\Services::session();
        $session->setFlashdata('delete', 'Record ' . $id . ' was deleted successfully');
        return redirect()->to('books');
    }
}
