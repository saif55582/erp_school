<div  class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

                        <h4 class="card-title my-title">Account Balance</h4>

                        <div class="row">

                            <div class="col-md-12 col-sm-12" style="background-color: #eee; border-radius: 5px; border: solid 1px #b11919;">

                                <form>

                                    

                                    <div onclick="setFocus();" class="col-sm-4 mytargetchange">

                                        <select name="feeID" id="class" class="selectpicker" data-style="select-with-transition" title="Select Month">

                                            <option value="JAN">JAN</option>

                                            <option value="FEB">FEB</option>

                                            <option value="MAR">MAR</option>

                                            <option value="APR">APR</option>

                                            <option value="MAY">MAY</option>

                                            <option value="JUN">JUN</option>

                                            <option value="JUL">JUL</option>

                                            <option value="AUG">AUG</option>

                                            <option value="SEP">SEP</option>

                                            <option value="OCT">OCT</option>

                                            <option value="NOV">NOV</option>

                                            <option value="DEC">DEC</option>

                                        </select>

                                    </div>



                                    <div class="col-lg-4 col-md-4 col-sm-4">

                                        <select class="selectpicker" id='export_year' name="year" data-style="select-with-transition" title="Select Year">

                                            <?php

                                            foreach($years as $year) {



                                                echo "<option value='".$year."'>".$year."</option>";

                                            }

                                            ?>

                                        </select>

                                    </div>



                                    <div class="col-sm-4">

                                        <button name="submit" type="submit" class="btn btn-rose pull-right btn-sm" style="margin-right: 20px;">Check Balance <i class="material-icons">account_balance_wallet</i></button>

                                    </div>



                                </form>

                            </div>

                            <div class="col-sm-12 bg-danger" style="border: solid 1px #b11919; border-radius: 5px; margin-top: 20px; padding: 10px;"><strong>BALANCE SHEET OF: 12 2017</strong></div>

                            <div class="row">    

                                <div class="col-sm-6">

                                    <div style="background-color: #b11919; color: #fff; margin-top: 20px; padding: 10px;">

                                        <strong>Credits</strong>

                                    </div>

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th><strong>Date</strong></th>

                                                <th><strong>Type</strong></th>

                                                <th><strong>Crdit Amount</strong></th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                        </tfoot>

                                    </table>

                                </div>



                                <div class="col-sm-6">

                                    <div style="background-color: #b11919; color: #fff; margin-top: 20px; padding: 10px;">

                                        <strong>Expenses</strong>

                                    </div>

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th><strong>Date</strong></th>

                                                <th><strong>Type</strong></th>

                                                <th><strong>Crdit Amount</strong></th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                            <tr>

                                                <td>2017-12-06</td>

                                                <td>Fees</td>

                                                <td>792.00</td>

                                            </tr>

                                        </tfoot>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

