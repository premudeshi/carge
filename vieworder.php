<?php
require 'dbconfig.php';
/*
if(is_null($_GET['id']))
{
    die();
}
*/

$id = 2;
$info = getInfo($servername, $username, $password, $dbname, $id);

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

<!------ Include the above in your HEAD tag ---------->
<style>
    tr td b {
        color: green;
    }
</style>


<div class="container">
    <div class="row">
        <h2 class="text-danger">View Order</h2>


        <table class="table table-bordered success">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <td><?php echo $id ?></td>
                </tr>
                <tr>
                    <th class="info">Address</th>
                    <td><?php echo $info['address'] ?></td>
                </tr>
                <tr>
                <th class="info">Shipping Method</th>
                    <td><?php echo $info['shipping method'] ?></td>
                </tr>
                <tr>
                    <th class="info">Contact</th>
                    <td>+91 9999955555</td>
                </tr>

                <tr>
                    <th class="info">State</th>
                    <td>Maharashtra</td>
                </tr>
                <tr>
                    <th class="info">City</th>
                    <td>Pune</td>
                </tr>
                <tr>
                    <th class="info">Service List</th>
                    <td>Service 1 , Service 2 , Serive 3</td>
                </tr>
                <tr>
                    <th valign="top" class="info">Machine</th>
                    <td>Machine1 , Machine2 , Machine3</td>
                </tr>
                <tr>
                    <th class="info">Brand</th>
                    <td>Audi</td>
                </tr>
                <tr>
                    <th class="info">Specialization</th>
                    <td>Lorem Ipsum that is dollor sign to write</td>
                </tr>

                <tr>
                    <th class="info">Approval Status</th>
                    <td><b>Active</b></td>
                </tr>

                <tr>
                    <th class="info bg-info">Approval Date</th>
                    <td class="bg-primary">14/12/2018</td>
                </tr>
                <tr>
                    <th class="info bg-primary">Register Date</th>
                    <td class="bg-info">10/12/2018 12:00:45</td>
                </tr>
                <tr>

                    <form>

                        <th class="info">Action To Approval</th>
                        <td><select id="approv_status" name="approv_status" class="form-control">
                                <option value="">Select</option>
                                <option value="active"><b>Active</b></option>
                                <option value="inactive"><b>Inactive</b></option>
                            </select></td>

                </tr>
                <tr>
                    <th colspan="1"></th>
                    <td>
                        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $value->id; ?>">
                        <input type="hidden" name="folder_name" id="folder_name" value="<?php echo $value->email; ?>">
                        <a href="<?php echo '' ?>module_c/approval_manager/service_provider_display" class="btn btn-warning">Back</a>
                        <input type="button" id="approve_btn" class="btn btn-info" name="approve_btn" value="Approve"></td>
                    </form>
                </tr>
            </thead>

        </table>
    </div>
    <div class="container">
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="thead-dark">
                        <th>S. #</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Tracking</th>
                        <th>Another Header</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

foreach ($info['products'] as &$value) {
    //$value = $value * 2;
    echo '<tr>
    <td>
        01
    </td>
    <td style="max-width:300px">
        <h6>'.$value['name'].'</h6>
        <em class="text-muted">
'.$value['attributes'].'        </em>
    </td>
    <td>
    <h6>USD '.$value['total'].'</h6>
    <br>
        <em class="text-muted">
            Quantity: '.$value['quantity'].'
        </em>
        <br>
        <em class="text-muted">
            Item Price: $'.$value['price'].'
        </em>
        <br>
        <em class="text-muted">
            Shipping: $'.$value['shipping'].'
        </em>
    </td>
    <td>
        Column data
    </td>
    <td>
        <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> |
        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
    </td>
</tr>
';
}

                    ?>

                    <tr>
                        <td>
                            01
                        </td>
                        <td style="max-width:300px">
                            <h6>Dummy Title 01</h6>
                            <em class="text-muted">
                                This is some long text or discription regarding Dummy Title 01. Even more lenghthy description will be automatically adjusted as per the width specified.
                            </em>
                        </td>
                        <td>
                        <h6>USD 00</h6>
                        <br>
                            <em class="text-muted">
                                Quantity: 2
                            </em>
                            <br>
                            <em class="text-muted">
                                Item Price: $00
                            </em>
                            <br>
                            <em class="text-muted">
                                Shipping: $00
                            </em>
                        </td>
                        <td>
                            Column data
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> |
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            02
                        </td>
                        <td style="max-width:300px">
                            <h6>Dummy Title 02</h6>
                            <em class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique facere necessitatibus quo laboriosam consequuntur
                            </em>
                        </td>
                        
                        
                        <td>
                            Some Data
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> |
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            03
                        </td>
                        <td style="max-width:300px">
                            <h6>Another Title</h6>
                            <em class="text-muted">
                                This is some long text or discription about Another Title or else about.
                            </em>
                        </td>
                        <td>
                            This is some data
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> |
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            04
                        </td>
                        <td style="max-width:300px">
                            <h6>Yet Another Title</h6>
                            <em class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi aliquam placeat odit quasi autem distinctio veritatis ex numquam nihil nulla tempora a dolorem omnis beatae facilis perspiciatis doloribus
                            </em>
                        </td>
                        <td>
                            Data goes here
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> |
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>