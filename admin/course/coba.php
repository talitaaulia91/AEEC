<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
</head>

<body>
    <main>
        <div class="container mt-3">
            <form action="" method="post">
                <div class="more-field"></div>
                <div class="main-field">
                    <div class="row g-3 mb-3">
                        <div class="col-3">
                            <input type="text" name="product_name[]" class="form-control" placeholder="Nama produk" aria-label="Nama produk" required>
                        </div>
                        <div class="col-2">
                            <input type="number" name="product_qty[]" class="form-control" placeholder="Jumlah produk" aria-label="Jumlah produk" required>
                        </div>
                        <div class="col-2">
                            <select name="product_category[]" id="product_category" class="form-select" required>
                                <option value="" selected disabled hidden>Pilih kategori</option>
                                <option value="sabun">Sabun</option>
                                <!-- Some loops from db -->
                            </select>
                        </div>
                        <div class="col-3">
                            <textarea name="product_desc[]" class="form-control" id="product_desc" style="height: 0px" placeholder="Deskripsi" required></textarea>
                        </div>
                        <div class="col-2 action-field">
                            <button class="btn btn-success btn-add">+</button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
            <div class="submitted-value">
                <?php
                if (!empty($_POST)) {
                    $result = [];
                    $product_name = $_POST['product_name'];
                    $product_qty = $_POST['product_qty'];
                    $product_category = $_POST['product_category'];
                    $product_desc = $_POST['product_desc'];

                    // You can loops value if its name is an array or contain '[]', example : name=product_name[]
                    for ($i = 0; $i < count($product_name); $i++) {
                        // Merge into one array
                        array_push($result, [
                            'product_name' => $product_name[$i],
                            'product_qty' => $product_qty[$i],
                            'product_category' => $product_category[$i],
                            'product_desc' => $product_desc[$i],
                        ]);
                    }

                    // you can do some insert here
                    // Example :
                    // foreach($result as $r){
                    // query : INSERT INTO product VALUE($r['product_name'], $r['product_qty'], $r['product_category'], $r['product_desc'])
                    // }

                    // this is just example, you can delete it later
                    echo '<h4>Submitted value :</h4>';
                    echo '<pre>';
                    echo json_encode($result, JSON_PRETTY_PRINT);
                }
                ?>
            </div>
        </div>
    </main>
</body>
<script>
    $('.btn-add').click(function() {
        $('.more-field').append('<div class="single remove"></div>'); // add more div inside more-field
        $('.main-field .row').clone().appendTo('.more-field .single'); // clone field from main-field into .single
        $('.single .row .action-field').remove(); // remove plus button from previous field so you can replace it with 'x' button
        $('.single .row').append('<div class="col-2 action-field"><button class="btn btn-danger btn-remove">x</button></div>'); // add 'x' button
        $('.single').attr('class', 'remove');
    });

    $(document).on('click', '.btn-remove', function(e) {
        $(this).parentsUntil('.remove').remove();
        e.preventDefault();
    });
</script>

</html>