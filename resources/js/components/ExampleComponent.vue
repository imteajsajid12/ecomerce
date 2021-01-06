<template>
<div id="app">
    <div class="continer">
        <div class="row">

            <div class="col-md-8">
                <table name="cart" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">id</th>
                            <th>name</th>
                            <th colspan="2">Quantity</th>
                            <th>Price</th>
                            <th>Item Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
            <div class="col-md-4">
                <form>
                    <div class="form-grup">
                        <label for="">Item Id</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class=" form-grup">
                        <label for="">Item Name</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-grup">
                        <label for="">Quantity</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-grup">
                        <label for="">Item Price</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">Item Price</label>
                        <input type="text" class="form-control">
                    </div>

                    <br>
                    <button class="btn btn-primary">Save Item</button>
                </form>
            </div>
        </div>
    </div>

</div>
</template>

<!--vuejs-->

    
<!--vuejs end-->
