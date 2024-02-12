<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Select Employee Name</label>
                                <select type="text" class="form-control form-select" id="productCategory">
                                    <option value="">Select Employee Name</option>
                                </select>
                                <label class="form-label">Select under Employee Name</label>
                                <select type="text" class="form-control form-select" id="underemployee">
                                    <option value="">Select under Employee Name</option>
                                </select>
                                <label class="form-label mt-2">Sale Price</label>
                                <input type="text" class="form-control" id="SalePrice">                              
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary mx-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

{{-- 
<script>
    $(document).ready(function() {
        FillCategoryDropDown(); 
        FillunderDropDown(); 

        $('#productCategory').change(function() {
            let mainEmployerId = $(this).val(); // Get the selected main employer ID

           
            $('#underemployee').empty();

          
            axios.get(`/employee-under/${mainEmployerId}`)
                .then(function(response) {
                    response.data.forEach(function(item) {
                        let option = `<option value="${item.id}">${item.UnderName1}</option>`;
                        $('#underemployee').append(option);
                    });
                })
                .catch(function(error) {
                    console.error('Error fetching under employees:', error);
                });
        });
    });

    async function FillCategoryDropDown() {
        try {
            let res = await axios.get("/list-employee");
            res.data.forEach(function(item, i) {
                let option = `<option value="${item.id}">${item.name}</option>`;
                $("#productCategory").append(option);
            });
            // Trigger change event to populate under employee dropdown initially
            $('#productCategory').change();
        } catch (error){
            console.error('Error fetching categories:', error);
        }
    }

    async function FillunderDropDown() {
        try {
            let res = await axios.get('/employee-under');
            console.log(res.data);
            res.data.forEach(function(item, i) {
                let option = `<option value="${item.id}">${item.name}</option>`;
                $("#underemployee").append(option);
            });
        } catch (error) {
            console.error('Error fetching under employees:', error);
        }
    }

    async function save(){
        
        let productCategoryID = document.getElementById("productCategory").value;
        let underEmployeeID = document.getElementById("underemployee").value;
        let saleprice = document.getElementById("SalePrice").value;
    
        try {
            document.getElementById('modal-close').click();
            let res = await axios.post('/save-sale', {
                employee_id: productCategoryID,
                underemployee_id: underEmployeeID,
                saleprice: saleprice,
            });
    
            if (res.data === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No Sale added.'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Employee Sale Added Successfully.'
                });
                document.getElementById('save-form').reset();
            }
        } catch (error) {
            console.error('Error saving employee:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to save employee. Please try again later.'
            });
        }
    }
</script> --}}




<script>
   
    $(document).ready(function () {
        FillCategoryDropDown();
        FillunderDropDown();

        $('#productCategory').change(async function () {
            let mainEmployerId = $(this).val();

            $('#underemployee').empty();

           await axios.get(`/employee-under/${mainEmployerId}`)
                .then(function (response) {
                    response.data.forEach(function (item) {
                        let option = `<option value="${item.id}">${item.UnderName1}</option>`;
                        $('#underemployee').append(option);
                    });
                })
                .catch(function (error) {
                    console.error('Error fetching under employees:', error);
                });
        });
    });

    async function FillCategoryDropDown() {
        try {
            let res = await axios.get('/list-employee');
            res.data.forEach(function (item, i) {
                let option = `<option value="${item.id}">${item.name}</option>`;
                $("#productCategory").append(option);
            });
            // Trigger change event to populate under employee dropdown initially
            $('#productCategory').change();
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    }

    async function FillunderDropDown() {
        try {
            let res = await axios.get('/employee-under');
            console.log(res.data);
            res.data.forEach(function (item, i) {
                let option = `<option value="${item.id}">${item.name}</option>`;
                $("#underemployee").append(option);
            });
        } catch (error) {
            console.error('Error fetching under employees:', error);
        }
    }

    async function save() {
        let productCategoryID = document.getElementById("productCategory").value;
        let underEmployeeID = document.getElementById("underemployee").value;
        let saleprice = document.getElementById("SalePrice").value;

        try {
            document.getElementById('modal-close').click();
            let res = await axios.post('/save-sale', {
                employee_id: productCategoryID,
                underemployee_id: underEmployeeID,
                saleprice: saleprice,
            });

            if (res.data === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No Sale added.'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Employee Sale Added Successfully.'
                });
                document.getElementById('save-form').reset();
            }
        } catch (error) {
            console.error('Error saving employee:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to save employee. Please try again later.'
            });
        }
    }
</script>
