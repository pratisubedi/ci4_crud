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
            Simple CodeIgniter 4 CRUD Application
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <a class="nav-link" href="#">Books / Edit</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="/books" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Edit Records</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('books/update/'.$books['id']); ?>" method="POST" name="editForm" id="editForm">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name')) ? 'is-invalid':''; ?>" value="<?php echo  $books['title']; ?>" placeholder="Enter book name">
                                <?php if(isset($validation) && $validation->hasError('name')) : ?>
                                    <p class="invalid-feedback"><?php echo $validation->getError('name'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" id="author" class="form-control <?php echo (isset($validation) && $validation->hasError('author')) ? 'is-invalid':''; ?>" value="<?php echo  $books['author']; ?>" placeholder="Enter author name">
                                <?php if(isset($validation) && $validation->hasError('author')) : ?>
                                    <p class="invalid-feedback"><?php echo $validation->getError('author'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="isbn_no">ISBN NO</label>
                                <input type="text" name="isbn_no" id="isbn_no" class="form-control <?php echo (isset($validation) && $validation->hasError('isbn_no')) ? 'is-invalid':''; ?>" value="<?php echo  $books['isbn_no']; ?>" placeholder="Enter ISBN_NUMBER">
                                <?php if(isset($validation) && $validation->hasError('isbn_no')) : ?>
                                    <p class="invalid-feedback"><?php echo $validation->getError('isbn_no'); ?></p>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
