<?php
include  'header.php';
include 'db.php';
require_once 'DB.class.php';

?>





<!-- <p>Add new House</p>

<form class="form" id="myForm" action="upload.php" method="post" style="display: inline-block" enctype="multipart/form-data">

    <input id="owner" name="owner" type="text" placeholder="Owner">

    <input id="address" name="address" type="text" placeholder="Address ">

    <input id="email" name="email" type="text" placeholder="Email">

    <input id="description" name="description" type="text" placeholder="description">

     <input type="file" name="imgdb" id="imgdb"> 
   
    <button type="submit">Add</button>

</form> -->




<section>

    <h2>House List </h2>

    <p>Type something in the input field to filter by name, email or Details:</p>

    <input id="myInput" type="text" placeholder="Search.." class="search">

    <br><br>

    <table class="myTable" id="myTable" style="overflow-x:auto;">
        <thead>
            <tr>
                <th>#</th>
                <th>Owner</th>
                <th>Address</th>
                <th>Email</th>
                <th>Details</th>
                <th>Photo</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody id=" myTable userData">
            <tr>
                <td></td>
                <td>
                    <input class="editInput owner " placeholder="Add Owner" type="text" name="owner" value="">
                </td>
                <td>
                    <input class="editInput address " placeholder="Add Address " type="text" name="address" value="">
                </td>
                <td>
                    <input class="editInput email " placeholder="Add Email" type="text" name="email" value="">
                </td>

                <td>
                    <input class="editInput description " placeholder="Add Description" type="text" name="description" value="">
                </td>

                <td>
                    <!-- <form id="image_form" method="post" enctype="multipart/form-data"> -->
                        <p><label>Select Image</label>
                            <input  class="img " type="file" name="img" id="img" /></p><br />
                       <!--  <input type="submit" name="insert" id="insert" value="Insert" class="" />

                    </form> -->
                </td>
                <td>
                    <div class="">


                        <button type="button" class=" addBtn" style="float: none; ">Add</button>
                        <!-- <button type="button" class=" returnbtn" style="float: none; ">Cancel</button> -->
                    </div>
                </td>
            </tr>
            <?php
            $sql = "SELECT * FROM hause ";
            // $sqlimg = "SELECT * FROM tbl_images ORDER BY id DESC";
            $result = mysqli_query($mysqli, $sql);
            // $result2 = 
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr id="<?php echo $row['id'];  ?>">
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <span class="editSpan owner"><?php echo $row['owner']; ?></span>
                            <input class="editInput owner " type="text" name="owner" value="<?php echo $row['owner']; ?>" style="display: none;">
                        </td>
                        <td>
                            <span class="editSpan address"><?php echo  $row['address']; ?></span>
                            <input class="editInput address " type="text" name="address" value="<?php echo  $row['address']; ?>" style="display: none;">
                        </td>
                        <td>
                            <span class="editSpan email"><?php echo $row['email']; ?></span>
                            <input class="editInput email " type="text" name="email" value="<?php echo $row['email']; ?>" style="display: none;">
                        </td>


                        <td>
                            <span class="editSpan description"><?php echo $row['description']; ?></span>
                            <input class="editInput description " type="text" name="description" value="<?php echo $row['description']; ?>" style="display: none;">
                        </td>

                        <td>
                            <?php
                                    $output = '';
                                    $output .= '<table><tr> <td><img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" height="60" width="75" class="img-thumbnail"  onclick = "openModalgallery(this)"/></td>
                                        <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="' . $row['id'] . '">Change</button></td>
                                        <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="' . $row['id'] . '">Remove</button></td> ';
                                    $output .= '</tr> </table>';
                                    echo $output;
                                    ?>

                        </td>

                        <td>
                            <div class="">
                                <button type="button" class="editBtn" style="float: none;"><span class="">edit</span></button>
                                <button type="button" class="deleteBtn" style="float: none;"><span class="">delete</span></button>
                            </div>
                            <button type="button" class=" saveBtn" style="float: none; display: none;">Save</button>
                            <button type="button" class=" confirmBtn" style="float: none; display: none;">Confirm</button>
                            <button type="button" class=" returnbtn" style="float: none; display: none;">Cancel</button>

                        </td>
                    </tr>
                <?php }
                } else { ?>
                <tr>
                    <td colspan="5">No user(s) found......</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</section>




<?php include 'footer.php'; ?>