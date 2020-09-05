<?php
require 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $products = array();
    $id = 0;
    foreach ($_POST['product'] as &$value) {
        //$value = $value * 2;
        $date = $_POST['date'];
        $attribes = $_POST['attribute'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $shipping = $_POST['shipping'];
        $total = $_POST['total'];
        $link = $_POST['link'];


        $products[$id]['name'] = $value;
        $products[$id]['attributes'] = $attribes[$id];
        $products[$id]['quantity'] = $quantity[$id];
        $products[$id]['price'] = $price[$id];
        $products[$id]['shipping'] = $shipping[$id];
        $products[$id]['total'] = $total[$id];
        $products[$id]['link'] = $link[$id];

        $id = $id + 1;
    }
    $products = json_encode($products);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO orders (date, info, status)
VALUES ('$date', '$products', 'Started')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        die();
    }

    $conn->close();
}



?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<form method="post">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                        <tr>
                            <th class="text-center"> # </th>
                            <th class="text-center"> Product </th>
                            <th class="text-center"> Attributes </th>
                            <th class="text-center"> Qty </th>
                            <th class="text-center"> Price </th>
                            <th class="text-center"> Shipping </th>
                            <th class="text-center"> Total </th>
                            <th class="text-center"> Link </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id='addr0'>
                            <td>1</td>
                            <td><input required type="text" name='product[]' placeholder='Enter Product Name' class="form-control" /></td>
                            <td><input required type="text" name='attribute[]' placeholder='Enter Attribute' class="form-control" /></td>
                            <td><input required type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0" /></td>
                            <td><input required type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0" /></td>
                            <td><input required type="number" name='shipping[]' placeholder='Enter Shipping Price' class="form-control shipping" step="0.00" min="0" /></td>
                            <td><input required type="number" name='total[]' placeholder='0.00' class="form-control total" readonly /></td>
                            <td><input required type="text" name='link[]' placeholder='Enter Link' class="form-control" /></td>
                        </tr>
                        <tr id='addr1'></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <button id="add_row" class="btn btn-default pull-left">Add Row</button>
                <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
            </div>
        </div>
        <div class="row clearfix" style="margin-top:20px">
            <div class="pull-right col-md-4">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                        <tr>
                            <th class="text-center">Date</th>
                            <td class="text-center"><input type="date" name='date' id="date" class="form-control" required/></td>
                        </tr>

                        <tr>
                            <th class="text-center">Sub Total</th>
                            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly /></td>
                        </tr>
                        <tr>
                            <th class="text-center">Tax</th>
                            <td class="text-center">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="number" class="form-control" id="tax" placeholder="0">
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Tax Amount</th>
                            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly /></td>
                        </tr>
                        <tr>
                            <th class="text-center">Grand Total</th>
                            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly /></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit">Submit</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        var i = 1;
        $("#add_row").click(function() {
            b = i - 1;
            $('#addr' + i).html($('#addr' + b).html()).find('td:first-child').html(i + 1);
            $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
            i++;
        });
        $("#delete_row").click(function() {
            if (i > 1) {
                $("#addr" + (i - 1)).html('');
                i--;
            }
            calc();
        });

        $('#tab_logic tbody').on('keyup change', function() {
            calc();
        });
        $('#tax').on('keyup change', function() {
            calc_total();
        });


    });

    function calc() {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();
            if (html != '') {
                var qty = $(this).find('.qty').val();
                var price = $(this).find('.price').val();
                var shipping = $(this).find('.shipping').val();
                var simple = (qty * price)
                var quick = (Number(simple) + Number(shipping));


                $(this).find('.total').val(quick);

                calc_total();
            }
        });
    }

    function calc_total() {
        total = 0;
        $('.total').each(function() {
            total += parseInt($(this).val());
        });
        $('#sub_total').val(total.toFixed(2));
        tax_sum = total / 100 * $('#tax').val();
        $('#tax_amount').val(tax_sum.toFixed(2));
        $('#total_amount').val((tax_sum + total).toFixed(2));
    }
</script>