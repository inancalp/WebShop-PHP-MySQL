<div class="w-100 d-flex justify-content-center">
<section class="my-4 py-4 w-50">
    <div class="container mt-3">
        <h2>CheckOut</h2>
        <hr>
        <div class="row d-flex justify-content-between">
            <div class="col">
                Select Address:
                <ul class="list-unstyled">
                    <li>
                        <input type="radio" name="address" value="address1">
                        <label for="address1">
                            Address 1
                        </label>
                    </li>
                    <li>
                        <input type="radio" name="address" value="address2">
                        <label for="address2">
                            Address 2
                        </label>
                    </li>
                    <li>
                        <input type="radio" name="address" value="newAddress">
                        <label for="address2">
                            New Address
                        </label>
                    </li>
                </ul>
            </div>
            <div class="col">
                <form>
                    <div class="mb-3">

                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Country</option>
                            <option value="belgium">Belgium</option>
                            <option value="netherlands">Netherlands</option>
                            <option value="turkiye">Turkiye</option>
                        </select>

                        
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" aria-describedby="city">
                        
                        <label for="street" class="form-label">street</label>
                        <input type="text" class="form-control" id="street" name="street" aria-describedby="street">
                        
                        <label for="zipcode" class="form-label">Zip code</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" aria-describedby="zipcode">
                        
                        <label for="houseNumber" class="form-label">House Number</label>
                        <input type="text" class="form-control" id="houseNumber" name="houseNumber" aria-describedby="houseNumber">
                        
                        <label for="busNumber" class="form-label">Bus Number</label>
                        <input type="text" class="form-control" id="busNumber" name="busNumber" aria-describedby="busNumber">
                        
                        <label for="addressDescription" class="form-label">Address Description</label>
                        <input type="text" class="form-control" id="addressDescription" name="addressDescription" aria-describedby="addressDescription">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </section>
</div>


