<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD IN CI4</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sthle.css');?>">
</head>
<body>
    <div class="container-fluid bg-purple pb-2 pt-2 shadow-sm">
        <div class="text-white h4">
            Simple Codeigniter 4 CRUD Application
        </div>
    </div>
    <div class="bg-white shadow-sm">
            <div class="container">
                <div class="row">
                    <nav class="nav nav-underline">
                        <div class="nav-link">Books / View</div>
                    </nav>
                </div>
            </div>
    </div>
    <div class="container mt-4" >
        <div class="row" >
            <div class="col-md-12 text-right" >
                <a href="books/create" class="btn btn-primary" >Add</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div  class="col-md-12" >
                <?php 
                if(!empty($session->getFlashdata('success'))){
                    ?> 
                    <div class="alert alert-success">
                        <?php echo $session->getFlashdata('success'); ?>
                    </div>
                    <?php
                }
                ?>
                <?php 
                if(!empty($session->getFlashdata('error'))){
                    ?> 
                    <div class="alert alert-danger">
                        <?php echo $session->getFlashdata('error'); ?>
                    </div>
                    <?php
                }
                ?>
                <?php 
                if(!empty($session->getFlashdata('update'))){
                    ?> 
                    <div class="alert alert-success">
                        <?php echo $session->getFlashdata('update'); ?>
                    </div>
                    <?php
                }
                ?>
                 <?php 
                if(!empty($session->getFlashdata('delete'))){
                    ?> 
                    <div class="alert alert-success">
                        <?php echo $session->getFlashdata('delete'); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-12" >
                <div class="card">
                    <div class="card-header bg-purple text-white" >
                        <div class="card-header-title" >Books</div>
                    </div>
                    <div class="card-body" >
                        <table class="table table-striped" >
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>ISBN-NO</th>
                                <th>Author</th>
                                <th>Created Date</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            
                            <?php if(!empty($books)){
                                foreach($books as $book){
                                    ?>
                                    <tr>
                                        <td><?php echo $book['id']; ?></td>
                                        <td><?php echo $book['title']; ?></td>
                                        <td><?php echo $book['isbn_no']; ?></td>
                                        <td><?php echo $book['author']; ?></td>
                                        <td><?php echo $book['created_at']; ?></td>
                                        <?php 
                                            $imagePath = base_url("public/uploads/".$book['image']);
                                            $image = '<img src="'.$imagePath.'" alt="Book Image">';
                                            ?>
                                            <td><?php echo $image; ?></td>
                                        
                                        <td>
                                            <a href="<?php echo base_url('books/edit/'.$book['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?php echo base_url('books/delete/'.$book['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else{?>
                                <tr>
                                    <td colspan="6">Records not found</td>
                    
                                </tr>
                            <?php
                            }?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>